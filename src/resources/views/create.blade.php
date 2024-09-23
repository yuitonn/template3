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
                    <li class="nav-item"><a href="{{ route('admin.dashboard') }}">問題一覧</a></li>
                    <li class="nav-item"><a href="{{ route('admin.quizzes.create') }}">問題作成</a></li>
                </ul>
            </nav>
        </div>

        <div class="custom-bg-content w-full flex flex-col">
            <div class="m-5 flex-grow space-y-10">
                <h1 class="text-5xl">新しい問題を作成</h1>
                <form action="{{ route('admin.quizzes.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-lg font-medium">問題タイトル</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">作成</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>