# # Getting Started
O mesmo foi realizado em PHP 7.2.19 utilizando o framework Laravel em sua versão 5.7. Para roda-lo em seu localhost será necessária a instalação do composer para update de suas dependências bem como um ambiente configurado com PHP e MYSQL.

# # Build
Para realização do build serão necessários os seguintes passos após baixa-lo do repositório e rodar o composer:

<p>Criar um novo Banco de Dados MYSQL</p>
<p>Criar na raiz do projeto arquivo .env similar ao arquivo .env.example</p>
<p>Após esta etapa alterar as seguintes linhas do arquivo: 
    APP_NAME=HubChain

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome do banco de dados
    DB_USERNAME=usuário do bd
    DB_PASSWORD=senha do bd
</p>
<p> No terminal, navegar até a pasta do projeto e rodar o comando: "php artisan migrate --seed", o mesmo irá criar as tabelas no banco configurado anteriormente e alimenta-la com 3 ativos como exemplo.</p>

# # Utilização do Sistema
Ao digitar a rota inicial do projeto (seu_localhost/diretório_do_sistema/public), irá ser apresentada tela de Login, com a opção de Register no canto superior direito. Realize o registro e o Login posteriormente para acesso ao sistema.

# # Características principais a serem analisadas
<p>Barra de Navegação possui o campo Cadastrar Ativos onde são realizadas as adições de novos produtos</p>

<p>No formulário de edição e cadastro existem as seguintes validações:

*O nome do Ativo é obrigatório

*Preencha o campo quantidade com um número (Decimais serão arredondados)

*Ano de início de uso deve ser igual ou menor que o atual</p>

<p> Na tela principal existem as opções de Ver Mais, Editar e Remover um registro de determinado ativo </p>

<p>Para produtos com quantidades de unidades inferior a 5 irá aparecer um Alerta na tela principal</p>

<p>Para produtos com mais de 3 anos de Uso a Coluna "Disponível para Venda?" estará automaticamente sinalizada com "Sim"</p>

<p>O exemplo de API foi adicionado tanto no cadastro quanto edição de produtos nos campos de endereço, ao digitar um CEP e trocar de campo, automaticamente o endereço é preenchido, após isso é possível ve-lô por completo na opção Ver Mais ou na edição do item</p>
