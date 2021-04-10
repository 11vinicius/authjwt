
## Indice
- [sobre](#-sobre)
- [tecnologias utilizadas](#-Tecnologias-utilizadas)
- [como baixar](#-Como-baixar-o-projeto)



---

## 📝 Sobre

Api de cadastro de usuários com autenticação jwt;

```
    http://127.0.0.1:8000/api/register - registra usuário
    http://127.0.0.1:8000/api/login - cria hash login
    http://127.0.0.1:8000/api/index - rota protegida
```

---

## 🚀 Tecnologias utilizadas

Foi desenvolvida utilizando as seguinte tecnologias.

- [Laravel](https://laravel.com/)
- [tymondesigns](https://github.com/tymondesigns/jwt-auth)

## 📥 Como baixar o projeto

```bash

#Clona o repositório
  $ git clone https://github.com/11vinicius/gobarber.git

#Entrar no diretório
  $ cd AuthJwt

#Instalar as dependencias
  $ composer install

#Iniciar wamp
#cria base de dados com nome app
#cria tabelas
  $ php artisan migrate

#dar start  
  $ php artisan serve
```
