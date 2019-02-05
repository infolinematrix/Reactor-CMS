<?php


namespace Extension\Site\Http\Controllers;


use extension\Site\Helpers\UseAppHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\Tags\TagRepository;
use ReactorCMS\Http\Controllers\Controller;
use Mail;
use ReactorCMS\Statistics\NodeStatisticsCompiler;
use UxWeb\SweetAlert\SweetAlert;
use ReactorCMS\Site\Entities\Appointment;

class SiteController extends Controller
{

    use UseAppHelper;

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


        return $this->compileView('Site::welcome', compact('categories', 'locations'), 'Home Page');
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
     * Shows Search result page by tags
     *
     * @param NodeRepository $nodeRepository
     * @param string $name
     * @return View
     */
    public function SearchByTags(Request $request, TagRepository $tagRepository, NodeRepository $nodeRepository)
    {

        $name = $request->input('q');
        $tag = $tagRepository->getTag($name);

        $nodes = Node::WithTag($tag->id)->get();

        return $this->compileView('Site::list', compact('nodes'), 'Browse');
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
        $node = $nodeRepository->getNodeAndSetLocale($name);
        $val = $node->getKey();

        $nodes = Node::whereMeta('location', 'like', "%{$val}%")->get();;

        return $this->compileView('Site::list', compact('nodes'), 'Browse');
    }

    /**
     * PROFILE
     */
    public function getProfile($name, NodeRepository $nodeRepository, NodeStatisticsCompiler $compiler, TagRepository $tagRepository)
    {
        // get Node
        $node = $nodeRepository->getNodeAndSetLocale($name);

        $location = getProfileLocation($node->getKey());

        // Keywords
        $keywords = $node->tags()->get();

        // Views
        $statistics = $compiler->compileStatistics($node);
        $viewed = $statistics['total_visits'];
        $lastviewed = $statistics['last_visited'];
        //$views = $node->trackerViews();
        //dd($statistics);

        /*Education*/
        $educations = $node->children()
            ->sortable()
            ->translatedIn(locale())
            ->get();


        //-- Test post review
        //$user = Auth::guard('web').user();

        $review = $node->createReview([
            'title' => 'Some title',
            'body' => 'Some body',
            'rating' => 5,
        ], $node);


        return $this->compileView('Site::profile', compact('node', 'educations', 'location', 'keywords', 'viewed', 'lastviewed'), 'Browse');
    }

    public function booking(Request $request){


        $pdata = [
            'node_id' => $request->node_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'patient_name' => $request->patient_name,
            'patient_email' => $request->patient_email,
            'patient_contact' => $request->patient_contact,
            'zip_code' => $request->patient_zipcode,
        ];

        Appointment::insert($pdata);

        \Config::set('mail', getMailconfig());

        $node = Node::find($request->node_id);
        $doctoName = $node->profile_firstname.' '.$node->profile_lastname;
        $data = [

            'doctor' => $doctoName,
            'email' => $node->profile_email,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'patient_name' => $request->patient_name,
            'patient_email' => $request->patient_email,
            'patient_contact' => $request->patient_contact,
            'patient_zipcode' => $request->patient_zipcode,
        ];

        Mail::send('mail.appointment', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Appointment to Dr. '.$data['doctor']);
            $message->to($data['email']);
            $message->replyTo($data['patient_email'], $data['patient_name']);
        });

        $response = array(
            'status' => 'Success',
            'message' => '<span class="text text-info">' . __('Appointment sent to Dr. '.$doctoName) . '</span>',
        );

        return \Response::json($response);

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