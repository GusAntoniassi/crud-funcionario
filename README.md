# CRUD de Funcionário

CRUD simples de funcionário desenvolvido em CakePHP. Implementa o cadastro de programadores e analistas.

**Importante:** Por implementar integração com a API do GitHub, que limita 10 requisições por segundo, o dropdown do Github apresenta um delay proposital de 1000ms, para evitar enviar mais requisições que o necessário.

![Integração com Github](https://i.imgur.com/qsLDKXo.png)

Como instalar:

Baixe o repositório para a pasta `htdocs` ou `www` de seu servidor Apache.

Execute os comandos SQL do arquivo `webroot/files/banco.sql` no banco de dados.

Configure o usuário e senha do banco de dados em `config/app.php`