<?php

namespace ReactorCMS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Compiles view for display
     *
     * @param string $view
     * @param array $parameters
     * @param string $title
     * @return view
     */


    public function getHome(){

       return view('index');
    }

    public function validateForm($form, Request $request, array $overrideRules = [])
    {
        $form = $this->form($form);

        // We set the flash message here because there is nowhere else to do it
        flash()->error('Error Saving');

        $this->validate(
            $request,
            $form->getRules($overrideRules)
        );

        // We forget the message back again as the validation passed
        session()->forget('flash_notification');
    }

    public function notify($message = null, $subject = null, $type = 'success')
    {
        $notifier = app('flash');

        if (!is_null($message)) {
            return $notifier->message($message, $subject);
        }

        return $notifier;
    }


    protected function compileView($view, array $parameters = [], $title = null)
    {
        $parameters['pageTitle'] = ($title ?: trans($view));

        return view($view, $parameters);
    }
}
