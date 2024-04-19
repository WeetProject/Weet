-- 유저 데이터
INSERT INTO users(
        user_social_flg, 
		user_flg, 
		user_email, 
		password, 
		user_name, 
		user_gender, 
		user_birthdate, 
		user_tel, 
		user_postcode, 
		user_basic_address,
		user_detail_address,
		created_at)
SELECT
    '0',
    '0',
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        '@example.com'
    ), -- 이메일 형식 생성
    '$2y$10$FM6XZg42EmujJM4j/b832OEjO/vbmKcj.Gfr7eXfBgwphAugFKuau', -- 패스워드
    '어드민', -- 사용자 이름
    'M', -- 성별
    '1991-10-02', -- 생년월일
    '01012341234', -- 전화번호
    '12345', -- 우편번호
    '대구', -- 기본주소
    '대구', -- 상세주소
    DATE_ADD(
        '2023-01-01',
        INTERVAL FLOOR(RAND() * 365) DAY
    ) AS created_at -- 생성일자
FROM
    (SELECT @id := @id + 1 AS id FROM (SELECT 0 UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS t, (SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS t2, (SELECT @id := 0) AS dummy LIMIT 100000
    ) AS numbers;