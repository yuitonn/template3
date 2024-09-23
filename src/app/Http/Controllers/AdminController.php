<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\StoreQuestionRequest;

class AdminController extends Controller
{
    public function index()
    {
        // クイズのリストを取得し、ページネーションを使用
        $quizzes = Quiz::with('questions.choices')->paginate(5);
    
        // 例えば、最初のクイズを取得する
        $quiz = Quiz::with('questions.choices')->first();
    
        // 取得したクイズデータをビューに渡す
        return view('start', [
            'quizzes' => $quizzes,
            'quiz' => $quiz, // これで特定のクイズをビューに渡す
        ]);
    }

    public function show($id, Request $request)
    {
        $quiz = Quiz::with('questions.choices')->findOrFail($id);
        return view('show', ['quiz' => $quiz]);
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->save();

        return redirect()->route('quizzes.index')->with('success', 'クイズタイトルが更新されました。');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete(); // 論理削除

        return redirect()->route('quizzes.index')->with('success', 'クイズが削除されました。');
    }

    public function create()
    {
        return view('create'); // 新規作成フォームを表示するビュー
    }

    public function store(StoreQuizRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();

        // 新しいクイズを作成
        Quiz::create([
            'name' => $validated['name'],
        ]);

        // クイズ一覧にリダイレクトし、成功メッセージを表示
        return redirect()->route('quizzes.index')->with('success', '新しいクイズのタイトルを作成しました！');
    }

    // ここから選択肢とか

    public function listQuestions(Quiz $quiz)
    {
        // クイズ全体のデータをページネーション付きで取得
        $quizzes = Quiz::paginate(10); // ページネーションを追加

        // 指定されたクイズの質問を取得し、ページネーション
        $questions = $quiz->questions()->paginate(10);

        // ビューにクイズ全体、指定クイズ、質問を渡す
        return view('questions', [
            'quizzes' => $quizzes,  // ページネーション付きのクイズデータ
            'quiz' => $quiz,        // 現在のクイズ
            'questions' => $questions,  // 質問データ
        ]);
    }

    public function createQuestion(Quiz $quiz)
    {
        return view('questionsCreate', compact('quiz'));
    }

    public function storeQuestion(StoreQuestionRequest $request, Quiz $quiz)
    {
        $validated = $request->validated();

        $question = $quiz->questions()->create([
            'text' => $validated['text'],
            'supplement' => $validated['supplement'],
            'image' => $validated['image'] ?? null,
        ]);

        $choices = [
            ['text' => $validated['choice1'], 'is_correct' => $validated['correct_choice'] == 1],
            ['text' => $validated['choice2'], 'is_correct' => $validated['correct_choice'] == 2],
            ['text' => $validated['choice3'], 'is_correct' => $validated['correct_choice'] == 3],
        ];

        $question->choices()->createMany($choices);

    // $quiz->id を使用してリダイレクト
        return redirect()->route('admin.quizzes.questions.index', ['quiz' => $quiz->id])
            ->with('success', '新しい設問を作成しました');
        }


    public function destroyQuestion(Quiz $quiz, $questionId)
    {
        $question = $quiz->questions()->findOrFail($questionId);
        $question->delete();

        return redirect()->route('admin.quizzes.questions.index', ['quiz' => $quiz->id])
            ->with('success', '質問が削除されました。');
    }

    public function editQuestion(Quiz $quiz, $questionId)
    {
        $question = $quiz->questions()->findOrFail($questionId);
        return view('edit', [
        'quiz' => $quiz,
        'question' => $question,
        ]);
    }
}