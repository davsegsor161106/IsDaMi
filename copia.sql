-- Crear la base de datos (puedes cambiar el nombre si lo deseas)

CREATE DATABASE alquiler_coches;

\c alquiler_coches -- Conectarse a la base de datos recién creada

-- Configuración general

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

-- Tabla: cliente

CREATE TABLE public.cliente (
    codcli character(4) NOT NULL,
    nombre character varying(20),
    apellido character varying(40),
    direccion character varying(50),
    mail character varying(100),
    rol character varying(50),
    password character varying(50)
);
ALTER TABLE public.cliente OWNER TO postgres;

-- Tabla: coche

CREATE TABLE public.coche (
    matricula character(7) NOT NULL,
    modelo character varying(40),
    foto character varying(15),
    codgama character(2) NOT NULL,
    coste numeric
);
ALTER TABLE public.coche OWNER TO postgres;

-- Tabla: gama

CREATE TABLE public.gama (
    codgama character(2) NOT NULL,
    nomgama character varying(20),
    stock integer,
    precio money,
    combustible character(1),
    motor character(1),
    plazas integer,
    maletas integer
);
ALTER TABLE public.gama OWNER TO postgres;

-- Tabla: reserva

CREATE TABLE public.reserva (
    codreserva integer NOT NULL,
    fecha_res date NOT NULL,
    f_inicio date,
    f_fin date,
    dias integer,
    lugar character varying(50),
    importe money DEFAULT 0,
    gama character varying(2) NOT NULL,
    codcliente character varying(4) NOT NULL,
    f_devolucion date
);
ALTER TABLE public.reserva OWNER TO postgres;

-- Insertar datos en cliente

INSERT INTO public.cliente (codcli, nombre, apellido, direccion, mail) VALUES
('1   ', 'Pepe', 'García', 'Ausiach March, 23', 'pep@gmailx.com'),
('2   ', 'Lucas', 'Iniesta', 'Ausiach March, 23', 'lui@gmailx.com'),
('3   ', 'Ana', 'Lorca Sanz', 'Ausiach March, 23', 'annta@gmailx.com');

-- Insertar datos en coche

INSERT INTO public.coche (matricula, modelo, foto, codgama, coste) VALUES
('1111AAA', 'Volvo z', 'foto1.jpg', 'F1', 20),
('1112AAA', 'Volvo EX40', 'foto2.jpg', 'F1', 25),
('1001BBB', 'Ford Focus', 'foto4.jpg', 'F1', 25),
('1003TTT', 'Citroen e-c3', 'foto5.jpg', 'T1', 30),
('3003LLL', 'Mercedes', 'foto6.jpg', 'L1', 40),
('3333BBB', 'Volvo XC90', 'foto7.jpg', 'L1', 50),
('4444NNN', 'Volvo XC1', 'foto10.jpg', 'F1', 25),
('1113AAA', 'Audi A3', 'foto3.jpg', 'F2', 30),
('6666NNN', 'Fiesta', 'foto8.jpg', 'F2', 25),
('6612NNN', 'Audi A3', 'foto9.jpg', 'F2', 25);

-- Insertar datos en gama

INSERT INTO public.gama (codgama, nomgama, stock, precio, combustible, motor, plazas, maletas) VALUES
('L1', 'Lujo', 2, '23,00 €', 'E', 'A', 7, 4),
('F2', 'Familiar', 3, '23,00 €', 'F', 'M', 5, 3),
('T1', '4 x 4', 1, '23,00 €', 'E', 'A', 7, 4),
('F1', 'Familiar', 4, '15,00 €', 'H', 'A', 5, 3);



