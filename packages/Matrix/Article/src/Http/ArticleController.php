<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 7/7/17
 * Time: 6:05 PM
 */

namespace Matrix\Article\Http;

use Illuminate\Support\Facades\Auth;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\NodeSource;
use Reactor\Http\Controllers\ReactorController;
use Reactor\Http\Controllers\Traits\UsesNodeHelpers;
use Reactor\Http\Controllers\Traits\UsesNodeForms;
use Reactor\Http\Controllers\Traits\UsesTranslations;

use Reactor\Documents\Media\Media;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Reactor\Hierarchy\NodeType;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs;
use Extension\Site\Helpers\ProductHelpersTrait;

class ArticleController extends ReactorController
{
    public $nodeType = 'article';

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;
    use ProductHelpersTrait;

    public function __construct()
    {
        //- Check Node type exist --//
        if ($response = $this->validateNodeType($this->nodeType)) return $response;
    }


    public function index()
    {

        $nodes = Node::withType($this->nodeType)
            ->translatedIn(locale())
            ->paginate();

        //Breadcrumbs----//
        Breadcrumbs::register('article', function ($breadcrumbs) use ($nodes) {
            $breadcrumbs->push('Articles', route('article'));
        });

        return $this->compileView('Site::packages.article.index', compact('nodes'), 'Articles');
    }

    public function single($name)
    {
        $nodes = Node::withType($this->nodeType)
            ->translatedIn(locale());

        $article = $nodes->WithName($name)->first();
        $nodes = $nodes->take(10)->get();

        //Breadcrumbs----//
        Breadcrumbs::register('article.single', function ($breadcrumbs) use ($article) {
            $breadcrumbs->push('Articles', route('article'));
            $breadcrumbs->push($article->getTitle(), route('article.single', $article->getName()));
        });

        $hot_products = $this->hot_products(5);

        return $this->compileView('Site::packages.article.single', compact('article', 'hot_products', 'nodes'), $article->getTitle());
    }


    /**
     *  ADMIN CONTROL
     */

    public function show($id = null)
    {


        $nodes = Node::withType($this->nodeType)
            ->translatedIn(locale())
            ->paginate();

        return $this->compileView('Article::index', compact('nodes'), 'Article');

    }

    public function Create($id = null)
    {

        $node_type = get_node_type($this->nodeType);

        $data['parent'] = !is_null($id) ? Node::findOrFail($id) : null;

        $form = $this->getCreateForm($id, $data['parent']);
        $form->setUrl(route('reactor.article.create', $id));
        $form->setFormOptions(['files' => true]);

        $form->modify('type', 'hidden', [
            'value' => $node_type->getKey(),
        ]);

        $form->add('content', 'wysiwyg', [

            'rules' => 'required',

        ]);


        $form->add('image', 'gallery', [

            'attr' => ['fields' => '1', 'value' => 0],
        ]);

        $data['form'] = $form;


        return $this->compileView('Article::create', compact('form'), __('Article Add'));
    }

    public function Store(Request $request, $id = null)
    {

        $files = $request->file('gallery');

        if (count($files[0]) > 0) {
            for ($i = 0; $i < count($files); $i++) {
                $filename = 'article_' . str_random(6) . '_' . $files[$i]->getClientOriginalName();
                $arr = explode(".", $filename, 2);

                $this->authorize('EDIT_NODES');

                    $this->validateCreateForm($request);

                    list($node, $locale) = $this->createNode($request, $id);
                    //--Make node Published by default
                    $this->changeNodeStatus($node->getKey(), 'Publish', 'null');

                    //--Save Image in Directory--//
                    ImageFacade::make($files[$i]->getRealPath())
                        ->resize(config('Article.image_size.width'), config('Article.image_size.height'))->save(upload_path($filename));

                    //-- Save Image in Database--//
                    $media = new Media();
                    $media->node_id = $node->getKey();
                    $media->path = $filename;
                    $media->name = $arr[0];
                    $media->extension = $arr[1];
                    $media->mimetype = $files[$i]->getClientMimeType();
                    $media->size = ImageFacade::make($files[$i])->filesize();
                    $media->user_id = Auth::user()->id;
                    $media->save();

                    $this->notify('nodes.created');

                    return redirect()->route('reactor.article.edit', [
                        $node->getKey(),
                        $node->translate($locale)->getKey()
                    ]);

            }
        } else {

            $this->authorize('EDIT_NODES');

            $this->validateCreateForm($request);

            list($node, $locale) = $this->createNode($request, $id);
            //--Make node Published by default
            $this->changeNodeStatus($node->getKey(), 'Publish', 'null');

            $this->notify('nodes.created');

            return redirect()->route('reactor.article.edit', [
                $node->getKey(),
                $node->translate($locale)->getKey()
            ]);
        }

    }

