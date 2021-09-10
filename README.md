# ![](assets/title.png) Treinamento SAP Cloud for Customer API

[![#](https://img.shields.io/badge/λ-nano-e60?style=flat-square)](https://github.com/jmurowaniecki/lambda-nano)

Este repositório foi criado unicamente com o propósito de facilitar a visualização do progresso do treinamento, utilizando cenários de testes para exercitar e garantir os passos das soluções desenvolvidas.

## Primeiros passos

Na raiz do projeto execute o comando `composer install` para que as dependências do projeto sejam instaladas e devidamente configuradas.

Para executar o serviço configure o Apache, NGINX para que realizem a leitura do diretório `./src`. Não são necessários módulos adicionais e/ou demais configurações.

> Também é possível executar a aplicação utilizando o próprio servidor do PHP conforme exemplo:
> ```
> php -S localhost:8080 -t ./public
> ```

## Utilizando Heroku

Para executar esta aplicação via Heroku primeiramente instale o Heroku Client, a seguir, na raiz deste repositório, crie uma nova aplicação com o comando `heroku create` e, logo a seguir efetue push do repositório para seu dashboard com o comando `git push heroku main`

Em poucos instantes o projeto estará sendo executado no domínio configurado em seu dashboard.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## Endpoints

Os mesmos endpoints grifados como http://localhost:8080/ podem ser acessados também no ambiente de homologação em https://nbwdigital.herokuapp.com/

### Raíz '/'

Retorna uma chave de 32 bytes encodada em base 64.

```
curl http://localhost:8080/ -s | jq
```

Retorna:
```json
{
  "key": "lnqo8aUdK3piaVaZIFEXcWwUUOWjv49Np531IbRrDcY="
}
```

### Soma elementos '/sum/1/2/3/4'

Calcula valores fornecidos na URL.

```
curl http://localhost:8080/sum/1/2/3/4/5/6/7 -s | jq
```

Retorna:
```json
{
  "value": 28
}
```


### Gera pessoa fictícia '/person'

Gerar um perfil/cadastro/lead fictício.
> **Atenção:** esse endpoint necessita de autenticação!


```
curl http://localhost:8080/person -H 'Authorization: Bearer 48151642asdfjkhasdf' -s | jq
```

Retorna:
```json
{
  "sex": "female",
  "doc": "144.805.314-16",
  "name": "Gabriela Gonçalves",
  "nick": "gabriela.goncalves",
  "mail": "gabriela.goncalves@eolsarbca.igalgevn.org"
}
```
