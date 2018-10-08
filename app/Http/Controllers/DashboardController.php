<?php


namespace ReactorCMS\Http\Controllers;


use Reactor\Hierarchy\Node;
use ReactorCMS\Statistics\DashboardStatisticsCompiler;

class DashboardController extends ReactorController
{

    /**
     * Shows the dashboard
     * @param DashboardStatisticsCompiler $compiler
     * @return view
     */
    public function index(DashboardStatisticsCompiler $compiler)
    {

        $params = [
            'recentlyCreated' => Node::recentlyCreated(10)->get(),
            'recentlyEdited' => Node::recentlyEdited(10)->get()
        ];

        if (tracker()->saveEnabled()) {
            $params['statistics'] = $compiler->compileStatistics();
            $params['mostVisited'] = Node::mostVisited(10)->get();
            $params['recentlyVisited'] = Node::recentlyVisited(10)->get();
        }

        return $this->compileView('dashboard.index', $params, trans('general.dashboard'));
    }

    /**
     * Shows the activity for the user
     *
     * @return Response
     */
    public function activity()
    {
        $activities = chronicle()->getRecords(30);

        return $this->compileView('dashboard.activity', compact('activities'), trans('general.recent_activity'));
    }

}