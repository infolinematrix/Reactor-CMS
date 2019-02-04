<?php


namespace Extension\Site\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Entities\Node;
use extension\Site\Helpers\UseAppHelper;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use ReactorCMS\Http\Controllers\Controller;
use ReactorCMS\Entities\NodeMeta;
use UxWeb\SweetAlert\SweetAlert;
use Reactor\Hierarchy\Tags;
use ReactorCMS\Entities\NodeTag;
use ReactorCMS\Entities\Appointment;
use Mail;
use Reactor\Documents\Media\Media;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\File;
class MemberController extends Controller
{
    use UsesNodeForms, UsesNodeHelpers, UsesTranslations;
    use UseAppHelper;
    /**
     * Member
     *
     * @return View
     */
    public function index()
    {

        return $this->compileView('Site::member.dashboard', [], 'Dashboard');
    }



    public function bookingConfirm($id){


        $appointment = Appointment::where('id',$id)->first();

        $node = Node::find($appointment->node_id);
        $node = $node->profile_firstname.' '.$node->profile_lastname;
        $data = [
            'doctor' => $node,
            'name' => $appointment->patient_name,
            'email' => $appointment->patient_email,
            'date' => date('d',strtotime($appointment->booking_date)).' '.date('M',strtotime($appointment->booking_date)).', '.date('Y',strtotime($appointment->booking_date)),
            'time' => $appointment->booking_time
        ];

        \Config::set('mail', getMailconfig());
        Mail::send('mail.confirmed', $data, function ($message) use ($data) {

            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Appointment Confirmed to Dr. '.$data['doctor']);
            $message->to('help.matrixinfoline@gmail.com');

        });

        Appointment::where('id',$id)->update(['confirmed' => 'yes']);

        SweetAlert::message('Confirmed')->autoclose(4000);
        return redirect()->back();
    }

    public function bookingCancel($id){


        Appointment::where('id',$id)->delete();

        SweetAlert::message('Rejected')->autoclose(4000);
        return redirect()->back();
    }


