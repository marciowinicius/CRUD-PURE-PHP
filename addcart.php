<?php
/**
 * Created by PhpStorm.
 * User: Márcio Winicius
 * Date: 12/06/2018
 * Time: 11:36
 */
session_start(); // Inicia a sessão
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';

    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE id = :id";

    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':id', $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retrieve individual field value
                $name = $row['name']. $row['id'];
                $_SESSION[$name] = [
                    'id' => $row['id'],
                    'name' => $row["name"],
                    'quantity' => $row["quantity"],
                    'price' => $row["price"],
                ];

                header("location: index.php");
                echo '<script type="text/javascript>" alert("Produto adicionado ao carrinho.") </script>';
                exit();

            } else{
                header("location: index.php");
                exit();
            }

        } else{
            echo "Alguma coisa de errado aconteceu. Tente novamente mais tarde.";
        }
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: index.php");
    exit();
}
?>