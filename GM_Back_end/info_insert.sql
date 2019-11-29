
INSERT INTO item_category VALUES
(1,'ITEMS',NULL),
(2,'WASHER',1),
(3,'CARE',1),
(4,'HEALTH',1), 
(5,'NUTRITION',4),
(6,'MEDICATION',4),
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
(42,'ABSORB',7),
(43,'STERILIZER',7);

INSERT INTO Components VALUES
  ( 'selamectin', 3, 'drug component'),
  ( 'Mineral Oil', 1, 'shampoo component');

INSERT INTO Users VALUES
   ('yesyoumay', 'Lah', 'skwjdgus', 981003, 'female', '01000000000', 'skwjdgus1003@ewhain.net', 1, 1, 0, 0),
  ('KM', 'Lee', 'dlrudals', 980101, 'female' , '01011111111', 'jully0425@ewhain.net' , 2, 0, 0, 0 ),  
  ('KR', 'Hong', 'ghdwodnjs', 010101, 'female', '01000000000', 'ghdwodnjs@ewhain.net',0,0,1,0),
  ('HaJ', 'LHJ', 'dlgkwjd', 990101, 'female', '01000000000', 'dlgkwjd@ewhain.net',0,0,2,2);

INSERT INTO Items VALUES
  ('drug1', 'Cat',  'drug1.png', 'selamectin', 'Lee'),
  ('shampoo', 'Dog', 'shampoo.png', 'Mineral Oil', 'Lah');

INSERT INTO Reviews VALUES
  ('Lah', 'shampoo', '2019-11-24', 3.5, '냄새가 좋아요.', '거품이 잘 안 나요.', '특별한 점이 없어요.'),
  ( 'Hong', 'drug1', '2019-11-24', 3.0 , '안정성이 높아요.', '일시적 탈모 부작용' , '딱히 없습니다.');

INSERT INTO Likes VALUES
  ('Lah', 'shampoo', 'shampoo.png'),
  ('Hong', 'drug1', 'drug1.png');

INSERT INTO Recent VALUES
('Lah', 'shampoo', 'shampoo.png', '2019-11-24'),
  ( 'Hong', 'drug1','drug1.png' ,'2019-11-24');


