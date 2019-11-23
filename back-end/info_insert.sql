----------------"info_insert.sql" begins------------------
USE aejeong; 

INSERT INTO Components VALUESCREATE TABLE item_category
( category_id INT AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(20) NOT NULL, 
parent INT DEFAULT NULL ); 

INSERT INTO item_category VALUES
(1,'ITEMS',NULL),
(2,'WASHER',1),
(3,'CARE',1),
(4,'HEALTH',1), 
(5,'NUTRITION',4),
(6,'MEDICATION',4)
(7,'SAND',1),
(8,'SHAMPOO',2),
(9,'CONDITIONER',2),
(10,'CLEANER',2), 
(11,'ESSENCE',3), 
(12,'HAIR',3),
(13,'COLORING',3),
(14,'TEETH',5),
(15,'SKIN',5), 
(16,'KIDNEY',5), 
(17,'HEART',5),
(18,'GUT',5),
(19,'DIGEST',5),
(20,'BONE',5), 
(21,'EYE/EAR',5), 
(22,'IMMUNE',5),
(23,'LUNG',5),
(24,'BUG',5), 
(25,'SUPPLEMENT',5),
(26,'TEETH',6),
(27,'SKIN',6), 
(28,'KIDNEY',6), 
(29,'HEART',6),
(30,'GUT',6),
(31,'DIGEST',6),
(32,'BONE',6), 
(33,'EYE/EAR',6), 
(34,'IMMUNE',6),
(35,'LUNG',6),
(36,'BUG',6), 
(37,'DRUG',6),  
(38,'DRUG',6),
(39,'BENTONITE',7),
(40,'SOLID',7),
(41,'SILICAGEL',7), 
(42,'ABSORB',7)
(43,'STERILIZER',7);
 // 나 카페가 닫는대서….. 일단 갈게ㅠㅠㅠ 남은 건 집 가서 나도 수정할게!!!!!!!!!
//응응! 난 그럼 일단 앞에 파일 고쳐보고 있을게 ㅠㅠ!
INSERT INTO Users VALUES
  (1, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (3, 'Michelle Arthur', '357 North Road', 'Yarraville');

INSERT INTO Items VALUES
  ('0-672-31697-8', 'Michael Morgan', 
   'Java 2 for Professional Developers', 34.99),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
  ('0-672-31769-9', 'Thomas Schenk', 
   'Caldera OpenLinux System Administration Unleashed', 49.99);

INSERT INTO Reviews VALUES
  (NULL, 3, 69.98, '2007-04-02'),
  (NULL, 1, 49.99, '2007-04-15'),
  (NULL, 2, 74.98, '2007-04-19'),
  (NULL, 3, 24.99, '2007-05-01');

INSERT INTO Likes VALUES
  (1, '0-672-31697-8', 2),
  (2, '0-672-31769-9', 1),
  (3, '0-672-31769-9', 1),
  (3, '0-672-31509-2', 1),
  (4, '0-672-31745-1', 3);

INSERT INTO Recent VALUES
  ('0-672-31697-8', 'The Morgan book is clearly written and goes well beyond
                     most of the basic Java books out there.');

INSERT INTO Components VALUES
  (1, '0-672-31697-8', 2),
  (2, '0-672-31769-9', 1),
  (3, '0-672-31769-9', 1),
  (3, '0-672-31509-2', 1),
  (4, '0-672-31745-1', 3);

----------------"item_insert.sql" ends------------------
