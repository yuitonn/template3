
<header class="header" id="header">
    <a href="./posse site.html">
        <img src="{{ asset('img/logo.svg') }}" alt="posse" class="hader-logo">
    </a>
    <button class="header-button" id="js-headerButton">
        <span class="header-buttonLine" id="js-button"></span>
        <span class="header-buttonLine" id="js-button"></span>
        <span class="header-buttonLine" id="js-button"></span>
    </button>
    <nav class="header-nav" id="header-nav">
        <ul class="header-nav-letter">
            <li class="header-li-1"><a href="#about" id="text">POSSEとは</a></li>
            <li class="header-li-1"><a href="#event">イベント</a></li>
            <li class="header-li-1"><a href="#daily">日常生活</a></li>
        </ul>
        <ul class="header_info">
            <li class="header_info_li">
                <a href="https://line.me/R/ti/p/@651htnqp?from=page" class="header-ctaLink">
                    LINE追加
                </a>
            </li>
            <li class="header_info_li">
                <a href="#" class="header-corporateLink">POSSE 公式サイト</a>
            </li>
        </ul>
        <ul class="header-li">
            <li class="header-SNSicon">
                <a href="https://twitter.com/posse_2024">
                    <img src="{{ asset('img/icon-twitter.png') }}" alt="twitter" class="header-icon-img">
                </a>
            </li>
            <li class="header-SNSicon">
                <a href="https://www.instagram.com/posse_programming/">
                    <img src="{{ asset('img/icon-instagram.png') }}" alt="instagram" class="header-icon-img">
                </a>
            </li>
        </ul>
    </nav>
</header>


