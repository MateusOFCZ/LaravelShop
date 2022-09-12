<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

Projeto em [Laravel](https://laravel.com), CRUD para atender a [modelagem](https://github.com/MateusOFCZ/LaravelShop/blob/master/Documents/Modelagem.png) e autenticação com [Sanctum](https://laravel.com/docs/9.x/sanctum).

<hr>

# Requisitos

- <b>Composer</b> [getcomposer.org](https://getcomposer.org)
- <b>PHP:</b> `^8.0.2`

<br>

# Configurações

- Execute `composer install` para instalar as dependências
- Execute `cp .env.example .env` para criar o `.env`
- Configure o banco de dados no `.env` criado e insira um valor em `API_KEY`
- Execute `php artisan key:generate` para gerar a chave de criptografia
- Execute `php artisan migrate` para gerar as tabelas, ou se preferir execute `php artisan migrate:fresh --seed` para gerar as tabelas populadas com dados de exemplo
- Para iniciar o servidor execute `php artisan serve`

> Por padrão o <b>Token</b> está para expirar a cada <b>24 horas</b>, você pode alterar em [`Project\config\sanctum.php:41`](https://github.com/MateusOFCZ/LaravelShop/blob/master/Project/config/sanctum.php#L49)

<hr>

# Endpoints

> Todos os endpoints com `update` e `store` são necessários permissão de `admin` na tabela `user` <b>(Exceto o endpoint `auth` e `user`)</b>

- `/auth`
    - <b>POST</b> `/login`: Entra em uma conta com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - body
            - <b>REQUIRED</b> `email`: E-mail do usuário
            - <b>REQUIRED</b> `password`: Senha do usuário
    - <b>POST</b> `/register`: Registra um novo usuário com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - body
            - <b>REQUIRED</b> `first_name`: Primeiro nome do usuário
            - <b>REQUIRED</b> `last_name`: Último nome do usuário
            - <b>REQUIRED</b> `email`: E-mail do usuário
            - <b>REQUIRED</b> `password`: Senha do usuário
    - <b>POST</b> `/logout`: Sai da conta do Token informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário

- `/user`
    - <b>GET</b> `/`: Obtém todos os usuários
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
    - <b>GET</b> `/{id}`: Obtém o usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID do usuário
    - <b>POST</b> `/{id}`: Atualiza o usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do usuário
        - body
            - <b>OPTIONAL</b> `first_name`: Primeiro nome do usuário
            - <b>OPTIONAL</b> `last_name`: Último nome do usuário
            - <b>OPTIONAL</b> `email`: E-mail do usuário
            - <b>OPTIONAL</b> `password`: Senha do usuário
            - <b>OPTIONAL</b> `status`: Usuário ativo ou não
            - <b>OPTIONAL</b> `admin`: Usuário é administrador ou não
            - <b>OPTIONAL</b> `company_id`: ID da empresa em que o usuário está lotado
    - <b>DELETE</b> `/{id}`: Deleta o usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do usuário

- `/company`
    - <b>GET</b> `/`: Obtém todas as empresas
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
    - <b>GET</b> `/{id}`: Obtém a empresa do `id` informado
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
    - <b>POST</b> `/{id}`: Atualiza a empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
        - body
            - <b>OPTIONAL</b> `address`: Endereço da empresa
            - <b>OPTIONAL</b> `phone`: Endereço da empresa
            - <b>OPTIONAL</b> `email`: Endereço da empresa
            - <b>OPTIONAL</b> `status`: Endereço da empresa
    - <b>POST</b> `/`: Adiciona uma nova empresa com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - body
            - <b>REQUIRED</b> `address`: Endereço da empresa
            - <b>REQUIRED</b> `phone`: Endereço da empresa
            - <b>REQUIRED</b> `email`: Endereço da empresa
    - <b>DELETE</b> `/{id}`: Deleta a empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
            

- `/product`
    - <b>GET</b> `/`: Obtém todos os produtos
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
    - <b>GET</b> `/{id}`: Obtém o produto do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID do produto
    - <b>POST</b> `/{id}`: Atualiza o produto do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto
        - body
            - <b>OPTIONAL</b> `name`: Nome do produto
            - <b>OPTIONAL</b> `description`: Descrição do produto
            - <b>OPTIONAL</b> `model`: Modelo do produto
            - <b>OPTIONAL</b> `brand`: Marca do produto
            - <b>OPTIONAL</b> `price`: Preço do produto
            - <b>OPTIONAL</b> `stock`: Quantidade de produto no estoque
            - <b>OPTIONAL</b> `status`: Produto ativo ou não
    - <b>POST</b> `/`: Adiciona um novo produto com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - body
            - <b>REQUIRED</b> `name`: Nome do produto
            - <b>REQUIRED</b> `description`: Descrição do produto
            - <b>REQUIRED</b> `model`: Modelo do produto
            - <b>REQUIRED</b> `brand`: Marca do produto
            - <b>REQUIRED</b> `price`: Preço do produto
            - <b>REQUIRED</b> `stock`: Quantidade de produto no estoque
    - <b>DELETE</b> `/{id}`: Deleta o produto do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto

- `/companyproduct`
    - <b>GET</b> `/`: Obtém todos os produtos de todas as empresas
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
    - <b>GET</b> `/{id}`: Obtém o produto da empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID do produto da empresa
    - <b>GET</b> `/company/{id}`: Obtém o produto da empresa pelo `id` da empresa informada
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID da empresa
    - <b>POST</b> `/{id}`: Atualiza o produto da empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto da empresa
        - body
            - <b>OPTIONAL</b> `sell_period`: Data e hora de até quando o produto está disponível para venda
            - <b>OPTIONAL</b> `product_id`: ID do produto
            - <b>OPTIONAL</b> `company_id`: ID da empresa
    - <b>POST</b> `/`: Adiciona um novo produto da empresa com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - body
            - <b>REQUIRED</b> `sell_period`: Data e hora de até quando o produto está disponível para venda
            - <b>REQUIRED</b> `product_id`: ID do produto
            - <b>REQUIRED</b> `company_id`: ID da empresa
    - <b>DELETE</b> `/{id}`: Deleta o produto da empresa do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto da empresa

- `/userproduct`
    - <b>GET</b> `/`: Obtém todos os produtos de todos os usuários
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
    - <b>GET</b> `/{id}`: Obtém o produto do usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID do produto do usuário
    - <b>GET</b> `/user/{id}`: Obtém o produto do usuário pelo `id` do usuário informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
        - request
            - <b>REQUIRED</b> `id`: ID do usuário
    - <b>POST</b> `/{id}`: Atualiza o produto do usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto do usuário
        - body
            - <b>OPTIONAL</b> `enable`: Se o usuário pode ou não vender o produto
            - <b>OPTIONAL</b> `product_id`: ID do produto
            - <b>OPTIONAL</b> `user_id`: ID do usuário
    - <b>POST</b> `/`: Adiciona um novo produto do usuário com os dados informados
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - body
            - <b>REQUIRED</b> `enable`: Se o usuário pode ou não vender o produto
            - <b>REQUIRED</b> `product_id`: ID do produto
            - <b>REQUIRED</b> `user_id`: ID do usuário
    - <b>DELETE</b> `/{id}`: Deleta o produto do usuário do `id` informado
        - headers
            - <b>REQUIRED</b> `x-api-key`: API Key configurada no `.env`
            - <b>REQUIRED</b> `Authorization`: `Bearer {USER_TOKEN}`: Token do usuário
        - request
            - <b>REQUIRED</b> `id`: ID do produto do usuário
