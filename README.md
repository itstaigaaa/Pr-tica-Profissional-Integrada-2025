# StoQ - Sistema de Gestão de Estoque

![Status](https://img.shields.io/badge/status-conclu%C3%ADdo-green?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap)
![MariaDB](https://img.shields.io/badge/MariaDB-10.4-003545?style=for-the-badge&logo=mariadb)

Sistema web simples e funcional para controle de produtos e categorias, desenvolvido em PHP puro e Bootstrap como projeto acadêmico.

## 📖 Sobre o Projeto

O StoQ é uma aplicação web criada para automatizar o controle de inventário de pequenas empresas, substituindo processos manuais suscetíveis a erros. O sistema permite o gerenciamento completo (CRUD) de produtos e suas respectivas categorias, com uma interface limpa, intuitiva e responsiva.

Este projeto foi desenvolvido como parte da avaliação da **Prática Profissional Integrada (PPI)** do Curso Superior de Tecnologia em Sistemas para Internet, integrando de forma prática os conhecimentos das disciplinas de:
* Banco de Dados II
* Engenharia de Software II
* Programação Web I

## ✨ Funcionalidades

-   **Gerenciamento de Produtos:** Cadastro, edição, listagem e exclusão de produtos.
-   **Gerenciamento de Categorias:** Cadastro, edição, listagem e exclusão de categorias.
-   **Ordenação Dinâmica:** Controles interativos na interface para ordenar os dados por diferentes colunas (ID, Descrição, etc.).
-   **Integridade de Dados:** O sistema impede a exclusão de categorias que possuem produtos associados, garantindo a consistência do banco de dados.
-   **Design Responsivo:** Interface construída com Bootstrap 5, adaptável a desktops e dispositivos móveis.

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Versão | Propósito |
| :--- | :--- | :--- |
| **PHP** | 8.2 | Lógica de back-end e comunicação com o banco de dados (via PDO). |
| **MariaDB**| 10.4 | Armazenamento e gerenciamento dos dados relacionais. |
| **Bootstrap**| 5.3 | Framework CSS para a construção da interface do usuário. |
| **XAMPP** | | Ambiente de servidor local (Apache + MariaDB). |

## 🚀 Instalação e Execução

Para rodar este projeto localmente, siga os passos abaixo:

**Pré-requisitos:**
* Ter o [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado.

**Passos:**
1.  Clone este repositório para a sua máquina.
    ```bash
    git clone https://github.com/itstaigaaa/Pr-tica-Profissional-Integrada-2025.git
    ```
2.  Mova a pasta do projeto clonada para o diretório `htdocs` da sua instalação do XAMPP.
3.  Inicie os módulos **Apache** e **MySQL** no painel de controle do XAMPP.
4.  Abra o **phpMyAdmin** (`http://localhost/phpmyadmin`) e crie um novo banco de dados chamado `test`.
5.  Selecione o banco `test` e vá para a aba "SQL". Copie o conteúdo do arquivo `database.sql` (que está neste repositório) e execute-o para criar as tabelas e inserir os dados de exemplo.
6.  Acesse o sistema pelo navegador no seguinte endereço:
    ```
    http://localhost/nome-da-pasta-do-projeto/
    ```
    *(Substitua `nome-da-pasta-do-projeto` pelo nome da pasta que você moveu para o `htdocs`)*.

## ✍️ Autor

-   **Luigi Espindola Gonzalez** - [LinkedIn](https://www.linkedin.com/in/luigi-espindola-gonzalez-479117211/)
