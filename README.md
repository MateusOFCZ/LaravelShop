<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Projeto em Laravel, CRUD para atender a [modelagem](https://github.com/MateusOFCZ/LaravelShop/blob/master/Documents/Modelagem.png) e autenticação com [Sanctum](https://laravel.com/docs/9.x/sanctum).

<hr>

# Requisitos

- <b>Composer</b> [getcomposer.org](https://getcomposer.org)
- <b>PHP:</b> `^8.0.2`

<br>

# Configurações

- Execute `composer install` para instalar as dependências
- Execute `cp .env.example .env` para criar o `.env`
- Configure os dados no `.env` criado
- Execute `php artisan key:generate` para gerar a chave de criptografia
- Execute `php artisan migrate` para gerar as tabelas, ou se preferir execute `php artisan migrate:fresh --seed` para gerar as tabelas populadas com dados de exemplo
- Para iniciar o servidor execute `php artisan serve`

<hr>

# Endpoints

<b>Todos os endpoints com `update` e `store` são necessários permissão de `admin` na tabela `user` (Exceto o endpoint `auth` e `user`)</b>

- `/auth`
    - <b>POST</b> `/login`: Entra em uma conta com os dados informados
        - body
            - <b>REQUIRED</b> `email`: E-mail do usuário
            - <b>REQUIRED</b> `password`: Senha do usuário
    - <b>POST</b> `/register`: Registra um novo usuário com os dados informados
        - body
            - <b>REQUIRED</b> `first_name`: Primeiro nome do usuário
            - <b>REQUIRED</b> `last_name`: Último nome do usuário
            - <b>REQUIRED</b> `email`: E-mail do usuário
            - <b>REQUIRED</b> `password`: Senha do usuário
    - <b>POST</b> `/logout`: Sai da conta do Token informado
        - headers
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário

- `/user`
    - <b>GET</b> `/`: Obtém todos os usuários
    - <b>GET</b> `/{id}`: Obtém o usuário do `id` informado
        - request
            - <b>REQUIRED</b> `id`: ID do usuário
    - <b>POST</b> `/{id}`: Atualiza o usuário do `id` informado
        - request
            - <b>REQUIRED</b> `id`: ID do usuário
        - body
            - <b>OPTIONAL</b> `first_name`: Primeiro nome do usuário
            - <b>OPTIONAL</b> `last_name`: Último nome do usuário
            - <b>OPTIONAL</b> `email`: E-mail do usuário
            - <b>OPTIONAL</b> `password`: Senha do usuário
            - <b>OPTIONAL</b> `status`: Usuário ativo ou não
            - <b>OPTIONAL</b> `admin`: Usuário é administrador ou não
            - <b>OPTIONAL</b> `company_id`: ID da empresa
    - <b>DELETE</b> `/{id}`: Deleta o usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do usuário

- `/company`
    - <b>GET</b> `/`: Obtém todas as empresas
    - <b>GET</b> `/{id}`: Obtém a empresa do `id` informado
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
    - <b>POST</b> `/{id}`: Atualiza a empresa do `id` informado
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
        - body
            - <b>OPTIONAL</b> `address`: Endereço da empresa
            - <b>OPTIONAL</b> `phone`: Endereço da empresa
            - <b>OPTIONAL</b> `email`: Endereço da empresa
            - <b>OPTIONAL</b> `status`: Endereço da empresa
    - <b>POST</b> `/`: Adiciona uma nova empresa com os dados informados
        - headers
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - body
            - <b>REQUIRED</b> `address`: Endereço da empresa
            - <b>REQUIRED</b> `phone`: Endereço da empresa
            - <b>REQUIRED</b> `email`: Endereço da empresa
    - <b>DELETE</b> `/{id}`: Deleta a empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
            
