<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
    
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            if ($user->role === 'teacher') {
                if (!Teacher::where('user_id', $user->id)->exists()) {
                    // Créer un nouvel enseignant si celui-ci n'existe pas déjà
                    Teacher::create([
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'password' =>$user->mot_de_passe
                        // Ajoutez d'autres champs nécessaires
                    ]);
                }
                return redirect()->route('teacher-dashboard');
            } elseif ($user->role === 'student') {
                if (!Student::where('user_id', $user->id)->exists()) {
                    // Créer un nouvel étudiant si celui-ci n'existe pas déjà
                    Student::create([
                        'user_id' => $user->id,
                        // Ajoutez d'autres champs nécessaires
                    ]);
                }
                return redirect()->route('student-dashboard');
            } else {
                return $this->sendLoginResponse($request);
            }
        }
    
        return $this->sendFailedLoginResponse($request);
    }
    }