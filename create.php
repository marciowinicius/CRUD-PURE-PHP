<?php
/**
 * Created by PhpStorm.
 * User: Márcio Winicius
 * Date: 12/06/2018
 * Time: 11:13
 */
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$name = $quantity_product = $price_product = "";
$name_err = $quantity = $price = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor envie um nome.";
    } else{
        $name = $input_name;
    }

    // Validate address
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity = 'Por favor envie uma quantidade.';
    }elseif ($input_quantity < 0 ) {
        $price = "Por favor informe uma quantidade positiva.";
    } else{
        $quantity_product = $input_quantity;
    }

    // Validate salary
    $input_price = trim($_POST["price"]);
    if(empty($input_price)) {
        $price = "Por favor informe o preço.";
    }elseif ($input_price < 0 ) {
        $price = "Por favor informe um preço positivo.";
    } else{
        $price_product = $input_price;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($quantity) && empty($price)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (name, quantity, price) VALUES (:name, :quantity, :price)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':name', $param_name);
            $stmt->bindParam(':quantity', $param_address);
            $stmt->bindParam(':price', $param_salary);

            // Set parameters
            $param_name = $name;
            $param_address = $quantity_product;
            $param_salary = $price_product;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Algo deu errado, tente novamente mais tarde.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Adicionar</h2>
                    </div>
                    <p>Preencha os campos abaixo.</p>
                    <form id="form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity)) ? 'has-error' : ''; ?>">
                            <label>Quantidade</label>
                            <input type="number" name="quantity" class="form-control" value="<?php echo $quantity_product; ?>">
                            <span class="help-block"><?php echo $quantity;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price)) ? 'has-error' : ''; ?>">
                            <label>Preço (R$)</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price_product; ?>">
                            <span class="help-block"><?php echo $price;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function validateForm() {
        var name = document.forms["form"]["name"].value;
        if (name == "") {
            alert("Preencha o campo nome antes.");
            return false;
        }

        var quantity = document.forms["form"]["quantity"].value;
        if (quantity == "") {
            alert("Preencha o campo quantidade antes.");
            return false;
        } else if (quantity < 0){
            alert("Preencha o campo quantidade com valor maior que 0.");
            return false;
        }

        var price = document.forms["form"]["price"].value;
        if (price == "") {
            alert("Preencha o campo preço antes.");
            return false;
        } else if (price < 0){
            alert("Preencha o campo preço com valor maior que 0.");
            return false;
        }
    }
</script>
</body>
</html>