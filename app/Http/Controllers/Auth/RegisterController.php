<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    if (isset($data['role'])) {
        $role = $data['role'];
    } else {
        // Si la clé 'role' n'existe pas, définissez une valeur par défaut
        $role = 'admin';
    }
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => 'admin', 
    ]);

    // Si l'enregistrement de l'utilisateur a réussi
    if ($user) {
        // Connectez l'utilisateur
        Auth::login($user);

        // Si le rôle de l'utilisateur est enseignant ou étudiant, redirigez-le vers le tableau de bord approprié
        if ($user->role === 'teacher') {
            return redirect()->route('teacher-dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student-dashboard');
        }

        // Sinon, redirigez-le vers le tableau de bord admin
        return redirect()->route('dashboard');
    }

    // Si l'enregistrement a échoué, redirigez l'utilisateur vers la page d'inscription avec un message d'erreur
    return redirect()->route('register')->with('error', 'Une erreur est survenue lors de l\'enregistrement de l\'utilisateur.');
}
}
