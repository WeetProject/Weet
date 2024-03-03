----설치할 라이브러리?----
1. laravel
    - composer install (vendor생성)
    - .env.example >복사> .env
    - php artisan key:generate (APP_KEY생성)

2. vue
    npm install    뷰 install (node_modules생성)
    npm install vue-router@4     라우터 설정
    npm install vuex@next --save    뷰엑스설치
    npm install axios    엑시오스설치
    npm install --save-dev vue     디펜던시에 뷰 추가
    npm install --``save-dev vue-loader   모듈없어서 에러날때 설치
    webpack.mix.js  이거 가져가기
    npm run dev / npm run watch    뷰파일 변경시 실행

    설치시 에러
    composer clear-cache    페이커오류시npm install vuex@next --sav
    composer clearcache

3. tailwind
    - 참고(tailwind 공식사이트) : https://tailwindcss.com/docs/installation
    - 최초로 연동하는 것 아니면 아래의 명령어만 입력
        npm install -D tailwindcss
        npx tailwindcss init

4. SCSS
    - 이부분은 확인 후 수정해줄 것.
    - 참고(scss설명 및 명령어, 설치과정) : https://inpa.tistory.com/entry/SCSS-%F0%9F%92%8E-SassSCSS-%EB%9E%80-%EC%84%A4%EC%B9%98-%EB%B0%8F-%EC%BB%B4%ED%8C%8C%EC%9D%BC
    - npm install -g node-sass
    - component 추가
        <style lang="scss">
            @import '../sass/app.scss';
        </style>

5. Bootstrap Icons
    - 참고 : https://icons.getbootstrap.kr/?q=hand
    - npm i bootstrap-icons
    - <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
