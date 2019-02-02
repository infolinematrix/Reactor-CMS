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


        return $this->compileView('Site::member.profile', compact('form','locations','tags','specialities'), 'Profile');
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

        return $this->compileView('Site::member.profile_edit', compact('form','node','source','tags','tagsMeta','locations','specialities','category_meta','location_meta'), 'Profile');

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
}