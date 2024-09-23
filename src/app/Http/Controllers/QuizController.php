<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        // クイズのリストを取得
        $quizzes = Quiz::with('questions.choices')->get();
        return view('quizzes', ['quizzes' => $quizzes]);
    }

    public function show($id, Request $request)
    {
        // 特定のクイズを取得
        $quiz = Quiz::with('questions.choices')->findOrFail($id);
        return view('show', ['quiz' => $quiz]);
    }
    public function edit($id)
    {
        // 編集するクイズを取得
        $quiz = Quiz::findOrFail($id);

        // 編集画面を表示
        return view('edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        // フォームデータのバリデーション
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // クイズを取得して更新
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->save();

        // クイズ一覧にリダイレクト
        return redirect()->route('quizzes.index')->with('success', 'クイズタイトルが更新されました。');
    }
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete(); // 論理削除

        return redirect()->route('quizzes.index')->with('success', 'クイズが削除されました。');
    }
}