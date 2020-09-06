<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BooksController extends Controller
{
   // getでbooks/にアクセスされた場合の「一覧表示処理」
    public function index()
    
    {
    $data = [];
    if (\Auth::check()) { // 認証済みの場合
        // 認証済みユーザを取得
        $user = \Auth::user();
        // ユーザの投稿の一覧を作成日時の降順で取得
        $books = $user->books()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'books' => $books,
        ];
    }
    // Welcomeビューでそれらを表示
    return view('welcome', $data);
    
    }
       // getでnewbooks/にアクセスされた場合の「一覧表示処理」
    public function index2()
    
    {
    $data = [];
    if (\Auth::check()) { // 認証済みの場合
        // 認証済みユーザを取得
        $user = \Auth::user();
        // ユーザの投稿の一覧を作成日時の降順で取得
        $books = $user->books()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'books' => $books,
        ];
    }
    // 本情報一覧ビューでそれらを表示
    return view('books.selectbook', $data);
    
    }
    // getでbooks/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でbookを検索して取得
        $book = \App\Book::findOrFail($id);

        // リスト作成ビューでそれを表示
        return view('books.checklistcreate', [
            'book' => $book,
        ]);
    }

    // getでbooks/createにアクセスされた場合の「新規本情報、登録画面表示処理」
    public function create()
    {
        $book = new Book;

        // 本情報作成ビューを表示
        return view('books.bookcreate', [
            'book' => $book,
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'auther' => 'required|max:255',
        ]);

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`image-hozon`フォルダへアップロード
        $path = \Storage::disk('s3')->putFile('image-hozon', $image, 'public');

        // 認証済みユーザ（閲覧者）の本情報として作成（リクエストされた値をもとに作成）
        $request->user()->books()->create([
        // 本情報を作成
        
        'image_path' => \Storage::disk('s3')->url($path),
        'title' => $request->title,
        'auther' => $request->auther,

        ]);
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
        // getでchanges/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でchangeを検索して取得
        $change = \App\Change::findOrFail($id);
        $book = $change->checklist->book;
        // 認証済みユーザ（閲覧者）がその本情報の所有者である場合は、
        if (\Auth::id() === $book->user_id) {
        // 本情報編集ビューでそれを表示
        return view('users.edit', [
            'book' => $book,
            'change' => $change,
        ]);
        }

        // トップページへリダイレクトさせる
        return redirect('/');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        // putまたはpatchでchanges/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
   {

       // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'auther' => 'required|max:255',
            'now' => 'required|max:255',
            'future' => 'required|max:255',
            'effect' => 'required|max:255',
            'why' => 'required|max:255',
            'result' => 'required|max:255',
        ]);
        
        // idの値でchangeを検索して取得
        $change = \App\Change::findOrFail($id);
        $book = $change->checklist->book;
        // 認証済みユーザ（閲覧者）がその本情報の所有者である場合は、
        if (\Auth::id() === $book->user_id) {
        // 本情報を更新
  
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`image-hozon`フォルダへアップロード
        $path = \Storage::disk('s3')->putFile('image-hozon', $image, 'public');
        // アップロードした画像のフルパスを取得
        $book->image_path = \Storage::disk('s3')->url($path);
        $book->title = $request->title;
        $book->auther = $request->auther;

        $change->now = $request->now;
        $change->future = $request->future;
        $change->effect = $request->effect;
        $change->why = $request->why;
        $change->result = $request->result;
        
        $book->save();
        $change->save();
        }

        // トップページへリダイレクトさせる
        return redirect('/');

    }
    // deleteでbooks/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で本情報を検索して取得
        $book = \App\Book::findOrFail($id);

        // 本情報を削除
        $book->delete();

        // トップページへリダイレクトさせる
        return back();
    }

}