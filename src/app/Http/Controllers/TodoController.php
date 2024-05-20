<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 一覧の表示
    public function index() 
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    // 新規作成の保存
    public function store(TodoRequest $request) 
    {
        $request->validate([
            'content' => 'required|max:20'
        ]);
        
        $todo = $request->only(['content']);
        Todo::create($todo);

        // indexルートにリダイレクト、「Todoを作成しました」という成功メッセージをセッションにフラッシュメッセージを保存
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    // 更新の保存
    public function update(TodoRequest $request)
    {
        // リクエストデータを検証するためのメソッド
        $request->validate([
            'content' => 'required|max:20'
        ]);
    
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        // indexルートにリダイレクト、「Todoを更新しました」という成功メッセージをセッションにフラッシュメッセージを保存
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    // 削除
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
