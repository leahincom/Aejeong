CREATE TABLE Components
(ComponentsName CHAR(30) NOT NULL,
ComponentGrade INT(10) NOT NULL,
Characteristic TEXT,
PRIMARY KEY (ComponentsName)
);

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

CREATE TABLE Likes
(Nickname CHAR(50) NOT NULL,
ItemName CHAR(50) NOT NULL,
Picture CHAR(255) NOT NULL,
PRIMARY KEY (Nickname, ItemName, Picture),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
FOREIGN KEY (ItemName, Picture) REFERENCES Items(ItemName, Picture)
);

CREATE TABLE Recent
(Nickname CHAR(50) NOT NULL,
ItemName CHAR(50) NOT NULL,
Picture CHAR(255) NOT NULL,
Date DATE NOT NULL,
PRIMARY KEY (Nickname, ItemName, Picture),
FOREIGN KEY (Nickname) REFERENCES Users(Nickname),
FOREIGN KEY (ItemName, Picture) REFERENCES Items(ItemName, Picture)
);
