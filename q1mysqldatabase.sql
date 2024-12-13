CREATE TABLE users (
	id INT(11) NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
	lastName VARCHAR(30) NOT NULL,
   	email VARCHAR(100) NOT NULL UNIQUE,
   	pwd VARCHAR(255) NOT NULL,
   	PRIMARY KEY(id)
);

INSERT INTO users (firstName, lastName, email,pwd) VALUES 
	('Ahmed', 'Said', 'ahmed@gmail.com','ahmed1234'), 
	('hamed', 'bader', 'hamed.bader@gmail.com', 'ham66ed'), 
	('Omar', 'Fahmy', 'omar@gmail.com', 'omar&111&'), 
	('Hassan', 'Zaki', 'zaki@gmail.com', 'hassan9876'), 
	('Ali', 'Sami', 'ali.sami@gmail.com', 'ali5432'), 
	('Zaid', 'Ahmed', 'zaid.ahmed@gmail.com', 'zaid12345'), 
	('Youssef', 'Ali', 'youssef@gmail.com', 'youssef2023'), 
	('Tariq', 'Yassin', 'tariq.yassin@gmail.com', 'tariq8888'), 
	('Khalid', 'Ismail', 'khalid.ismail@gmail.com', 'khalid4321');


CREATE TABLE partners (
    partner_id INT(11) NOT NULL , 
    names VARCHAR(30) NOT NULL,                   
    shopName VARCHAR(30) NOT NULL,               
    email VARCHAR(100) NOT NULL UNIQUE,                 
    PRIMARY KEY (partner_id)           
);

INSERT INTO partners (partner_id, names, shopName,email) VALUES 
    (10, 'hanaa', 'hanovil','hanovil@gmail.com'), 
    (11, 'saif', 'slfit','saif@gmail.com'), 
    (12, 'Abdullah', 'abdullah shops','abdShops@gmail.com'), 
    (13, 'rawda', 'al Rawda','rawda@gmail.com'), 
    (14, 'Khalil', 'alkhali Fruits','fruits@gmail.com'), 
    (15, 'omar', 'Abu Omar','aboOmar@gmail.com'), 
    (16, 'Khalid', 'themar alkhair','alkhair@gmail.com'), 
    (17, 'raed', 'alraed','alraed@gmail.com');


CREATE TABLE feedback (
    feedback_id INT PRIMARY KEY AUTO_INCREMENT,
    names VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    messages TEXT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5)
);

INSERT INTO feedback (names, email, messages, rating) VALUES
	('Ahmed Said', 'ahmed@gmail.com', 'Great experience, easy to use!', 5),
	('Hamed Bader', 'hamed.bader@gmail.com', 'Could be improved, but overall okay.', 3),
	('Omar Fahmy', 'omar@gmail.com', 'Loved the user interface, very intuitive.', 4),
	('Hassan Zaki', 'zaki@gmail.com', 'Had some issues with loading times, but helpful support team.', 3),
	('Ali Sami', 'ali.sami@gmail.com', 'Fantastic service, I will recommend it to others!', 5),
	('Zaid Ahmed', 'zaid.ahmed@gmail.com', 'Not bad, but needs more features.', 2),
	('Youssef Ali', 'youssef@gmail.com', 'Excellent! Everything works perfectly.', 5),
	('Tariq Yassin', 'tariq.yassin@gmail.com', 'The platform is great but could use some minor improvements.', 4),
	('Khalid Ismail', 'khalid.ismail@gmail.com', 'Overall good experience, but support response was slow.', 3);
COMMIT;
