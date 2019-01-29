<?php


namespace Extension\Site\Http;


use Illuminate\Http\Request;

use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use Reactor\Entities\Node;
use Reactor\Http\Controllers\Controller;

class SiteController extends Controller
{

    /**
     * Shows the homepage
     *
     * @param NodeRepository $nodeRepository
     * @return View
     */
    public function getHome(NodeRepository $nodeRepository)
    {
        $home = $nodeRepository->getHome();

        return $home;
    }

    public function getLatest(NodeRepository $nodeRepository)
    {
        $nodes = Node::recentlyCreated(10)->get();

        $data = [];
        foreach ($nodes as $key) {

            $media = $key->media()->first();

            $data[] = [
                'title' => $key->getTitle(),
                'img' => 'http://localhost:8000/uploads/' . $media->path
            ];

        }

        return response()->json($data);
    }

    /**
     * Shows a page
     *
     * @param NodeRepository $nodeRepository
     * @param string $name
     * @return View
     */
    public function getPage(NodeRepository $nodeRepository, $name)
    {
        $node = $nodeRepository->getNodeAndSetLocale($name);

        return view('page', compact('node'));
    }

    /**
     * Shows the search page
     *
     * @param string $search
     * @param NodeRepository $nodeRepository
     * @param Request $request
     * @return View
     */
    public function getSearch($search, NodeRepository $nodeRepository, Request $request)
    {
        set_app_locale_with('search', $search);

        $results = $nodeRepository->searchNodes($request->input('q'));

        return view('search', compact('results'));
    }

    /**
     * Shows the tag page
     *
     * @param string $tags
     * @param string $name
     * @return View
     */
    public function getTag($tags, $name)
    {
        set_app_locale_with('tags', $tags);

        $tag = Tag::withName($name)->firstOrFail();

        return view('tag', compact('tag'));
    }

}