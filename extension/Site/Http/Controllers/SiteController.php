<?php


namespace Extension\Site\Http\Controllers;


use Illuminate\Http\Request;

use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\Controller;
use Mail;
use UxWeb\SweetAlert\SweetAlert;
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

        $categories = Node::WhereExtensionAttribute('categories', 'popular', 1)->take(10)->get();
        $locations = Node::WhereExtensionAttribute('locations', 'popular', 1)->take(10)->get();


        return $this->compileView('Site::welcome', compact('categories','locations'), 'Home Page');
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

        return $this->compileView('Site::page', compact('node'), 'Page');
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
     * BROWSE BY CATEGORY / LOCATION
     */
    public function getBrowse($name, NodeRepository $nodeRepository)
    {
        // get Node
        //$node = $nodeRepository->getNodeAndSetLocale($name);
        //dd($node);
        //Get Node Type
        //$node_type = $node->getNodeType();

        //--Temp
        //$node->setMeta('location', ['a', 'b', 'c']);
        //$node->setMeta('category', 6);
        //$node = $node->fresh();

        $node = $nodeRepository->getNode($name);

        $lo = $node->getMeta('location');
        dd($lo);
        //dd($node->getKey());
        //$models = $node->whereMeta('category', 6)->get();
        //$models = $node->whereHasMeta('location', ['x  '])->first();
        //dd($models->getKey());
        //dd($node_type->getKey());
    }

    /**
     * Site Contact
     */
    public function getContact()
    {
        return $this->compileView('Site::contact', [], 'Contact Us');
    }

    public function postContact(Request $request){
        $data = [
            'name' => $request->name_contact,
            'last_name' => $request->lastname_contact,
            'email' => $request->email_contact,
            'phone' => $request->phone_contact,
            'content' => $request->message_contact,
        ];

        \Config::set('mail', getMailconfig());

        Mail::send('mail.contact', $data, function ($message) use ($data) {
            $message->from($data['email'], getSettings('site_title'));
            $message->subject('Contact Us');
            $message->to(getSettings('email_from_email'));
            $message->replyTo($data['email'], $data['name']);
        });


        SweetAlert::message('Thank you. We receive your message.')->autoclose(4000);

        return redirect()->back();
    }



}