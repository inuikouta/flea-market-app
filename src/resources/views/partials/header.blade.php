<header class='header'>
    <div class="header__logo">
        <img src="{{ asset('images/header/log.png') }}" alt="Logo">
        <img src="{{ asset('images/header/vector_c.png') }}" alt="Logo c">
        <img src="{{ asset('images/header/vector_o.png') }}" alt="Logo o">
        <img src="{{ asset('images/header/vector_a.png') }}" alt="Logo a">
        <img src="{{ asset('images/header/vector_c.png') }}" alt="Logo c">
        <img src="{{ asset('images/header/vector_h.png') }}" alt="Logo h">
        <img src="{{ asset('images/header/vector_t.png') }}" alt="Logo t">
        <img src="{{ asset('images/header/vector_e.png') }}" alt="Logo e">
        <img src="{{ asset('images/header/vector_c.png') }}" alt="Logo c">
        <img src="{{ asset('images/header/vector_h.png') }}" alt="Logo h">
    </div>
    <div class='header__search'>
        <form action="{{ route('products.index') }}" method="GET" class="header__search__form">
            <input type="text" name="search" class="header__search__input" placeholder="なにをお探しですか？">
        </form>
    </div>
    <div class="header__menu">
        @guest
            <a href="#" class="header__menu__item">ログイン</a>
        @endguest
        @auth
            <!-- ↓ 隠しフォーム（画面には見えない） -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <!-- ↓ 見た目はリンクだけど、クリックすると上のフォームが送信される -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header__menu__item">
                ログアウト
            </a>
        @endauth
        <a href="#" class="header__menu__item">マイページ</a>
        <a href="#" class="header__menu__item">
            <div class="header__menu__item__btn">
                <span class="header__menu__item__btn__text">出品</span>
            </div>
        </a>
    </div>
</header>