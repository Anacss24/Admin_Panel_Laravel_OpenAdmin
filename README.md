<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://open-admin.org/gfx/screenshot-list.jpg" width="600" alt="Laravel Logo"></a></p>



# Painel Administrativo com Open-Admin

Um painel de administração projetado para simplificar o controle interno de funcionários e serviços, tornando-se uma ferramenta  para a gestão eficiente de uma organização.

# Pré-Requisitos 

 Software necessários para a instalação:
 
<ul>
 <li>PHP 7.1 ou superior</li>
 <li>Composer</li>
 <li>MySql</li>
</ul>

# Instalação

### Clonar o projeto

```
 git clone http://10.6.43.209:3000/Estagiarios/Admin_Panel_Laravel_OpenAdmin.git 
```
### Entrar no diretório
```
cd Admin_Panel_Laravel_OpenAdmin
```
### Instalar as dependências do projeto
```
composer update 
npm install
```
### Crie o Arquivo .env
```
cp .env.example .env
```
### Atualize as variáveis de ambiente do arquivo .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= ""
DB_USERNAME=root
DB_PASSWORD= ""
```

# Gerar a key do projeto Laravel
```
php artisan key:generate
```

# Migrar as tabelas 
```
php artisan migrate
```
# Dump

- Realizar o dump de todas as tabelas de acordo com a nomeclatura

# Iniciar o servidor

```
php artisan serve
```
 - http://127.0.0.1:8000/admin
 
# Administrador

- Usuário: admin
- Senha: admin

# Autor
**Ana Claudia Santana** - *Desenvolvimento* 



