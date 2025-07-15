<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
public function showRegisterForm()
    {
        return view('register');
    }

public function register(RegisterRequest $request)
{
    Register::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/mypage/profile')->with('message', '登録が完了しました');
}

public function login()
    {
        return view('login');
    }


public function showProfileForm()
{
    return view('profile');
}

public function doLogin(LoginRequest $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/')->with('message', 'ログインに成功しました');
    } else {
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません',
        ])->withInput();
    }
}

public function index()
{
    $items = Item::all();

    $myItems = Item::all();

    return view('index', compact('items', 'myItems'));
}

}
