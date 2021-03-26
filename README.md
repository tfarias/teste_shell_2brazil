## Intruções

```bash
# clone the repo
$ git clone https://github.com/tfarias/teste_shell_2brazil.git

# go into app's directory
$ cd teste_shell_2brazil

#caso tenha o docker
$ docker-compose up -d --build

$ docker exec -it app_shell bash

$ composer install

$ php artisan migrate

# caso não tenha o docker

$ composer install

#lembre-se de ajustar a conexao do banco de dados

$ php artisan migrate

```

## Execução

```bash
# run de project

com Docker

Para acessar o endpoint basta acessar o

#method POST

http://localhost:8486/CREATE_ORDER

#enviando json data exemplo:


			[
				{
					"ArticleCode": 2,
					"ArticleName": "Product 2",
					"UnitPrice": 100.00,
					"Quantity": 5
				}
			]

#dentro da pasta Database vai estar um aquivo com as requisições di insominia

database\Insomnia_2021-03-26_json


#O result do CREATE_ORDER ficará assim:

{
  "data": {
    "OrderId": 15,
    "OrderDate": "26\/03\/2021 21:48",
    "OrderCode": "2021-03-15",
    "TotalAmountWihtoutDiscount": "500.00",
    "TotalAmountWithDiscount": "500,00"
  }
}

#também fiz um endpoint para listar as orders

http://localhost:8486/LIST_ORDERS


#caso queira os produtos junto das orders basta adicionar ?include=products no endpoins

http://localhost:8486/LIST_ORDERS?include=products


```

## Testes

```bash
# para executar os testes pasta rodar o comando

$ php artisan test

```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
