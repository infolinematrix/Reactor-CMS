<?php


namespace Extension\Site\Http\Controllers;


use Illuminate\Http\Request;

use Reactor\Hierarchy\NodeRepository;
use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\Controller;

class MemberController extends Controller
{

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
        return $this->compileView('Site::member.profile', [], 'Profile');
    }

}