<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>quiz一覧</title>
<!-- スタイルシート読み込み -->
<link rel="stylesheet" href="../../public/css/it.quiz.css">
<!-- Google Fonts読み込み -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/it.quiz.css') }}">
@vite(['resources/css/app.css'])
<style>
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

<body>
<header id="js-header" class="l-header p-header">
    <div class="p-header__logo"><img src="{{ asset('img/logo.svg') }}" alt="POSSE"></div>
    <button class="p-header__button" id="js-headerButton"></button>
    <div class="p-header__inner">
    <div class="p-header__official">
        <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer" class="p-header__official__link--line">
        <i class="u-icon__line"></i>
        <span class="">POSSE公式LINEを追加</span>
        <i class="u-icon__link"></i>
        </a>
        <a href="" class="p-header__official__link--website">POSSE 公式サイト<i class="u-icon__link"></i></a>
    </div>
    <ul class="p-header__sns p-sns">
        <li class="p-sns__item">
        <a href="https://twitter.com/posse_program" target="_blank" rel="noopener noreferrer" class="p-sns__item__link"
            aria-label="Twitter">
            <i class="u-icon__twitter"></i>
        </a>
        </li>
        <li class="p-sns__item">
        <a href="https://www.instagram.com/posse_programming/" target="_blank" rel="noopener noreferrer"
            class="p-sns__item__link" aria-label="instagram">
            <i class="u-icon__instagram"></i>
        </a>
        </li>
    </ul>
    </div>
</header>
<!-- /.l-header .p-header -->


<main class="l-main">
    <section class="p-hero p-quiz-hero">
        <div class="l-container">
            <h1 class="p-hero__title">
                <span class="p-hero__title__label">POSSE課題</span>
                <span class="p-hero__title__inline">クイズ一覧</span>
            </h1>
            <a href="{{ route('admin.quizzes.start') }}" class="p-hero__title__label text-blue-600">クイズ管理はこちら</a>
        </div>
    </section>
    <!-- /.p-hero .p-quiz-hero -->

    
    <section>
        @foreach ($quizzes as $quiz)
        <div class="text-center mt-8">
            <a href="{{ route('quizzes.show', ['id' => $quiz->id]) }}" class="text-2xl text-blue-600">
                {{ $quiz->name }}
            </a>
        </div>
        @endforeach

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


        @if (session('success'))
            <div class="text-center mt-8 text-green-500">
                {{ session('success') }}
            </div>
        @endif


    </section>

    <!-- ./p-quiz-box -->
    </div>
    <!-- /.l-container .p-quiz-container -->
</main>

<div class="p-line">
    <div class="l-container">
    <div class="p-line__body">
        <div class="p-line__body__inner">
        <h2 class="p-heading -light p-line__title"><i class="u-icon__line"></i>POSSE 公式LINE</h2>
        <div class="p-line__content">
            <p>公式LINEにてご質問を随時受け付けております。<br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br>下記ボタンより友達追加をお願いします！</p>
        </div>
        <div class="p-line__footer">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
            class="p-line__button">LINE追加<i class="u-icon__link"></i></a>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- /.p-line -->

<footer class="l-footer p-footer">
    <div class="p-fixedLine">
    <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
        class="p-fixedLine__link">
        <i class="u-icon__line"></i>
        <p class="p-fixedLine__link__text"><span class="u-sp-hidden">POSSE</span>公式LINEで<br>最新情報をGET！</p>
        <i class="u-icon__link"></i>
    </a>
    </div>
    <div class="l-footer__inner">
    <div class="p-footer__siteinfo">
        <span class="p-footer__logo">
        <img src="{{ asset('img/logo.svg') }}" alt="POSSE">
        </span>
        <a href="https://posse-ap.com/" target="_blank" rel="noopener noreferrer"
        class="p-footer__siteinfo__link">POSSE公式サイト</a>
    </div>
    <div class="p-footer__sns">
        <ul class="p-sns__list p-footer__sns__list">
        <li class="p-sns__item">
            <a href="https://twitter.com/posse_program" target="_blank" rel="noopener noreferrer"
            class="p-sns__item__link" aria-label="Twitter">
            <i class="u-icon__twitter"></i>
            </a>
        </li>
        <li class="p-sns__item">
            <a href="https://www.instagram.com/posse_programming/" target="_blank" rel="noopener noreferrer"
            class="p-sns__item__link" aria-label="instagram">
            <i class="u-icon__instagram"></i>
            </a>
        </li>
        </ul>
    </div>
    </div>
    <div class="p-footer__copyright">
    <small lang="en">©︎2022 POSSE</small>
    </div>
</footer>
<!-- /.l-footer .p-footer -->
<script src="{{ asset('js/quiz.js') }}" defer></script>
</body>

</html>