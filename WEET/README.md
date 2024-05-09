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

6. JWT
    - 참고 : https://hacktam.kr/etclec/120?sca=php
    - 참고 : https://jwt-auth.readthedocs.io/en/docs/laravel-installation/
    - composer require tymon/jwt-auth (필수)
    - php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider" (생략가능)
    - php artisan jwt:secret (필수)

7. 날짜초기화 라이브러리
    - 참고 : https://date-fns.org
    - npm install date-fns

8. jwt 토큰 decode
    - npm install vue-jwt-decode

9. ApexCharts 라이브러리
    - npm install --save apexcharts
    - npm install --save vue3-apexcharts

10. npm audit fix 검색해보기

11. 뷰티파이
    - npm i vuetify

12. Social Login
    - 참고 : https://vuxy.tistory.com/entry/Laravel-8-%EC%86%8C%EC%85%9C%EB%A1%9C%EA%B7%B8%EC%9D%B8Laravel-Socialite-1
    - composer require laravel/socialite
    - composer require socialiteproviders/kakao
    + 5/8 추가 : composer require socialiteproviders/google

13. CSV 파일 import
    - 마이그레이트 후 HeidSQL
    - HeidSQL > 도구 > csv 파일 가져오기
    - 파일 등록
    - 인코딩 : utf8mb4: UTF-8 Unicode
    - 필드 종결자 ,
    - 테이블 : 파일명과 동일한 테이블 선택
    - pk, created_at, updated_at, deleted_at 체크 해제
    - 가져오기

14. 세계 공항, 나라, 도시 데이터 출처
    - https://www.partow.net/

15. scout 검색 기능
    - 초기 설정자 및 작업자 공통 설정 필요 O
    - composer require laravel/scout
    - 초기 설정자 제외 하단 설정 필요 X
    - php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
    - config > scout.php 45줄 'queue' => env('SCOUT_QUEUE', true),
    - composer require algolia/algoliasearch-client-php
    - index import(데이터 수정 시 import 필요)
    - php artisan scout:import "App\Models\Airport"
    - index flush(데이터 삭제 시 flush 필요)
    - php artisan scout:flush "App\Models\Airport"
    - 참고 : https://laravel.com/docs/11.x/scout#introduction

16. debounce 사용 목적 Lodash 라이브러리 설치
    - npm install lodash

17. 달력 라이브러리
    - npm install @vuepic/vue-datepicker
    - 참고 : https://vue3datepicker.com/installation/

18. 데이트 포맷 라이브러리
    - npm install date-fns --save
    - 참고 : https://date-fns.org/v2.16.1/docs/Getting-Started

19. AOS(Animate on scroll library) 라이브러리
    - npm install aos --save
    - 참고 : https://github.com/michalsnik/aos/tree/v2
            https://michalsnik.github.io/aos/
