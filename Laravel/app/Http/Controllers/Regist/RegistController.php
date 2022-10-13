<?php

namespace App\Http\Controllers\Regist;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegistController extends Controller
{
    /**
     * 新規会員登録画面の表示
     *
     * @return View
     */
    public function showRegist()
    {
        return view('regist.regist_form');
    }

    /**
     * 新規会員登録を実行
     *
     * @return View
     */
    public function executeRegist(RegistMemberRequest $request)
    {
        // DBインサート
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // 保存
        $user->save();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        // リダイレクト
            return redirect()->route('home');
        }
    }
}
