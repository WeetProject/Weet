<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- AOS 라이브러리 css --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- 달력 라이브러리 css --}}
    <link rel="stylesheet" href="https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('images/pabicon.png') }}">
    <script src="{{ asset('js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        <div>
            <Header-Component></Header-Component>
            <!-- 앱컴포넌트 호출 -->
            <App-Component></App-Component>
        </div>
        <div>
            <Footer-Component></Footer-Component>
        </div>
    </div>
    <script src="https://cdn.iamport.kr/v1/iamport.js"></script>
    {{-- AOS 라이브러리 --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    {{-- 달력 라이브러리 --}}
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://unpkg.com/@vuepic/vue-datepicker@latest"></script>
</body>
</html>