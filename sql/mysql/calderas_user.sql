CREATE DATABASE calderas_ina CHARACTER SET utf8 COLLATE utf8_bin;

USE calderas_ina;

CREATE USER IF NOT EXISTS 'calderas_user'@'localhost' IDENTIFIED BY 'Calderas123$';
FLUSH PRIVILEGES;

GRANT SELECT, INSERT, UPDATE, DELETE ON calderas_ina.* TO 'calderas_user'@'localhost';
FLUSH PRIVILEGES;