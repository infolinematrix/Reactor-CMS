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
<<<<<<< HEAD
use Intervention\Image\Facades\Image as ImageFacade;
=======

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
class SettingsController extends ReactorController
{

    use UseSettingsForm;

    public function index()
    {

<<<<<<< HEAD

        $form = $this->getCreateForm();
        $site_logo = getSettings('site_logo');

        return $this->compileView('settings.index', compact('form','site_logo'), 'Application Settings');
=======
        $form = $this->getCreateForm();

        return $this->compileView('settings.index', compact('form'), 'Application Settings');
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    }

    public function store(Request $request)
    {

        $this->validateSettingsCreateForm($request);

        $values = array_except($request->all(), ['_token']);


<<<<<<< HEAD

        $file = $request->file('site_logo');


        if($file){

            $filename = str_random(6).'_' . $file->getClientOriginalName();

            //--Save Image in Directory--//
            $destination_path = public_path('/' . $filename);
            ImageFacade::make($file->getRealPath())
                ->resize(config('site.site_logo.width'), config('site.site_logo.height'))->save($destination_path);

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
=======
        $tblSettings = new Settings;
        $tblSettings->truncate();

        //---Crear Caches if exest ---//

        foreach ($values as $key => $value) {

            $tblSettings->create([
                'variable' => $key,
                'value' => $value
            ]);

            Cache::forget('settings_' . $key);
        }

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        $this->notify('Sattings Updated...', 'settings_update');

        return redirect()->back();

    }
}