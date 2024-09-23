<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規問題作成</title>
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
              
                    
                </ul>
            </nav>
        </div>

        <div class="custom-bg-content w-full flex flex-col">
            <div class="m-5 flex-grow space-y-10">
                <h1 class="text-5xl">新しい設問を作成</h1>

                <form action="{{ route('admin.quizzes.questions.store', $quiz) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="text">設問</label>
                        <input type="text" name="text" id="text" class="form-control" required>
                        @error('text')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="supplement">設問補足</label>
                        <input type="text" name="supplement" id="supplement" class="form-control">
                        @error('supplement')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="choice1">選択肢1</label>
                        <input type="text" name="choice1" id="choice1" class="form-control" required>
                        @error('choice1')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="choice2">選択肢2</label>
                        <input type="text" name="choice2" id="choice2" class="form-control" required>
                        @error('choice2')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="choice3">選択肢3</label>
                        <input type="text" name="choice3" id="choice3" class="form-control" required>
                        @error('choice3')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>正解の選択肢</label>
                        <div>
                            <input type="radio" name="correct_choice" value="1" id="correct_choice1" required>
                            <label for="correct_choice1">選択肢1</label>
                        </div>
                        <div>
                            <input type="radio" name="correct_choice" value="2" id="correct_choice2" required>
                            <label for="correct_choice2">選択肢2</label>
                        </div>
                        <div>
                            <input type="radio" name="correct_choice" value="3" id="correct_choice3" required>
                            <label for="correct_choice3">選択肢3</label>
                        </div>
                        @error('correct_choice')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>