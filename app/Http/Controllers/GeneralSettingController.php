<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
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
        foreach($settings as $setting){
            $settingsArray[] = [
                'category' => $setting->category,
                'key' => $setting->key,
                'value' => $setting->value
            ];
        }

        return view('admin.generalSetting.index', compact('settingsArray', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $settings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = new GeneralSetting();
        return view('admin.generalSetting.create', compact('setting'));
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
        try{
            $setting = GeneralSetting::findOrFail($id);

            return view('admin.generalSetting.show', compact('setting'));
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        // $user = User::find($id);
        // $roles = Role::all();

        // return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralSettingRequest $request, GeneralSetting $setting)
    {
        // $user->update($request->validated());

        // return redirect()->route('users.index')
        //     ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        // User::find($id)->delete();

        // return redirect()->route('users.index')
        //     ->with('success', 'User deleted successfully');
    }
}
