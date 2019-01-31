<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 7/7/17
 * Time: 6:05 PM
 */

namespace Matrix\Locations\Http;

use Illuminate\Support\Facades\Auth;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeSource;
use ReactorCMS\Http\Controllers\ReactorController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;

use Reactor\Documents\Media\Media;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Reactor\Hierarchy\NodeType;

class LocationsController extends ReactorController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;

    public $nodeType = 'locations';


    public function __construct()
    {
        // constructor body
    }
    
    public function index($id = null)
    {



        $nodes = Node::withType('locations')->where('parent_id', $id)->translatedIn(locale());
        $nodes = $nodes->translatedIn(locale())->paginate();


        return view('Locations::index', compact('nodes', 'id'));
    }

    public function Create($id = null)
    {

        $type = get_node_type($this->nodeType);


        $data['parent'] = !is_null($id) ? Node::findOrFail($id) : null;

        $form = $this->getCreateForm($id, $data['parent']);
        $form->setUrl(route('reactor.location.create', $id));


        $form->modify('type', 'select', [
            'choices' => $this->compileAllowedNodeTypes($data['parent']),
            'selected' => $type->getKey(),
            'attr' => ['readonly'],
        ]);

        $data['form'] = $form;


        return $this->compileView('Locations::create', $data, 'Create');
    }

    public function Store(Request $request, $id = null)
    {


        $this->authorize('EDIT_NODES');

        $this->validateCreateForm($request);

        list($node, $locale) = $this->createNode($request, $id);

        //--Make node Published by default
        $this->changeNodeStatus($node->getKey(), 'Publish', 'null');

        $this->notify('nodes.created');

        return redirect()->route('reactor.location.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey()
        ]);

    }

    public function edit($id, $source = null)
    {

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('reactor.location.edit', [$id, $source->getKey()]));

        return view('Locations::edit', compact('form', 'node', 'locale', 'source', 'id'));
    }

    public function update(Request $request, $id, $source)
    {

        $node = $this->authorizeAndFindNode($id, $source, 'EDIT_NODES', false);

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;

        list($locale, $source) = $this->determineLocaleAndSource($source, $node);

        $this->validateEditForm($request, $node, $source);

        $this->determinePublish($request, $node);

        // Recording paused for this, otherwise two records are registered
        chronicle()->pauseRecording();
        $node->update([
            $locale => $request->all()
        ]);
        // and resume
        chronicle()->resumeRecording();




        $this->notify('nodes.edited', 'updated_node_content', $node);


        return redirect()->back();
    }


    public function createTranslation($id)
    {
        list($node, $locale, $source) = $this->authorizeAndFindNode($id, null, 'EDIT_NODES');

        if (count($locales = $this->getAvailableLocales($node)) === 0) {
            flash()->error(trans('general.no_available_locales'));

            return redirect()->back();
        }


        $form = $this->getCreateTranslationForm($id, $locales);
        $form->setUrl(route('reactor.location.translation.store', $id));

        return $this->compileView('Locations::translate', compact('form', 'node', 'locale', 'source'), 'Location Translation');
    }

    public function storeTranslation(Request $request, $id)
    {
        $this->authorize('EDIT_NODES');

        $node = Node::findOrFail($id);

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;


        $this->validateCreateTranslationForm($request);

        $locale = $this->validateLocale($request);

        // Recording paused for this, otherwise two records are registered
        chronicle()->pauseRecording();
        $node->update([
            $locale => $request->all()
        ]);
        // and resume
        chronicle()->resumeRecording();

        $this->notify('general.added_translation', 'created_node_translation', $node);

        return redirect()->route('reactor.location.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey()
        ]);
    }

    /**
     * Deletes a translation
     *
     * @param int $id
     * @return Response
     */
    public function destroyTranslation($id)
    {
        $this->authorize('EDIT_NODES');

        $source = NodeSource::findOrFail($id);

        $node = $source->node;

        if ($response = $this->validateNodeIsNotLocked($node)) return $response;

        // Prevent deletion if there is only one translation
        if (count($node->translations) > 1) {
            $source->delete();
        }

        $node->load('translations');

        $this->notify('general.destroyed_translation', 'deleted_node_translation', $node);

        return redirect()->route('reactor.location.edit', [$node->getKey(), $node->translateOrfirst()->getKey()]);
    }

    public function getLocationapi($parent_id){




        $nodetype  = get_node_type($this->nodeType);

        $locaitons =  $nodetype->nodes()->where('parent_id',$parent_id)->translatedIn(locale())->get();


        $num_rows = count($locaitons);

        if ($num_rows > 0) {
            $tt = "<select  class='loc form-control' name='location[]' id='location'>";
            $tt .= "<option value=''>--Select--</option>";
            foreach ($locaitons as $loc) {

                $title = $loc->getTitle();
                $id = $loc->getKey();
                $tt .= "<option value='$id'>$title</option>";
            }
            $tt .= "</select>
           ";

            echo $tt;
            exit();
        }
    }

    public function searchLocation(){

        $term = $_GET["q"];
        $cid = Node::withType('locations')->search($term, 20, true)->get();

        if (count($cid) != 0) {
            foreach ($cid as $row) {
                $answer[] = array("id" => $row->getKey(), "text" => $row->getTitle());
            }
        } else {
            // 0 results send a message back to say so.
            $answer[] = array("id" => "0", "text" => __("No Results Found.."));
        }


        echo json_encode($answer);//format the array into json data
    }


}