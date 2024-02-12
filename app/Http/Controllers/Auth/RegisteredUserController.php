<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules=[
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:'.User::class,'digits:8'],
            'password' => ['required'],
        ];
        $customMessages = [
            'phone.digits' => 'الرقم يجب ان يكون 8 ارقام',
            'phone.unique' => 'هذاالفون موجود مسبقا',
        ];
        
        $request->validate($rules, $customMessages);
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'group' => $request->group,
            'password' => Hash::make($request->password),
            'user_password' => $request->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