<x-app-layout>
    
    <section class="main-img" id="main-img">
        <div class="main-container">
            <h1 class="main-tittle">学生プログラミングコミュニティ POSSE（ポッセ）</h1>
            <p class="main-index">自分史上最高を仲間と。</p>
        </div>
        <div>
            <a href="#main-img" class="SCROLL">⚫︎SCROLL DOWN</a>
        </div>
    </section>
    <!-- ここからPOSSEとは -->

    <section class="section1" id="about">
        <div>
            <h1 class="main_tittle">POSSEとは</h1>
            <p class="main_sub_tittle">About POSSE</p>
        </div>
        <div class="main_index">
            <div class="main_img">
                <img src="{{ asset('/img/img-about.jpg') }}" alt="POSSEとは" class="main_img">
            </div>
            <div class="main_index2">
                <p>
                    学生プログラミングコミュニティ「POSSE(ポッセ)」は、人格とプログラミング、二つの面での成長をスローガンに活動しており、大学生だけ
                    が集まって学びを深めるコミュニティです。プログラミングだけではありません。オフラインでのイベントや、旅行など様々な企画を行っています!
                    それらを通じて、夏休みの大半をPOSSEで出来た仲間と過ごす人もたくさんいるほどメンバーとの仲が深まります
                </p>
            </div>
        </div>
    </section>

    <!-- ここからイベント -->
    <section class="section2" id="event">
        <div class="section2-index">
            <h1>イベント</h1>
            <h2 class="main_sub_tittle">Event</h2>
            <p class="section-div-p">POSSE では、年内に数多くのイベントを行っています。こちらに掲示してあるのはイベントの一部です。<br>
                プログラミングだけでなく、これらのイベントを共に経験し、仲間との友情はより深まります。</p>
        </div>
        <div id="js-eventSlide" class="splide">
            <div class="splide__track">
                <ul class="section2-block splide__list">
                    <li class="section2-block2 splide__slide">
                        <div>
                            <img src="{{ asset('/img/img-event01.jpg')}}" alt="" class="section2-black-img">
                        </div>
                        <h4>2021.April</h4>
                        <h2>入学式</h2>
                    </li>
                    <li class="section2-block2 splide__slide">
                        <div>
                            <img src="{{ asset('/img/img-event02.jpg')}}" alt="" class="section2-black-img">
                        </div>
                        <h4>2021.Mar</h4>
                        <h2>軽井沢旅行</h2>
                    </li>
                    <li class="section2-block2 splide__slide">
                        <div>
                            <img src="{{ asset('/img/img-event03.jpg')}}" alt="" class="section2-black-img">
                        </div>
                        <h4>2021.April</h4>
                        <h2>オープン講演会</h2>
                    </li>
                    <li class="section2-block2 splide__slide">
                        <div>
                            <img src="{{ asset('/img/img-event04.jpg')}}" alt="" class="section2-black-img">
                        </div>
                        <h4>2021.April - June</h4>
                        <h2>チーム開発</h2>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 日常生活 -->
    <section class="section3" id="daily">
        <div class="Daily_div">
            <h1 >日常生活</h1>
            <h2 class="main_sub_tittle">Daily Record</h2>
            <p class="section-p">様々な日々の活動について紹介します。<br>
                POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。<br>
                入会時期が半年毎にあるため、縦の繋がりから学べることは非常に多く、この繋がりを意識した班を構成したり、<br>
                それとは別に同期のみの班を構成して共に学習するようなシステムを採用しています。
            </p>
        </div>
        <div>
            <div id="js-eventSlide2" class="splide">
                <div class="splide__track">
                    <ul class="section3_ul splide__list">
                        <li class="section3_li splide__slide">
                            <div>
                                <h3 class="section3_tittle"><span class="section3_sp">01</span>ミートアップ</h3>
                                <ul class="section3_subtittle">
                                    <li class="section3_index">⚫︎毎週月曜日 19:00~22:00</li>
                                    <li class="section3_index">⚫︎全員参加</li>
                                </ul>
                                <div>
                                    <p class="section3_index">全体ミーティングです。各局からのお知らせや、講演会など目白押しです。</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('/img/img-daily01.jpg')}}" 
                                alt="POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。" class="section3_img">
                            </div>
                        </li>
                        <li class="section3_li2 splide__slide">
                            <div class="section_3_div">
                                <h3 class="section3_tittle"><span class="section3_sp">02</span>縦もく</h3>
                                <ul class="section3_subtittle">
                                    <li class="section3_index">⚫︎週2回 2時間</li>
                                </ul>
                                <div>
                                    <p class="section3_index">期生関係なくzoomを繋ぎ、わからないところを先輩に質問できます。わかるまで丁寧に教えてくれます。</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('/img/img-daily02.jpg')}}" 
                                alt="POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。" class="section3_img2">
                            </div>
                        </li>
                        <li class="section3_li splide__slide">
                            <div>
                                <h3 class="section3_tittle"><span class="section3_sp">03</span>横もく</h3>
                                <ul class="section3_subtittle">
                                    <li class="section3_index">⚫︎週1回 3時間</li>
                                </ul>
                                <div>
                                    <p class="section3_index">同期と3～4人一組で学習しながら、わからないところを共有、質問できます。オフラインで集合したり、共にハッカソンに挑んだりします。</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('/img/img-daily03.jpg')}}" 
                                alt="POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。" class="section3_img">
                            </div>
                        </li>
                        <li class="section3_li2 splide__slide">
                            <div class="section_3_div">
                                <h3 class="section3_tittle"><span class="section3_sp">04</span>スペもく</h3>
                                <ul class="section3_subtittle">
                                    <li class="section3_index">⚫︎週1回 1時間</li>
                                    <li class="section3_index">⚫︎全員参加</li>
                                </ul>
                                <div>
                                    <p class="section3_index">メンターさんからのアドバイスを受けることができます。毎回得る知識が多く、とてもありがたい機会です。</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('/img/img-daily04.jpg')}}" 
                                alt="POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。" class="section3_img2">
                            </div>
                        </li>
                        <li class="section3_li splide__slide">
                            <div>
                                <h3 class="section3_tittle"><span class="section3_sp">05</span>飯もく</h3>
                                <ul class="section3_subtittle">
                                    <li class="section3_index">⚫︎不定期 3時間</li>
                                    <li class="section3_index">⚫︎全員参加</li>
                                </ul>
                                <div>
                                    <p class="section3_index">ご飯を食べながら作業をします。表参道の美味しいお店をたくさん発見できることが楽しいです！</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('/img/img-daily05.jpg')}}" 
                                alt="POSSEでは、プログラミングを学んでいくにあたってメンバー同士が共に学習するような時間を数多く設けています。" class="section3_img">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <!-- ここから公式ライン -->
    <section class="section4">
        <ul class="section4_ul">
            <li class="section4_img">
                <img src="{{ asset('/img/icon-line.svg')}}" 
                alt="POSSE">
            </li>
            <li>
                <h2 class="section4_tittle">POSSE 公式LINE</h2>
            </li>
        </ul>
        <div>
            <p class="section4_index text-gray-600">公式 LINE にてご質問を随時受け付けております。<br>
                詳細や POSSE 最新情報につきましては、公式 LINE にてお知らせ致しますので<br>
                下記ボタンより友達追加をお願いします！</p>
        </div>
        <div class="section4_link">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank">LINE追加</a>
        </div>
    </section>



    
    
    <footer>
        <hr class="hr">
        <div class="footer-index"
            ><a href="https://posse.community/" class="ext_icon" target="_blank">POSSE公式サイト</a>
        </div>
        <ul class="footer-icon">
            <li>
                <a href="https://twitter.com/posse_2024">
                    <img src="{{ asset('img/icon-twitter.png') }}" alt="twitter">
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/posse_programming/">
                    <img src="{{ asset('img/icon-instagram.png') }}" alt="instagram">
                </a>
            </li>
        </ul>
        <hr class="hr">
    <div class="small"><small>&copy; 2023 POSSE</small></div>
    </footer>
    
</x-app-layout>