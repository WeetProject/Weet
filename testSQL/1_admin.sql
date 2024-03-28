-- 어드민 데이터
-- 루트 어드민
INSERT INTO admins(admin_flg, admin_number, password, admin_name, created_at)
VALUES ('2', '10001', '$2y$10$FM6XZg42EmujJM4j/b832OEjO/vbmKcj.Gfr7eXfBgwphAugFKuau', '루트관리자', NOW());

-- 서브 어드민
INSERT INTO admins(admin_flg, admin_number, password, admin_name, created_at)
VALUES ('1', '10002', '$2y$10$FM6XZg42EmujJM4j/b832OEjO/vbmKcj.Gfr7eXfBgwphAugFKuau', '서브관리자', NOW());
