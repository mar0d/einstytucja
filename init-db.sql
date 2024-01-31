CREATE DATABASE einstytucja;
CREATE USER einstytucja WITH PASSWORD 'einstytucja';
ALTER ROLE einstytucja SET client_encoding TO 'utf8';
GRANT ALL PRIVILEGES ON DATABASE einstytucja TO einstytucja;