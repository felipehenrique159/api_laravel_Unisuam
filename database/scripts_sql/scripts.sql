create database sistema_indicacoes;

CREATE TABLE public.status_indicacao
(
    id integer NOT NULL DEFAULT nextval('status_indicacao_autoincrement'::regclass),
    descricao character varying(45) COLLATE pg_catalog."default",
    CONSTRAINT status_indicacao_pkey PRIMARY KEY (id)
)

CREATE SEQUENCE public.status_indicacao_autoincrement
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

ALTER TABLE status_indicacao ALTER COLUMN id SET DEFAULT NEXTVAL('status_indicacao_autoincrement'::regclass);


INSERT INTO status_indicacao (descricao) VALUES ('Iniciada');
INSERT INTO status_indicacao (descricao) VALUES ('Em processo');
INSERT INTO status_indicacao (descricao) VALUES ('Finalizada');

CREATE TABLE public.indicacoes
(
    id integer NOT NULL DEFAULT nextval('indicacoes_autoincrement'::regclass),
    nome character varying(45) COLLATE pg_catalog."default",
    cpf character varying(11) COLLATE pg_catalog."default",
    telefone character varying(45) COLLATE pg_catalog."default",
    email character varying(45) COLLATE pg_catalog."default",
    status_id integer,
    CONSTRAINT indicacoes_pkey PRIMARY KEY (id),
    CONSTRAINT fk_status_indicacao FOREIGN KEY (status_id)
        REFERENCES public.status_indicacao (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);
	

CREATE SEQUENCE public.indicacoes_autoincrement
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

ALTER TABLE indicacoes ALTER COLUMN id SET DEFAULT NEXTVAL('indicacoes_autoincrement'::regclass);



