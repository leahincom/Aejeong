----------------"Aejeong.sql" begins------------------
 // Items(제품이름, 동물종류, 제품사진, 성분, 리뷰작성자)
CREATE TABLE Items
(ItemName CHAR(50) NOT NULL,
PetSort CHAR(50) NOT NULL,
Picture CHAR(255) NOT NULL,
ComponentsName CHAR(30) NOT NULL,
Nickname CHAR(50) NOT NULL,
PRIMARY KEY (ItemName, Picture, ComponentsName, Nickname),
FOREIGN KEY (ComponentsName) REFERENCES Components(ComponentsName),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname)
);
 
 // Users(아이디, 닉네임, 비밀번호, 생년월일, 성별, 전화번호, 이메일, 강아지, 고양이, 기타1, 기타2, 좋아요한상품, 최근본상품)
CREATE TABLE Users
(UserID CHAR(30) NOT NULL,
Nickname CHAR(50) NOT NULL,
Password CHAR(50) NOT NULL,
Birth INT(8) NOT NULL,
Gender CHAR(20) NOT NULL,
PhoneNumber CHAR(20) NOT NULL,
Email CHAR(20) NOT NULL,
Dog INT(4),
Cat INT(4),
etc1 INT(4),  
etc2 INT(4),
PRIMARY KEY (Nickname, UserID)
);

 // Reviews(리뷰작성자, 제품이름, 제품구매날짜, 평점, 장점, 단점, 기타)
CREATE TABLE Reviews
(Nickname CHAR(50) NOT NULL,
ItemName CHAR(50) NOT NULL,
Date DATE NOT NULL,
Rating FLOAT(6,2) NOT NULL,
Advantage TEXT,
Weakness TEXT,
Etc TEXT,
PRIMARY KEY (Nickname, ItemName),
FOREIGN KEY (ItemName) REFERENCES Items(ItemName),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname)
);

 // Likes
CREATE TABLE Likes
(Nickname CHAR(50) NOT NULL,
ItemName CHAR(50) NOT NULL,
Picture CHAR(255) NOT NULL,
PRIMARY KEY (Nickname, ItemName, Picture),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
FOREIGN KEY (ItemName, Picture) REFERENCES Items(ItemName, Picture)
);

 // Recent
CREATE TABLE Recent
(Nickname CHAR(50) NOT NULL,
ItemName CHAR(50) NOT NULL,
Picture CHAR(255) NOT NULL,
Date DATE NOT NULL,
PRIMARY KEY (Nickname, ItemName, Picture),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
FOREIGN KEY (ItemName, Picture) REFERENCES Items(ItemName, Picture)
);

 // Components(성분이름, 성분등급, 특성)
CREATE TABLE Components
(ComponentsName CHAR(30) NOT NULL,
ComponentGrade INT(10) NOT NULL,
Characteristic TEXT,
PRIMARY KEY (ComponentsName)
);
----------------"Aejeong.sql" ends------------------
