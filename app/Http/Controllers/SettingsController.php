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

class SettingsController extends ReactorController
{

    use UseSettingsForm;

    public function index()
    {

        $form = $this->getCreateForm();

        return $this->compileView('settings.index', compact('form'), 'Application Settings');
    }

    public function store(Request $request)
    {

        $this->validateSettingsCreateForm($request);

        $values = array_except($request->all(), ['_token']);


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

        $this->notify('Sattings Updated...', 'settings_update');

        return redirect()->back();

    }
}