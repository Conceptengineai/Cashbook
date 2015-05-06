CREATE TABLE user_id ( 
user_id INTEGER PRIMARY KEY AUTOINCREMENT, 
user_name TEXT 
) ;

CREATE TABLE user_pw ( 
user_id INTEGER PRIMARY KEY AUTOINCREMENT, 
user_pw_h TEXT 
) ;

CREATE TABLE user_level ( 
user_id INTEGER PRIMARY KEY AUTOINCREMENT, 
authority_level INTEGER　
) ;

CREATE TABLE authority_level ( 
level_id INTEGER PRIMARY KEY, 
authority_name TEXT 
) ;

CREATE TABLE money_count ( 
count_id INTEGER PRIMARY KEY AUTOINCREMENT, 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
count_1 INTEGER, 
count_5 INTEGER, 
count_10 INTEGER, 
count_50 INTEGER, 
count_100 INTEGER, 
count_500 INTEGER, 
count_1000 INTEGER, 
count_5000 INTEGER, 
count_10000 INTEGER, 
total INTEGER 
) ;

CREATE TABLE payment_history ( 
id INTEGER PRIMARY KEY AUTOINCREMENT, 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
ammount INTEGER, 
note TEXT 
) ;

CREATE TABLE payment_text ( 
id INTEGER PRIMARY KEY, 
note TEXT 
) ;

CREATE TABLE receive_history ( 
id INTEGER PRIMARY KEY AUTOINCREMENT, 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
ammount INTEGER, 
note TEXT 
) ;

CREATE TABLE receive_text ( 
id INTEGER PRIMARY KEY, 
note TEXT 
) ;

CREATE TABLE balance_history ( 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
balance INTEGER 
) ;

INSERT INTO payment_history ( 
dt_utc, ammount ) VALUES ( 
'1900-01-01 00:00:00', 0 
) ;

INSERT INTO receive_history ( 
dt_utc, ammount ) VALUES ( 
'1900-01-01 00:00:00', 0 
) ;

INSERT INTO balance_history ( 
dt_utc, balance ) VALUES ( 
'1900-01-01 00:00:00', 0 
) ;

CREATE TRIGGER insert_payment_t 
INSERT ON payment_history 
BEGIN 
	INSERT INTO balance_history (balance) 
	VALUES ( 
	( SELECT SUM (ammount) FROM receive_history 
	WHERE dt_utc <= DATETIME ('now') ) 
	- 
	( SELECT SUM (ammount) FROM payment_history 
	WHERE dt_utc <= DATETIME ('now') ) 
	) ;
END ;

CREATE TRIGGER insert_receive_t 
INSERT ON receive_history 
BEGIN 
	INSERT INTO balance_history (balance) 
	VALUES ( 
	( SELECT SUM (ammount) FROM receive_history 
	WHERE dt_utc <= DATETIME ('now') ) 
	- 
	( SELECT SUM (ammount) FROM payment_history 
	WHERE dt_utc <= DATETIME ('now') ) 
	) ;
END ;