<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();
        $usersArray = [];
        foreach ($users as $user) {
            $usersArray[] = [
                'id' => $user->id,
                'name' => $user->first_name . " " . $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role->name,
            ];
        }
        
        return view('user.index', compact('usersArray', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $roles = Role::all();
        return view('user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            // Validar los datos de la solicitud
            $validatedData = $request->validated();

            // Crear una nueva traducción de usuario con los datos validados
            $translationData = [
                //'user_id' => $user->id,
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'phone' => $validatedData['phone'],
                'role_id' => $validatedData['role_id'],
            ];
            User::create($translationData);

            return redirect()->route('users.index')
                ->with('success', 'User created successfully.');

        } catch (QueryException $e) {
            // Manejar otras excepciones de la base de datos si es necesario
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
