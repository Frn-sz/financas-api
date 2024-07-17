# Repositório para API de app de controle financeiro

## Tecnologias usadas

-   PHP
-   Laravel
-   PostgresSQL


## Requisitos para subir local

- Ter PHP >8.2 instalado
- Ter Composer instalado
- Ter PostgresSQL instalado
- Criar banco "financas" no Postgres e completar no .env

### Comandos
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
npm install
```

## Rodar servidor local

### Importante

- Para testar no Postman, colocar header "Accept: application/json" em todas as requisições.

```bash
php artisan serve
```

## Endpoints

### Usuário

Registro

-   /api/user/register - POST

```json
{
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
}
```

Login

-   /api/user/auth - POST

```json
{
    "email": "string",
    "password": "string"
}
```

#### Necessária autenticação

Editar

-   /api/user/update/ - PATCH

```json
{
    "name": "string",
    "email": "string"
}
```

Excluir

-   /api/user/delete
