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






    public function getProfile()
    {

        $nodeType = $this->getNodeTypeByName('profile');

        /*Check Profile*/

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


        return $this->compileView('Site::member.profile', compact('form','locations','specialities'), 'Profile');
    }


    public function postProfile(Request $request){



        $title = $request->profile_firstname.' '.$request->profile_lastname;
        $request->request->set('title',$title);
        $request->request->set('node_name',str_slug($title));

        $this->validateCreateForm($request);

        list($node, $locale) = $this->createNode($request, null);

        /*Insert Location in Node Meta*/
        $location = $request->input('location');
        if ($location[0] != '') {

            //--Delete existing node_meta if exist
            NodeMeta::where('node_id', $node->getkey())->where('type', 'profile')->where('key', 'location')->delete();

            for ($i = 0; $i < count($location); $i++) {

                $locID = $location[$i];
                if ($locID != null) {
                    if ($locID != '') {

                        $c = new NodeMeta();
                        $c->type = 'profile';
                        $c->key = 'location';
                        $c->value = $locID;
                        $c->node_id = $node->getKey();
                        $c->save();

                    }
                }
            }
        }

        /*Insert Category in Node Meta*/
        $speciality = $request->input('speciality');
        if ($speciality != '') {

            //--Delete existing node_meta if exist
            NodeMeta::where('node_id', $node->getkey())->where('type', 'profile')->where('key', 'category')->delete();

            $c = new NodeMeta();
            $c->type = 'profile';
            $c->key = 'category';
            $c->value = $speciality;
            $c->node_id = $node->getKey();
            $c->save();

           }


        SweetAlert::message('Profile Created')->autoclose(4000);
        return redirect()->back();
    }

    public function editProfile($id, $source = null){



        /*Get Location*/
        $location_meta = NodeMeta::where('node_id',$id)->where('key','location')->get();
        if ($location_meta) {
            $loc = '';
            foreach ($location_meta as $meta) {
                $loca = Node::findOrFail($meta->value);
                if ($loca->parent_id == null) {

                    $loc .= $loca->getKey();
                }
            }
            $location_meta = $loc;
        }
        $locations = Node::withType('locations')->where('parent_id',null)->get();

        /*Get Specialities*/
        $category_meta = NodeMeta::where('node_id',$id)->where('key','category')->first();
        
        $specialities = Node::withType('categories')->get();

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

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

        return $this->compileView('Site::member.profile_edit', compact('form','node','source','locations','specialities','category_meta','location_meta'), 'Profile');

    }

    public function updateProfile(){


    }
}