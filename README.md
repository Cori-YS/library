# Guia para Configurar e Rodar o Projeto ELibrary

Ismélio Dias Cristóvão Cori

## Pré-requisitos

1. **Composer**: Gerenciador de dependências do PHP. [Instalar Composer](https://getcomposer.org/download/)
2. **PHP**: Versão 8.2 ou superior. [Instalar PHP](https://www.php.net/downloads.php)
3. **Servidor Web**: Apache
4. **Banco de Dados**: MySQL

## Passos para Configurar e Rodar o Projeto

### 1. Instalar Dependências

Use o Composer para instalar as dependências do projeto.

```sh
composer install
```

### 2. Configurar o Arquivo `.env`

Copie o arquivo de exemplo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as configurações de banco de dados.

```sh
cp .env.example .env
```

Edite o arquivo `.env` e configure as seguintes variáveis:

```env
APP_NAME=elibrary
APP_ENV=local
APP_KEY=base64:chave-gerada-automaticamente
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario_do_banco
DB_PASSWORD=senha_do_banco
```

### 3. Gerar a Chave da Aplicação

Gere a chave da aplicação Laravel.

```sh
php artisan key:generate
```

### 4. Migrar o Banco de Dados

Execute as migrações para configurar as tabelas do banco de dados.

```sh
php artisan migrate --seed
```

### 5. Executar o Servidor de Desenvolvimento

Inicie o servidor de desenvolvimento do Elibrary.

```sh
php artisan serve
```

Inicie o servidor de vite do Elibrary.

```sh
npm install
npm run build
```

### 6. Acessar a Aplicação

Abra o navegador e acesse a aplicação em [http://localhost:8000](http://localhost:8000).
