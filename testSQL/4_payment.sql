-- 결제 데이터
INSERT INTO payment(payment_id, payment_flg, payment_price, user_id, reservation_id, created_at, updated_at)
SELECT
    NULL AS payment_id,
    '0' AS payment_flg,
    FLOOR(RAND() * (999999 - 1000 + 1)) + 1000 AS payment_price,
    FLOOR(RAND() * 100) + 1 AS user_id,
    FLOOR(RAND() * 100) + 1 AS reservation_id,
    NOW() AS created_at,
    NOW() AS updated_at
FROM
    (SELECT * FROM reservation LIMIT 100) AS temp;