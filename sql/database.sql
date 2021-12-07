--- Database creation -- One Table "user"

CREATE DATABASE php; 

\connect php

CREATE TABLE public."kecamatan" (
    id integer NOT NULL,
    kodedagri number,
    kecamatan text,
    luas numeric,

);

--- Create User

-- CREATE USER php_app_user with encrypted password 'mypass';
-- GRANT CONNECT ON DATABASE php TO php_app_user;

--- Insert one sample data if you want
--INSERT INTO public."user" (name,email,mobile_no,address) VALUES ('Sample', 'sample@example.com', '8006927753', 'One Infinite Loop, Cupertino, CA 95014');

--- Permissions
--GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE public."user" TO php_app_user;
--GRANT ALL ON SEQUENCE public.user_id_seq TO php_app_user;
-- or more permissive permissions:
GRANT USAGE ON SCHEMA public TO php_app_user;
