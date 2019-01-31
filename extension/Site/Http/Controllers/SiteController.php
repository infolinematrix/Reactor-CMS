<?php


namespace Extension\Site\Http\Controllers;


use Illuminate\Http\Request;

use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\Controller;

class SiteController extends Controller
{

    /**
     * Shows the homepage
     *
     * @param NodeRepository $nodeRepository
     * @return View
     */
    public function getHome()
    {
        return $this->compileView('Site::welcome', [], 'Home Page');
    }

    public function browse()
    {
        return $this->compileView('Site::list', [], 'Browse Page');
    }

    public function single()
    {
        return $this->compileView('Site::single', [], 'Browse Page');
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

    /**
     * Site Contact
     */
    public function getContact()
    {
        return $this->compileView('Site::contact', [], 'Contact Us');
    }
}