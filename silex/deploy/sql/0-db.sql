-- in db postgres with postgres user
\c postgres
DROP DATABASE IF EXISTS rutorika;
DROP ROLE IF EXISTS rutorika;
CREATE ROLE rutorika ENCRYPTED PASSWORD 'rutorika' LOGIN;
CREATE DATABASE rutorika OWNER rutorika;
GRANT ALL ON DATABASE rutorika TO rutorika;
\c rutorika