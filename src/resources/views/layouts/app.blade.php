<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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