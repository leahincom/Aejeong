----------------"Aejeong.sql" begins------------------
 // Items(제품이름, 동물종류, 제품사진, 성분, 리뷰작성자)
CREATE TABLE Items 
( ItemName CHAR(50) NOT NULL,
  PetSort CHAR(50) NOT NULL,
  Picture CHAR(500) NOT NULL,
  FOREIGN KEY (ComponentsName) REFERENCES Components(ComponentsName)
  FOREIGN KEY (Nickname) REFERENCES Users(Nickname)
);

/* CREATE TABLE images( 
id int NOT NULL auto_increment, 
image mediumblob NOT NULL,
title varchar(100) DEFAULT NOT NULL,
width smallint(6) DEFAULT NOT NULL,  
height smallint(6) DEFAULT NOT NULL,
filesize int , # 파일크기 
PRIMARY KEY (id) 
) ; 

* 위에서 image 컬럼에 자료형에 대한 간단한 설명
mysql 에는 바이너리를 저장할 수 있는 공간인 blob형이 크기별로 4가지가 있다. 
tinyblob 255byte
blob 64KB 
mediumblob 16MB
longblob 4G
로 되어있다. 하지만 mysql의 바이너리 입출력 처리는 DB에 굉장한 무리를 주므로 mediumblob 사용을 추천한다. */
 
 // Users(아이디, 닉네임, 비밀번호, 생년월일, 성별, 전화번호, 이메일, 강아지, 고양이, 기타1, 기타2, 좋아요한상품, 최근본상품)
CREATE TABLE Users
(UserID CHAR(30) NOT NULL PRIMARY KEY,
Nickname CHAR(50) NOT NULL,
Password CHAR(50) NOT NULL,
Birth INT(8) NOT NULL,
Gender CHAR(20) NOT NULL,
PhoneNumber CHAR(20) NOT NULL,
Email CHAR(20) NOT NULL,
Dog INT(2).
Cat INT(2),
etc1 INT(2),  
etc2 INT(2)
);

 // Reviews(리뷰작성자, 제품이름, 제품구매날짜, 평점, 장점, 단점, 기타)
CREATE TABLE Reviews
( FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
 FOREIGN KEY (ItemName) REFERENCES Items(ItemName),
PRIMARY KEY (Nickname, ItemName),
 Date DATE NOT NULL,
 Rating FLOAT(6.2) NOT NULL,
Advantage TEXT,
Weakness TEXT,
Etc TEXT
);

 // Likes
CREATE TABLE Likes
( FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
FOREIGN KEY (ItemName) REFERENCES Items(ItemName),
  FOREIGN KEY (Picture) REFERENCES Items(Picture)
);

 // Recent
CREATE TABLE Recent
( FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
 FOREIGN KEY (ItemName) REFERENCES Items(ItemName),
 FOREIGN KEY (Picture) REFERENCES Items(Picture),
 Date DATE NOT NULL,
);


 // Components(성분이름, 성분등급, 특성)
CREATE TABLE Components
( ComponentsName CHAR(30) NOT NULL PRIMARY KEY,
 ComponentGrade INT(10) NOT NULL,
 Characteristic TEXT
);
----------------"Aejeong.sql" ends------------------

