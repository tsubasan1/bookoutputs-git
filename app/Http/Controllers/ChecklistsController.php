<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Checklist;

class ChecklistsController extends Controller
{
   // getでchecklists/にアクセスされた場合の「一覧表示処理」
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

    return view('books.selectchecklist', $data);
    
    }

    // getでchecklists/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でchecklistを検索して取得
        $checklist = \App\Checklist::findOrFail($id);

        // 本情報詳細ビューでそれを表示
        return view('books.changecreate', [
            'checklist' => $checklist,
        ]);
    }
    // getでchecklists/createにアクセスされた場合の「新規本情報、登録画面表示処理」
    public function create()
    {
        $checklist = new Checklist;

        // 本情報作成ビューを表示
        return view('books.create', [
            'checklist' => $checklist,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'checklist' => 'required|max:255',
        ]);
        $checklist = new Checklist();
        $checklist->book_id = $request->book_id;

        $checklist->checklist = $request->checklist;
        $checklist->save();
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    
}