INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('伊藤','test1@jp','無いよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('山田','test2@jp','あるよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('佐藤','test10@com','無いよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('森田','test20@jp','あるよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('鈴木','test3@com','無いです',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('吉田','test30@jp','無いよ',sysdate())




SELECT*FROM gs_an_table
SELECT name,indate,email FROM gs_an_table
SELECT*FROM gs_an_table WHERE id=1 OR id=2
SELECT*FROM gs_an_table WHERE email LIKE '%test1%'
SELECT*FROM gs_an_table ORDER BY id DESC
SELECT*FROM gs_an_table ORDER BY id DESC LIMIT 3 



INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name,:email,:naiyou,sysdate())