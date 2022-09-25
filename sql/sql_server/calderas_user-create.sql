CREATE LOGIN calderas_user
    WITH PASSWORD = 'Calderas123$';
    
USE Calderas;

CREATE USER calderas_user FOR LOGIN calderas_user
    WITH DEFAULT_SCHEMA = Calderas;

GRANT CONNECT TO calderas_user;

GRANT SELECT, INSERT, UPDATE, DELETE ON DATABASE :: Calderas TO calderas_user;