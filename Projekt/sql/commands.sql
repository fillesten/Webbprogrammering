CREATE TABLE IF NOT EXISTS accounts (
    accountID int (10) PRIMARY KEY AUTO_INCREMENT,
    Uname VARCHAR(30),
    Pword VARCHAR(128),
    Email VARCHAR(30),
    Fullname VARCHAR(30));

-- test inserts 
INSERT INTO accounts (Uname, Pword, Email, Fullname)
VALUES	("testotest", "pw", "test@gmail.com", "testmctest"), 
        ("rando", "randompw", "test@gmail.com", "random"),
        ("tilten", "antonpw", "anton@gmail.com", "Anton");



CREATE TABLE IF NOT EXISTS posts (
    postID int (10) PRIMARY KEY AUTO_INCREMENT,
    meddelande TEXT,
    PostDate VARCHAR (100),
    accountID INT NOT NULL,
    FOREIGN KEY (accountID) REFERENCES accounts (accountID));

/*accountID grejen ska ske automatiskt i koden*/ 

-- test inserts 
INSERT INTO posts (meddelande, PostDate, accountID )
VALUES	("filletests meddelande", "1", "1"),
        ("filletests meddelande", "2", "2"),
        ("filletests meddelande", "3", "3"),
        ("filletests meddelande", "76", "2"),
        ("filletests meddelande", "5", "3"),
        ("filletests meddelande", "15", "1"),
        ("filletests meddelande", "7", "1"),
        ("hans andra meddelande", "100 datum", "2");

