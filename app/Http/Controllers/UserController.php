<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Validation\Rules\Password;

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

        return view('admin.user.index', compact('usersArray', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $roles = Role::all();
        return view('admin.user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, CreateNewUser $createNewUser)
    {
        try {
            // Create user using Fortify's CreateNewUser action
            // this way, Fortify will automatically send the verification email to the new user
            $user = $createNewUser->add($request->all());

            return redirect()->route('users.index')
                ->with('success', 'User created successfully.');
        } catch (QueryException $e) {
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
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
