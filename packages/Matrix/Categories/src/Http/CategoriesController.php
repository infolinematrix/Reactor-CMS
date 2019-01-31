<?php


namespace Matrix\Categories\Http;

use Illuminate\Support\Facades\App;
use Matrix\Categories\Http\Traits\UseCategory;
use Reactor\Hierarchy\Node;
use ReactorCMS\Http\Controllers\ReactorController;

use Illuminate\Http\Request;
use Reactor\Hierarchy\NodeSource;
use Reactor\Hierarchy\NodeType;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use Illuminate\Support\Facades\File;


class CategoriesController extends ReactorController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;
    use UseCategory;

    public $nodeType = 'categories';

    public function __construct()
    {
        // constructor body
    }

    public function index($id = null)
    {

        $nodes = $this->getCategories($id,'DESC')->paginate(25);


        
        return view('Categories::index', compact('nodes', 'id'));
    }

    public function Create($id = null)
    {


        $type = get_node_type($this->nodeType);


        $data['parent'] = !is_null($id) ? Node::findOrFail($id) : null;

        $form = $this->getCreateForm($id, $data['parent']);
        $form->setUrl(route('reactor.category.create', $id));


        $form->modify('type', 'hidden', [
            'value' => $type->getKey(),

        ]);



        $data['form'] = $form;


        return $this->compileView('Categories::create', $data, 'Create');
    }


    public function store(Request $request, $id = null)
    {


        //$this->authorize('EDIT_NODES');

        $this->validateCreateForm($request);


        //dd($request->all());

        list($node, $locale) = $this->createNode($request, $id);

        $this->notify('nodes.created');


        return redirect()->route('reactor.category.edit', [
            $node->getKey(),
            $node->translate($locale)->getKey()
        ]);

    }

    public function edit($id, $source = null)
    {


        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);
        $form->setUrl(route('reactor.category.edit', [$id, $source->getKey()]));

        $form->modify('meta_image','hidden',[
        ]);

        $form->modify('meta_author','hidden',[
        ]);

        return view('Categories::edit', compact('form', 'node', 'locale', 'source', 'id'));

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

        return $this->compileView('Categories::translate', compact('form', 'node', 'locale', 'source'), 'Location Translation');
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

        return redirect()->route('reactor.category.edit', [
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

        return redirect()->route('reactor.category.edit', [$node->getKey(), $node->translateOrfirst()->getKey()]);
    }

    public function getCategoryapi($parent_id){



        $nodetype  = get_node_type($this->nodeType);

        $categories =  $nodetype->nodes()->where('parent_id',$parent_id)->translatedIn(locale())->get();

        $num_rows = count($categories);

        if ($num_rows > 0) {
            $select = "<option value=''>--Select--</option>" ;
            $tt = "<select  class='cat form-control' name='category[]'";
            $tt .= "<option value=''>$select</option>";
            foreach ($categories as $cat) {
                $id = $cat->getKey();
                $title = $cat->getTitle();
                $tt .= "<option value='$id'>$title</option>";
            }
            $tt .= "</select>
           ";

            echo $tt;
            exit();
        }

    }

}