    public function edit($id, $source = null)
    {

        list($node, $locale, $source) = $this->authorizeAndFindNode($id, $source);

        $form = $this->getEditForm($id, $node, $source);


        $form->setUrl(route('reactor.article.edit', [$id, $source->getKey()]));
        $form->setFormOptions(['files' => true]);


        $media = Media::where('node_id', $node->getKey())->get();

        $form->add('image', 'gallery', [

            'attr' => ['fields' => '1', 'value' => $media],
        ]);

        $form->modify('content', 'wysiwyg', [
            'rules' => 'required',

        ]);

        return view('Article::edit', compact('form', 'node', 'locale', 'source', 'id'));
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

        $files = $request->file('gallery');

        if (count($files[0]) > 0) {
            for ($i = 0; $i < count($files); $i++) {
                $filename = 'article_' . str_random(6) . '_' . $files[$i]->getClientOriginalName();
                $arr = explode(".", $filename, 2);

                    //--Save Image in Directory--//
                    ImageFacade::make($files[$i]->getRealPath())
                        ->resize(config('Article.image_size.width'), config('Article.image_size.height'))->save(upload_path($filename));

                    //-- Save Image in Database--//
                    $media = new Media();
                    $media->node_id = $node->getKey();
                    $media->path = $filename;
                    $media->name = $arr[0];
                    $media->extension = $arr[1];
                    $media->mimetype = $files[$i]->getClientMimeType();
                    $media->size = ImageFacade::make($files[$i])->filesize();
                    $media->user_id = Auth::user()->id;
                    $media->save();

                    $this->notify('nodes.created');

                    return redirect()->route('reactor.article.edit', [
                        $node->getKey(),
                        $node->translate($locale)->getKey()
                    ]);

            }
        }

        $files = $request->file('galleries');
        $picID = $request->imgID;

        if (count($files[0]) > 0) {
            for ($i = 0; $i < count($files); $i++) {
                $filename = 'article_' . str_random(6) . '_' . $files[$i]->getClientOriginalName();
                $arr = explode(".", $filename, 2);



                    /*Delete From Storage*/

                    $mediaName = Media::where('id', $picID[$i])->first();


                    File::delete(upload_path($mediaName->path));


                    //--Save Image in Directory--//
                    ImageFacade::make($files[$i]->getRealPath())
                        ->resize(config('Article.image_size.width'), config('Article.image_size.height'))->save(upload_path($filename));

                    //-- Save Image in Database--//
                    $media = Media::findOrFail($picID[$i]);
                    $media->node_id = $node->getKey();
                    $media->path = $filename;
                    $media->name = $arr[0];
                    $media->extension = $arr[1];
                    $media->mimetype = $files[$i]->getClientMimeType();
                    $media->size = ImageFacade::make($files[$i])->filesize();
                    $media->user_id = Auth::user()->id;
                    $media->save();

                    $this->notify('nodes.edited', 'updated_node_content', $node);
                    return redirect()->back();


            }
        }

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

        return $this->compileView('Article::translate', compact('form', 'node', 'locale', 'source'), 'Article Translation');
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

        return redirect()->route('reactor.article.edit', [
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

        return redirect()->route('reactor.article.edit', [$node->getKey(), $node->translateOrfirst()->getKey()]);
    }


}