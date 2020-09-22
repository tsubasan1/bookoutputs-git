<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Change;    // 追加

class ChangesController extends Controller
{
    
    
    // getでchanges/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でchangeを検索して取得
        $change = \App\Change::findOrFail($id);
        $checklist = $change->checklist;
        $book = $change->checklist->book;
        // 本情報詳細ビューでそれを表示
        return view('users.show', [
            'change' => $change,
            'checklist' => $checklist,
            'book' => $book,
        ]);
    }

    
    // getでchecklists/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $change = new Change;

        // change作成ビューを表示
        return view('books.changecreate', [
            'change' => $change,
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'now' => 'required|max:255',
            'future' => 'required|max:255',

        ]);
        $change = new Change();
        $change->checklist_id = $request->checklist_id;
        $change->now = $request->now;
        $change->future = $request->future;

        $change->save();
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
        // getでchanges/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でchangeを検索して取得
        $change = \App\Change::findOrFail($id);
        $checklist = \App\Checklist::findOrFail($id);
        $book = $change->checklist->book;
        // 認証済みユーザ（閲覧者）がその本情報の所有者である場合は、
        if (\Auth::id() === $book->user_id) {
        // 本情報編集ビューでそれを表示
        return view('users.edit', [
            'book' => $book,
            'checklist' => $checklist,
            'change' => $change,
        ]);
        }

        // トップページへリダイレクトさせる
        return redirect('/');

    }
        // putまたはpatchでchanges/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
   {

       // バリデーション
        $request->validate([
            'image'=>'required',
            'title' => 'required|max:255',
            'auther' => 'required|max:255',
            'checklist' => 'required|max:255',
            'now' => 'required|max:255',
            'future' => 'required|max:255',
        ]);
        
        // idの値でchangeを検索して取得
        $change = \App\Change::findOrFail($id);
        $checklist = \App\Checklist::findOrFail($id);
        $book = \App\Book::findOrFail($id);
        
        $checklist = $change->checklist;
        $book = $change->checklist->book;
        // 認証済みユーザ（閲覧者）がその本情報の所有者である場合は、
        if (\Auth::id() === $book->user_id) {
        // 本情報を更新
  
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`image-hozon`フォルダへアップロード
        $path = \Storage::disk('s3')->putFile('image-hozon', $image, 'public');
        // アップロードした画像のフルパスを取得
        if ($request->hasFile('image_path')) {
        $book->image_path = \Storage::disk('s3')->url($path);
        }
        if ($request->has('title')) {
        $book->title = $request->title;
        }
        if ($request->has('auther')) {
        $book->auther = $request->auther;
        }
        $checklist->checklist = $request->checklist;
        $change->now = $request->now;
        $change->future = $request->future;
        
        $book->save();
        $checklist->save();
        $change->save();
        }

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    // deleteでchanges/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で本情報を検索して取得
        $change = \App\Change::findOrFail($id);
        $checklist = \App\Checklist::findOrFail($id);
        $book = \App\Book::findOrFail($id);

        $checklist = $change->checklist;
        $book = $change->checklist->book;

        // 本情報を削除
        $change->delete();
        $checklist->delete();
        $book->delete();
        

        // トップページへリダイレクトさせる
        return redirect('/');
    }

}
