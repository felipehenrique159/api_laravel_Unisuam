## Aplicação Back end Unisuam 

## Comandos para rodar a aplicação
- cp .env.example .env  (Configurar .env corretamente com o ambiente atual)
- composer install
- php artisan config:cache (Rodar após a configuração do .env para limpar os cache)
- php artisan config:clear
- php artisan serve

## Uso de Migrate e Seeder

- Foi criado migrate para as tabelas e seeder para popular a tabela de status_indicacao, ao criar as tabelas a partir das migrate suas sequences tambem serão geradas automaticamente.

## Comandos

- php artisan migrate
- php artisan db:seed  (popula a tabela status_indicacao com dados)

## Path de stripts DB Postgre

./database/scripts_sql/scripts.sql

## Sobre a aplicação
Aplicação back end no formato API rest, usada para Crud, tratativa e validações de dados vindo de aplicação front end ou integração externa, api faz validação em Cpf e Email usando Request personalizado com regras usando o Laravel Validation, além do uso de models, Enum, migrate e seed.

## Tecnologias utilizadas:

- ### Laravel 8

## Tecnologias para teste na Api:

- ### Postman
- ### XDebuger

Link para aplicação front end: https://github.com/felipehenrique159/front_end_Unisuam
