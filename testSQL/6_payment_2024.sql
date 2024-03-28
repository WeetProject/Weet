INSERT INTO payment(payment_id, payment_flg, payment_price, user_id, reservation_id, created_at, updated_at)
SELECT
    NULL AS payment_id,
    '0' AS payment_flg,
    FLOOR(RAND() * (999999 - 1000 + 1)) + 1000 AS payment_price,
    FLOOR(RAND() * 100) + 1 AS user_id,
    FLOOR(RAND() * 100) + 1 AS reservation_id,
    CONCAT('2024-', LPAD(FLOOR(RAND() * 12) + 1, 2, '0'), '-', LPAD(FLOOR(RAND() * 28) + 1, 2, '0'), ' ', LPAD(FLOOR(RAND() * 24), 2, '0'), ':', LPAD(FLOOR(RAND() * 60), 2, '0'), ':', LPAD(FLOOR(RAND() * 60), 2, '0')) AS created_at,
    NOW() AS updated_at
FROM
    (SELECT * FROM reservation LIMIT 100) AS temp;