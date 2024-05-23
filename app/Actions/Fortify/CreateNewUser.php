<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetWelcomeEmail;
use Exception;
use Illuminate\Database\QueryException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        (Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'phone' => ['nullable', 'max:20'],
            'role_id' => ['required', 'integer'],
        ])->validate());

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'role_id' => $input['role_id'],
        ]);
    }

    /**
     * Validate and create a newly added user (added by admin).
     *
     * @param  array<string, string>  $input
     */
    public function add(array $input): User
    {
        try {
            // dd($input);
            (Validator::make($input, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                // 'password' => $this->passwordRules(),
                'phone' => ['nullable', 'max:20'],
                'role_id' => ['required', 'integer'],
            ])->validate());

            $user = User::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make(rand()),
                'phone' => $input['phone'],
                'role_id' => $input['role_id'],
            ]);

            // Create a request instance with email data
            $request = new Request(['email' => $input['email']]);
            // dd($request);

            // Instantiate PasswordResetLinkController
            $passwordResetLinkController = new PasswordResetLinkController();

            // Call store method on PasswordResetLinkController
            $passwordResetLinkController->store($request);

            return $user;
        } catch (QueryException $e) {
            $user->destroy();
            abort(500, $e->getMessage()); // Manejar otras excepciones de la base de datos si es necesario
        } catch (Exception $e) {
            $user->destroy();
            abort(500, $e->getMessage());
        }
    }
}
