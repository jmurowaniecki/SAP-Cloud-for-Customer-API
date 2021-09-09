# ![](assets/title.png) Treinamento SAP Cloud for Customer API

[![#](https://img.shields.io/badge/λ-nano-e60?style=flat-square)](https://github.com/jmurowaniecki/lambda-nano)

Este repositório foi criado unicamente com o propósito de facilitar a visualização do progresso do treinamento, utilizando cenários de testes para exercitar e garantir os passos das soluções desenvolvidas.

## Primeiros passos

Na raiz do projeto execute o comando `composer install` para que as dependências do projeto sejam instaladas e devidamente configuradas.

Para executar o serviço configure o Apache, NGINX para que realizem a leitura do diretório `./src`. Não são necessários módulos adicionais e/ou demais configurações.

> Também é possível executar a aplicação utilizando o próprio servidor do PHP conforme exemplo:
> ```
> php -S localhost:8080 -t ./src
> ```

## Utilizando Heroku

Para executar esta aplicação via Heroku primeiramente instale o Heroku Client, a seguir, na raiz deste repositório, crie uma nova aplicação com o comando `heroku create` e, logo a seguir efetue push do repositório para seu dashboard com o comando `git push heroku main`

Em poucos instantes o projeto estará sendo executado no domínio configurado em seu dashboard.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)