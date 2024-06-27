# Repositório para API de app de controle financeiro

## Tecnologias usadas

- PHP
- Laravel
- PostgresSQL

## Endpoints

### Usuário

Registro

- /api/user/register - POST

```json
{
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
}
```

Login

- /api/user/auth - POST

```json
{
    "email": "string",
    "password": "string"
}
```

#### Necessária autenticação

Editar

- /api/user/update/ - PATCH

```json
{
    "name": "string",
    "email": "string"
}
```

Excluir

- /api/user/delete

