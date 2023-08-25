

CREATE TABLE if NOT EXISTS GuestBookTable (
    postID int (10) PRIMARY KEY AUTO_INCREMENT,
    PostDate VARCHAR (100),
	Username VARCHAR (100), 
	Post VARCHAR (200));





INSERT INTO GuestBookTable (Username, Post, PostDate)
VALUES	('Becker', 'lorem ipsum', 'datum :)'), 
		('Bowie', 'lorem ipsum', 'datum :)'), 
		('Carrington', 'lorem ipsum', 'datum :)'); 