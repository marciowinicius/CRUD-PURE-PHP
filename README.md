# Orientações para rodar o projeto


# Oque é necessário ?
- PHP
- MySQL

# Observações para funcionamento do projeto
> 1 - Faça o clone para seu computador.

> 2 - Crie um banco de dados com o seguinte script : `CREATE TABLE products (
                                                          id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                          name VARCHAR(100) NOT NULL,
                                                          quantity INT(10) NOT NULL,
                                                          price DOUBLE(10,2) NOT NULL
                                                      );`

> 3 - Altere o config.php com as informações do banco

> 4 - Para rodar o projeto `php -S localhost:8000` que por padrão para acessar a aplicação basta acessar localhost:8000