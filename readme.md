# Projeto CRUD usando Arquitetura MVC

Este é um projeto para ensino de criação de um CRUD (Create, Read, Update, Delete) em PHP usando arquitetura MVC (Model-View-Controller).

## Pré-requisitos

* Apache (https://www.apachefriends.org/). 

* Cliente Git (https://git-scm.com). Verifique a instalação digitando:
```bash
$ git --version
```

## Instalação

Clonar o repositório do GitHub.
```bash
$ git clone https://github.com/anfer86/teaching-php-projeto-crud-mvc.git
$ cd teaching-php-projeto-crud-mvc
```

Adicionar um Virtual Host para o nosso projeto. Para isso, abrir o arquivo `httpd-vhosts.conf` dentro do diretório de instalação do Apache. Por ex. `c:/xampp/apache/conf/extra/httpd-vhosts.conf`. Vamos adicionar um endereço local para acessar a nossa aplicação no endereço `projeto-crud-mvc.localhost`.
```bash
<VirtualHost *:80>
DocumentRoot "C:\xampp\htdocs\teaching-php-projeto-crud-mvc"
ServerName projeto-crud-mvc.localhost
<Directory "C:\xampp\htdocs\teaching-php-projeto-crud-mvc">
</Directory>
</VirtualHost>
```

## Utilização

Para rodar a aplicação iniciar o servidor Apache e entrar no endereço `http://projeto-crud-mvc.localhost`. 

## Desenvolvimento

O projeto foi desenvolvido com:

* [Sublime Text](https://www.sublimetext.com/) - Editor de texto para programação

Está sendo desenvolvidos um documento de instruções para o desenvolvimento desta aplicação, que ficará disponível no arquivo `instructions/instructions.md`.

## Autores

* **Carlos Andres Ferrero** - [anfer86](https://github.com/anfer86)