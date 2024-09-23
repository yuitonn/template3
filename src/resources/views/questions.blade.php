<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題管理</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .custom-bg-header {
            background-color: #4ec9c3; /* ヘッダーの背景色 */
        }
        .custom-bg-nav {
            background-color: #e4d0aef7; /* ナビゲーションの背景色 */
        }
        .custom-bg-content {
            background-color: #f4e7cf; /* コンテンツの背景色 */
        }
        .nav-item {
            white-space: nowrap;
        }
        .text-underline {
            text-decoration: underline;
            text-decoration-color: #036ced;
            text-decoration-thickness: 2px;
        }
        /* モーダルのスタイル */
        #deleteModal {
            position: fixed;
            inset: 0;
            display: none; /* デフォルトでは非表示 */
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5); /* 背景の半透明 */
            z-index: 9999; /* 高い z-index で最前面に表示 */
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #deleteModal.show {
            display: flex;
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content h2 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .modal-content p {
            margin: 15px 0;
            color: #666;
        }

        .modal-content button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .modal-content .btn-delete {
            background-color: #e63946;
            color: #fff;
        }

        .modal-content .btn-delete:hover {
            background-color: #d62839;
        }

        .modal-content .btn-cancel {
            background-color: #f1f1f1;
            color: #333;
        }

        .modal-content .btn-cancel:hover {
            background-color: #ddd;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="h-screen flex flex-col">
    <header class="custom-bg-header flex justify-between p-4">
        <img src="../assets/img/logo.svg" alt="">
        <a href="{{ route('quizzes.index') }}">ページトップ</a>
    </header>

    <main class="flex-grow flex">
        <div class="custom-bg-nav p-4 w-1/7">
            <nav>
                <ul class="flex flex-col space-y-5 text-blue-600">
                    <li class="nav-item"><a href="">ユーザー招待</a></li>
                    <li class="nav-item"><a href="{{ route('admin.quizzes.start') }}">問題一覧</a></li>
                    <li class="nav-item">
                        <a href="{{ route('admin.quizzes.questions.create', ['quiz' => $quiz->id]) }}">問題作成</a>
                    </li>
                    
                </ul>
            </nav>
        </div>       

        <div class="custom-bg-content w-full flex flex-col">
            <div class="m-5 flex-grow space-y-10">
                <h1 class="text-5xl">設問一覧</h1>
                <div>
                    <ul class="font-bold flex space-x-4 ml-2">
                        <li>ID</li>
                        <li>問題</li>
                    </ul>
                    <hr class="border-black border-1">
                    
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>設問</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->text }}</td>
                                    <td>
                                        <a href="{{ route('admin.quizzes.questions.edit', [$quiz, $question]) }}" class="btn btn-secondary">編集</a>
                                        <form action="{{ route('admin.quizzes.questions.destroy', [$quiz, $question]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="mt-4 p-8">
                        {{ $quizzes->links() }}
                    </div>

                    <!-- 削除モーダル -->
                    <div id="deleteModal">
                        <div class="modal-content">
                            <h2>削除の確認</h2>
                            <p>このアイテムを本当に削除してもよろしいですか？この操作は取り消せません。</p>
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">削除</button>
                                <button type="button" class="btn-cancel" onclick="closeModal()">キャンセル</button>
                            </form>
                        </div>
                    </div>



                    
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/quiz.js') }}" defer></script>
</body>
</html>