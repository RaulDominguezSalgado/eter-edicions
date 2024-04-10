<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\ValidationException;

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
        $usersArray=[];
        foreach ($users as $user) {
            $usersArray[] = [
                'id' => $user->id,
                'name' => $user->first_name." ".$user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role->name,
            ];
        }

        // <td>{{ $user->first_name }}</td>
        // <td>{{ $user->last_name }}</td>
        // <td>{{ $user->email }}</td>
        // <td>{{ $user->phone }}</td>
        // <td>{{ $user->role->name }}</td>

        return view('user.index', compact('usersArray','users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
{
    try {
        // Validar los datos de la solicitud
        $validatedData = $request->validated();

        // Crear un nuevo usuario con los datos validados
        $user = User::create($validatedData);

        // Crear una nueva traducción de usuario con los datos validados
        $translationData = [
            'user_id' => $user->id,
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role'],
        ];
        User::create($translationData);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    } catch (ValidationException $e) {
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

        return view('user.edit', compact('user'));
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
