<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

//        dd($is_image);

        return view('users.index', ['auth' => $auth, 'is_image' => $is_image]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editName()
    {
        $auth = Auth::user();

        return view('users.edit', ['auth' => $auth]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function updateName(Request $request)
    {
        // 対象レコード取得
        $id = Auth::user()->id;

        $auth = User::find($id);

        // リクエストデータ受け取り
        $form = $request->all();

        // フォームトークン削除
        unset($form['_token']);

        // レコードアップデート
        $auth->fill($form)->save();

        return redirect('user')->with('flash_message', '名前を更新しました。');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editMail()
    {
        $auth = Auth::user();

        return view('users.editmail', ['auth' => $auth]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function updateMail(Request $request)
    {
        // 対象レコード取得
        $id = Auth::user()->id;

        $auth = User::find($id);

        // リクエストデータ受け取り
        $form = $request->all();

        // TODO:バリデーション

        // フォームトークン削除
        unset($form['_token']);

        // レコードアップデート
        $auth->fill($form)->save();

        return redirect('user')->with('flash_message', 'メールアドレスを更新しました。');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editPassword()
    {
        $auth = Auth::user();

        return view('users.editpassword', ['auth' => $auth]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updatePassword(Request $request)
    {
        //現在のパスワードが正しいかを調べる
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');

    }

    public function store(ProfileRequest $request)
    {
        $request
            ->photo
            ->storeAs('public/profile_images', Auth::id() . '.jpg');

        return redirect('user')
            ->with('flash_message', 'プロフィール画像を更新しました。');
    }
}
