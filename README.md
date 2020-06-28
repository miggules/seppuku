# seppuku
yes.. seppuku. and no - i am not a weeb. 

. the database was created using phpmyadmin that came along with xampp .
    
everything inserted within the database (as well as its' creation) was done through sql queries.
let me write them out so it could be copy pasted at a later date: 
  
  CREATE DATABASE loginsys;
  
  CREATE TABLE users (
    idusers int(11) NOT NULL AUTO_INCRIMENT PRIMARY KEY,
    uid tinytext NOT NULL,
    emailusers tinytext NOT NULL,
    pwdusers longtext NOT NULL
  );
  
  CREATE TABLE blog (
    bid int(11) NOT NULL AUTO_INCRIMENT PRIMARY KEY,
    uid tinytext NOT NULL,
    date datetime NOT NULL,
    message text NOT NULL
  );
  
. the passwords were hashed, because.. well.. security matters, right? .
