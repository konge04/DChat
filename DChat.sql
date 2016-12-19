CREATE DATABASE PChat;
use PChat;

CREATE TABLE User(
	id	int,
	loginid	varchar(32),
	password	varchar(16),
	dispname	varchar(32),
	del_flag	bool,
	lastlogin_date	datetime,
	
	PRIMARY KEY(id)
);

CREATE TABLE Chat(
	cid		int,
	id		int,
	chat	varchar(255),
	register_date		datetime,
	
	PRIMARY KEY(cid)
	);
	
INSERT INTO User(id, loginid, password, dispname, del_flag, lastlogin_date)
VALUES (1, 'tom', 'nosushinolife', 'GOD', false, '2016-12-19 10:00:00'),
		(2, 'mike', 'apple2016', 'Taro', false, '2016-12-19 10:05:00'),
		(3, 'mary', 'c@ndyclash', 'Yoko', false, '2016-12-19 10:10:00');

