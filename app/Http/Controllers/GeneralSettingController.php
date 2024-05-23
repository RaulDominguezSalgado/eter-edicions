<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Exception;
use Illuminate\Database\QueryException;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = GeneralSetting::paginate();
        $settingsArray = [];
        foreach ($settings as $setting) {
            $settingsArray[] = [
                'id' => $setting->id,
                'category' => $setting->category,
                'key' => $setting->key,
                'value' => $setting->value
            ];
        }

        return view('admin.general-setting.index', compact('settingsArray', 'settings'))
            ->with('i', (request()->input('page', 1) - 1) * $settings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = new GeneralSetting();
        return view('admin.general-setting.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneralSettingRequest $request, GeneralSetting $setting)
    {
        try {
            $setting = GeneralSetting::create($request->validated());

            return redirect()->route('settings.index')
                ->with('success', 'Setting created successfully.');
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $setting = GeneralSetting::findOrFail($id);

            return view('admin.general-setting.show', compact('setting'));
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $setting = GeneralSetting::findOrFail($id);

            return view('admin.general-setting.edit', compact('setting'));
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralSettingRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $setting = GeneralSetting::findOrFail($id);

            $setting->update($validatedData);

            $setting->save();

            return redirect()->route('general-settings.index')
                ->with('success', 'Setting updated successfully');
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // GeneralSetting::findOrFail($id)->delete();

            // return redirect()->route('general-settings.index')
            //     ->with('success', 'Setting deleted successfully');
            return redirect()->back();
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }



    protected function getSettingsFromCategory($key)
    {
        try {
            $settings = GeneralSetting::where('category', $key)->get();

            return $settings;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public static function getSetting($key)
    {
        try {
            $setting = GeneralSetting::where('key', $key)->first();

            return $setting;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public static function getGeneralInfo()
    {
        try {
            $generalSettings = [];
            $settings = (new self)->getSettingsFromCategory('general');

            foreach ($settings as $setting) {
                $generalSettings[$setting->key] = $setting->value;
            }

            return $generalSettings;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public static function getLegalInfo()
    {
        try {
            $legalSettings = [];
            $settings = (new self)->getSettingsFromCategory('legal_info');

            foreach ($settings as $setting) {
                $legalSettings[$setting->key] = $setting->value;
            }

            return $legalSettings;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public static function getContactInfo()
    {
        try {
            $contactSettings = [];
            $settings = (new self)->getSettingsFromCategory('contact');

            foreach ($settings as $setting) {
                $contactSettings[$setting->key] = $setting->value;
            }

            return $contactSettings;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public static function getSocials()
    {
        try {
            $socialsSettings = [];
            $settings = (new self)->getSettingsFromCategory('social_networks');

            foreach ($settings as $setting) {
                $socialsSettings[$setting->key] = [
                    "name" => $setting->key,
                    "url" => $setting->value,
                ];
            }

            return $socialsSettings;
        } catch (QueryException $e) {
            abort(500, $e->getMessage());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }
}
