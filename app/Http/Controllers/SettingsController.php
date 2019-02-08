<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/8/17
 * Time: 3:21 PM
 */

namespace ReactorCMS\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use ReactorCMS\Entities\Settings;
use ReactorCMS\Http\Controllers\Traits\UseSettingsForm;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\File;

class SettingsController extends ReactorController
{

    use UseSettingsForm;

    public function index()
    {


        $form = $this->getCreateForm();
        $site_logo = getSettings('site_logo');

        return $this->compileView('settings.index', compact('form','site_logo'), 'Application Settings');
    }

    public function store(Request $request)
    {

        $this->validateSettingsCreateForm($request);

        $values = array_except($request->all(), ['_token']);



        $file = $request->file('site_logo');


        if($file){

            $filename = str_random(6).'_' . $file->getClientOriginalName();

            //--Save Image in Directory--//
            File::delete(upload_path(getSettings('site_logo')));
            $destination_path = public_path('/' . $filename);
            ImageFacade::make($file->getRealPath())
                ->resize(163, 36)->save($destination_path);

            foreach ($values as $key => $value) {

                Settings::where('variable', $key)->update(['value' => $value]);
                Cache::forget('settings_' . $key);
            }

            Settings::where('variable','site_logo')->update(['value' => $filename]);


        }else {
            foreach ($values as $key => $value) {

                Settings::where('variable', $key)->update(['value' => $value]);
                Cache::forget('settings_' . $key);
            }

        }
        $this->notify('Sattings Updated...', 'settings_update');

        return redirect()->back();

    }
}