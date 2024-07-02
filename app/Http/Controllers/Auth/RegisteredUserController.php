<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nationality' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'bi' => ['string', 'max:255'],
            'passport' => ['string', 'max:255'],
            'card_number' => ['string', 'max:255'],
            'phone_number' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nationality' => $request->nationality,
            'job' => $request->job,
            'email_verified_at' => new \DateTime(),
        ]);

        UserInfo::create([
            'bi' => $request->bi,
            'passport' => $request->passport,
            'card_number' => $request->card_number,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'user_id' => $user->id,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('index', absolute: false));
    }
}
