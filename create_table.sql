CREATE TABLE user ( 
user_id INTEGER PRIMARY KEY AUTOINCREMENT, 
user_name TEXT UNIQUE, 
screen_name TEXT 
) ;

CREATE TABLE user_pw ( 
user_id INTEGER PRIMARY KEY, 
user_pw_h TEXT 
) ;

CREATE TABLE login_history ( 
id INTEGER PRIMARY KEY AUTOINCREMENT, 
user_id INTEGER, 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
) ;

CREATE TABLE user_level ( 
user_id INTEGER PRIMARY KEY, 
authority_level INTEGER DEFAULT 1 
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

CREATE TABLE error_log ( 
dt_utc TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
err_level INTEGER, 
err_message TEXT 
) ;

INSERT INTO payment_history ( 
dt_utc, ammount ) VALUES ( 
'1900-01-01 00:00:00', 0 
) ;

INSERT INTO receive_history ( 
dt_utc, ammount ) VALUES ( 
'1900-01-01 00:00:00', 0 
) ;

INSERT INTO login_history ( 
dt_utc, user_id ) VALUES ( 
'1900-01-01 00:00:00', 1 
) ;
