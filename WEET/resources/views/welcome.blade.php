<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
</body>
</html>