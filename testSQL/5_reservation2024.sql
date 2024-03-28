INSERT INTO reservation(
    reservation_flight_number, 
    reservation_departure_time, 
    reservation_arrival_time, 
    reservation_last_name, 
    reservation_first_name, 
    reservation_gender, 
    reservation_birth_date, 
    reservation_country, 
    reservation_id_card, 
    reservation_passport_num, 
    reservation_passport_date, 
    reservation_full_name, 
    reservation_email, 
    reservation_phone, 
    reservation_departure_airport, 
    reservation_arrival_airport, 
    user_id, 
    reservation_refund_flg, 
    reservation_insurance_flg, 
    reservation_ticket_price, 
    created_at, 
    updated_at
)
SELECT
    FLOOR(RAND() * (9999 - 1000 + 1)) + 1000 AS reservation_flight_number,
    CONCAT(FLOOR(RAND() * 24), ':', LPAD(FLOOR(RAND() * 60), 2, '0')) AS reservation_departure_time,
    CONCAT(FLOOR(RAND() * 24), ':', LPAD(FLOOR(RAND() * 60), 2, '0')) AS reservation_arrival_time,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_last_name,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_first_name,
    CASE WHEN RAND() > 0.5 THEN 'M' ELSE 'F' END AS reservation_gender,
    DATE_ADD('1950-01-01', INTERVAL FLOOR(RAND() * (YEAR('2002-12-31') - YEAR('1950-01-01') + 1)) YEAR) AS reservation_birth_date,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_country,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_id_card,
    CONCAT('AB', FLOOR(RAND() * 10000)) AS reservation_passport_num,
    DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('2010-01-01') + FLOOR(RAND() * (UNIX_TIMESTAMP('2025-12-31') - UNIX_TIMESTAMP('2010-01-01')))), '%Y-%m-%d') AS reservation_passport_date,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_full_name,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        '@example.com'
    ) AS reservation_email,
    FLOOR(RAND() * (99999999999 - 10000000000 + 1)) + 10000000000 AS reservation_phone,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_departure_airport,
    CONCAT(
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1),
        SUBSTRING('abcdefghijklmnopqrstuvwxyz', FLOOR(RAND() * 26) + 1, 1)
    ) AS reservation_arrival_airport,
    FLOOR(RAND() * 100) + 1 AS user_id,
    CASE WHEN RAND() > 0.5 THEN 'Y' ELSE 'N' END AS reservation_refund_flg,
    CASE WHEN RAND() > 0.5 THEN 'Y' ELSE 'N' END AS reservation_insurance_flg,
    FLOOR(RAND() * 1000) + 1 AS reservation_ticket_price,
    CONCAT('2024-', LPAD(FLOOR(RAND() * 12) + 1, 2, '0'), '-', LPAD(FLOOR(RAND() * 28) + 1, 2, '0'), ' ', LPAD(FLOOR(RAND() * 24), 2, '0'), ':', LPAD(FLOOR(RAND() * 60), 2, '0'), ':', LPAD(FLOOR(RAND() * 60), 2, '0')) AS created_at,
    NOW() AS updated_at
FROM
    (SELECT 0 UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS t1,
    (SELECT 0 UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS t2
LIMIT 100;
