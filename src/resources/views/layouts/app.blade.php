<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    @yield('header') {{-- ヘッダーを部分テンプレートとして呼び出し --}}

    <main>
        @yield('content')      {{-- 各ページごとにメイン部分を差し込む --}}
    </main>
    
    @yield('js')
</body>
</html>