    public function getProfile()
    {

        $nodeType = $this->getNodeTypeByName('profile');

        /*Check Profile*/

        $isProfile = null;
        $user = Auth::guard('web')->user();
        $node = $user->nodes()->withType('profile')->first();
        if($node){
            return redirect()->route('member.profile.edit', [
                $node->getKey(),
                $node->translate(locale())->getKey(),
            ]);
        }

        /*Get Location*/
        $locations = Node::withType('locations')->where('parent_id',null)->get();

        /*Get Specialities*/
        $specialities = Node::withType('categories')->get();

        $tags = Tag::sortable()->translatedIn(locale())->get();

        $form = $this->getCreateSourceForm($nodeType);
        $form->setUrl(route('member.profile'));

        $form->modify('profile_firstname','text',[
            'label' => false,
            'attr' => ['placeholder' => 'First Name','rules' => 'require']
        ]);

        $form->modify('profile_lastname','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Last Name','rules' => 'require']
        ]);

        $form->modify('profile_email','email',[
            'label' => false,
            'attr' => ['placeholder' => 'Email','rules' => 'require']
        ]);

        $form->modify('profile_phone','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Contact No','rules' => 'require']
        ]);

        $form->modify('profile_address','textarea',[
            'label' => false,
            'attr' => ['rows' => 2,'placeholder' => 'Address','rules' => 'require']
        ]);

        $form->modify('profile_zipcode','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Zip Code','rules' => 'require']
        ]);

        $form->modify('profile_landline','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Contact No']
        ]);

        $form->modify('profile_about','textarea',[
            'label' => false,
            'rules' => 'require'
        ]);



        return $this->compileView('Site::member.profile', compact('isProfile','form','locations','tags','specialities'), 'Profile');
    }


    public function postProfile(Request $request){




        $title = $request->profile_firstname.' '.$request->profile_lastname;
        $request->request->set('title',$title);
        $request->request->set('node_name',str_slug($title));

        $this->validateCreateForm($request);

        list($node, $locale) = $this->createNode($request, null);

        /*Insert Location in Node Meta*/
        $locations = $request->location;
        $node->setMeta('location',$locations);

        /*Insert Category in Node Meta*/
        $node->setMeta('category',$request->speciality);

        /*Insert Keywords in Node Meta*/
        $keywords = $request->keywords;
        if($keywords[0] != '') {
            NodeTag::where('node_id', $node->getKey())->delete();
            for ($i = 0; $i < count($keywords); $i++) {

                $tagID = $keywords[$i];
                if ($tagID != null) {
                    if ($tagID != '') {
                        $c = new NodeTag();
                        $c->node_id = $node->getKey();
                        $c->tag_id = $tagID;
                        $c->save();

                    }
                }
            }
        }

        SweetAlert::message('Profile Created')->autoclose(4000);

        return redirect()->back();
    }

    public function editProfile($id, $source = null){

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $isProfile = $node->profile_firstname.' '.$node->profile_lastname;
        $profileImage = Media::where('node_id',$node->getKey())->where('type','image')->first();
        /*Education*/
        $educations = $node->children()
            ->sortable()
            ->translatedIn($locale)
            ->get();


        /*Get Location*/
        $location_meta = $node->getMeta('location');
        
        if ($location_meta) {
            $loc = '';
            foreach ($location_meta as $meta) {
                
                $loca = Node::findOrFail($meta);
                if ($loca->parent_id == null) {

                    $loc .= $loca->getKey();
                }
                
            }
            $location_meta = $loc;
        }
        $locations = Node::withType('locations')->where('parent_id',null)->get();

        /*Get Specialities*/
        $category_meta = $node->getMeta('category');
        $specialities = Node::withType('categories')->get();


        /*Get Keywords*/
        $tags = Tag::sortable()->translatedIn(locale())->get();
        $tagsMeta = NodeTag::where('node_id',$node->getKey())->get();
        if(count($tagsMeta) > 0) {
            foreach ($tagsMeta as $tag){

                $t[] = $tag->tag_id;
            }

         $tagsMeta = $t;

        }else{

            $tagsMeta = null;
        }

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('member.profile.update', [$node->getKey(), $source->getKey()]));

        $form->modify('profile_firstname','text',[
            'label' => false,
            'attr' => ['placeholder' => 'First Name','rules' => 'require']
        ]);

        $form->modify('profile_lastname','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Last Name','rules' => 'require']
        ]);

        $form->modify('profile_email','email',[
            'label' => false,
            'attr' => ['placeholder' => 'Email','rules' => 'require']
        ]);

        $form->modify('profile_phone','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Contact No','rules' => 'require']
        ]);

        $form->modify('profile_address','textarea',[
            'label' => false,
            'attr' => ['rows' => 2,'placeholder' => 'Address','rules' => 'require']
        ]);

        $form->modify('profile_zipcode','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Zip Code','rules' => 'require']
        ]);

        $form->modify('profile_landline','text',[
            'label' => false,
            'attr' => ['placeholder' => 'Contact No']
        ]);

        $form->modify('profile_about','textarea',[
            'label' => false,
            'rules' => 'require'
        ]);


        /*Education*/

        $this->validateParentCanHaveChildren($node);

        $educationform = $this->getCreateForm($id, $node);
        $educationform->setUrl(route('member.profile.education',[$id]));
        $educationform->modify('title','text',[
            'label' => false,
            'rules' => 'require'
        ]);

        $educationform->modify('description','textarea',[
            'label' => false,
            'rules' => 'require',
            'attr' => ['rows' => 2]
        ]);


        return $this->compileView('Site::member.profile_edit', compact('isProfile','profileImage','form','educationform','node','educations','source','tags','tagsMeta','locations','specialities','category_meta','location_meta'), 'Profile');

    }

    public function updateProfile(Request $request, $id, $source){

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $node->update([
            $locale => array_except($request->all(), ['_token', '_method'])
        ]);

        /*Insert Location in Node Meta*/
        $locations = $request->location;
        $node->setMeta('location',$locations);

        /*Insert Category in Node Meta*/
        $node->setMeta('category',$request->speciality);

        /*Insert Keywords in Node Meta*/
        $keywords = $request->keywords;
        if($keywords[0] != '') {
            NodeTag::where('node_id', $node->getKey())->delete();
            for ($i = 0; $i < count($keywords); $i++) {

                $tagID = $keywords[$i];
                if ($tagID != null) {
                    if ($tagID != '') {
                        $c = new NodeTag();
                        $c->node_id = $node->getKey();
                        $c->tag_id = $tagID;
                        $c->save();

                    }
                }
            }
        }



        SweetAlert::message('Profile Updated')->autoclose(4000);
        return redirect()->back();

    }

    public function updateEducation(Request $request, $id){

        $request->request->set('node_name',str_slug($request->title));

        $this->validateCreateForm($request);

        list($node, $locale) = $this->createNode($request, $id);

        SweetAlert::message('Education Updated')->autoclose(4000);

        return redirect()->back();
    }


    public function uploadPicture(Request $request){

        $user = Auth::guard('web')->user();
        $node = $user->nodes()->withType('profile')->first();

        if(!$node){
            return redirect()->route('member.profile');
        }

        /*Profile Image*/
        $profile_image = $request->file('image');


        if($profile_image != ''){
            $filename = str_random(6). '_' . $profile_image->getClientOriginalName();
            $arr = explode(".", $filename, 2);

            //--Save Large Image in Directory--//
            $destination_path = public_path('uploads/' . $filename);
            ImageFacade::make($profile_image->getRealPath())
                ->resize(565, 565)->save($destination_path);

            $media = Media::where('node_id', $node->getKey())->where('type','image')->first();
            if ($media) {
                File::delete(upload_path($media->path));
                Media::where('node_id', $node->getKey())->where('type', 'image')->delete();
            }
            //-- Save Image in Database--//
            $media = new Media();
            $media->node_id = $node->getKey();
            $media->path = $filename;
            $media->name = 'profile';
            $media->extension = $arr[1];
            $media->mimetype = $profile_image->getClientMimeType();
            $media->size = 0;
            $media->user_id = Auth::user()->id;
            $media->save();
        }

        SweetAlert::message('Image Uploaded')->autoclose(4000);

        return redirect()->back();

    }
    public function deleteEducation($id){


        $node = Node::findOrFail($id);

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;

        $node->delete();
        SweetAlert::message('Deleted')->autoclose(4000);

        return redirect()->back();
    }
}