# Busca Veículos


Olá 👋 Esse é um sistema de Busca de Veículos!

# Funcionalidades!

  - Realiza a Busca de Veículos
  - Salva as buscas no Banco de Dados
  - Visualiza os dados da última busca
  - Visualiza todos os dados do Banco de Dados
  - Exclui registro do Banco de Dados

### Installation

Precisa ter o Composer, PHP 7.2+ e o npm instalados.

No terminal, navegue até a pasta onde deseja instalar o sistema e siga os passos abaixo:

```sh
$ git clone https://github.com/mocraveirodev/buscaveiculo.git
$ cd buscaveiculo
$ cp .env.example .env
```

No novo arquivo .env, substitua a linha `DB_DATABASE=laravel` por `DB_DATABASE=buscaveiculo`.

Em seguida, vá no seu Banco de dados, crie uma tabela chamada `buscaveiculo`.

Volte para o terminal e execute os comandos a seguir:

```sh
$ composer install
$ php artisan migrate --seed
$ npm install
$ php artisan serve
```

Acesse o endereço indicado no terminal para visualizar a aplicação.

### Sistema criado por: `Monica Craveiro`

Carioca, Bacharel em Sistemas de Informação e Matemática, Desenvolvedora Web FullStack, Membro do Tudo Sobre IoT, a maior comunidade de IoT do Brasil, ex-aluna do [des]programe, {reprograma} e DigitalHouse>, Professora de Programação, além de Participante e Palestrante em diversas comunidades de TI.

| Rede Social | Contato |
| ------ | ------ |
| GitHub | https://github.com/mocraveirodev |
| LinkedIn | https://www.linkedin.com/in/mocraveirodev/ |