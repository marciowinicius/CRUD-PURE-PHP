<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Detalhes produto</h2>
                    <a href="create.php" class="btn btn-success pull-right">Adicionar novo produto</a>
                    <a href="deletecart.php" class="btn btn-danger pull-right">Deletar carrinho</a>
                    <br/>
                    <a href="index_cart.php" class="btn btn-info pull-right">Itens carrinho</a>
                </div>
                <?php
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nome</th>";
                        echo "<th>Quantidade</th>";
                        echo "<th>Preço</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                foreach ($_SESSION as $value){
                    echo $value['id'];
                            echo "<tr>";
                            echo "<td>" . $value['id'] . "</td>";
                            echo "<td>" . $value['name'] . "</td>";
                            echo "<td>" . $value['quantity'] . "</td>";
                            echo "<td>" . $value['price'] . "</td>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
