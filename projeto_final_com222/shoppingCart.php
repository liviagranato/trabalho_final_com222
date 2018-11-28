<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Carrinho</title>

</head>
<body class="background-index">

<?php include 'navbar.php';
include_once 'databaseConnection.php';
include_once("validationUtilities.php");

//Shopping cart uses cookies to store cart items.
//PHP script uses an array for adding, removing and displaying the cart items.
//Cookies can contain only string data so array must be serialized.

$cookieName = "myCart2";
error_reporting(0);
if (isset($_COOKIE[$cookieName])) {
    $bookArray = unserialize($_COOKIE[$cookieName]);
}
$addISBN = $_GET['addISBN'];
if (strlen($addISBN) > 0) {
    if (isset($addISBN, $bookArray)) {
        // Increment by +1
        $bookArray[$addISBN] += 1;
    } else {
        // Add new item to cart
        $bookArray[$addISBN] = 1;
    }
}


$deleteISBN = $_GET['deleteISBN'];
if (strlen($deleteISBN) > 0) {
    if (isset($bookArray[$deleteISBN])) {
        // Deincrement by 1
        $bookArray[$deleteISBN] -= 1;
        // remove ISBN from array if qty==0
        if ($bookArray[$deleteISBN] == 0) {
            unset($bookArray[$deleteISBN]);
        }
    }
}

if (isset($bookArray)) {
    // Write cookie
    setcookie($cookieName, serialize($bookArray), time() + 60 * 60 * 24 * 180);

    //Count total books in cart
    $totalbooks = 0;
    foreach ($bookArray as $isbn => $qty) {
        $totalbooks += $qty;
    }
    setCookie('BookCount', $totalbooks, time() + 60 * 60 * 24 * 180);
}

?>
<div class="fundo">
    <div class="container fundo-container">
        <div class="row">
            <?php
            include_once 'menu_lateral.php';
            ?>

            <div class="col-md-8 mx-auto">
                <ul class="list-group">
                    <p class="text-center">
                        <?php
                        if (!$totalbooks || $totalbooks == 0){
                            echo ' Não há itens no carrinho </b>';
                        } else {
                        echo '<b> '.$totalbooks. '';

                        if ($totalbooks == 1)
                            echo ' item </b>';
                        if ($totalbooks != 1)
                            echo ' itens </b>';
                        echo ' em seu carrinho <br/><br/>';
                        }
                        ?>
                    </p>

                    <?php

                    //To do:
                    // 1. Build sql statement containing ISBNs. Use foreach loop.
                    // 2. Execute sql and display book titles, prices, qty, etc.

                        $sub_total=0;
                        if (count($bookArray)) {
                            echo "<table class='text-center table table-striped' id='cart'><tr><th width=\"40%\">Título</th><th width=\"10%\">Qtd</th><th width=\"20%\">Preço</th><th width=\"20%\">Total</th><th>Adicionar/Remover</th></tr>";

                            foreach ($bookArray as $isbn => $qty) {
                                $query = "SELECT * from bookdescriptions where ISBN = '$isbn'";
                                $resultado = $conn->query($query);
                                $row = $resultado->fetch_assoc();
                                $total_parcial = $row['price'] * $qty;
                                $sub_total += $total_parcial;
                                echo '
                     <tr >
                        <td class=\'text-justify\' width="40%">
                           <a class="booktitle" href="ProductPage.php?id='.$isbn.'">' . $row['title'] . '</a> </td>
                        <td width="10%">' . $qty . '</td>
                        <td width="20%">
                           <a class="booktitle" style="color: #de010c">R$ ' . number_format($row['price'], 2, ',', ' ') . '</a> </td>
                        <td width="20%">
                           <a class="booktitle" style="color: #de010c">R$ ' . number_format($total_parcial, 2, ',', ' ') . '</a> </td>
                        <td class=\'text-center\'>
                           <a href="?addISBN=' . $isbn . '">Adicionar</a><br>
                           <a href="?deleteISBN=' . $isbn . '">Remover</a>
                        </td>
                     </tr>';

                            }
                        }
                        if ($totalbooks == 0) {
                            $frete = 0;
                        } else {
                            $frete = ($totalbooks - 1) * 5 + 10;
                            $totalfinal = $frete + $sub_total;
                        }


                    echo '</table>
                    <div align="right">
                        <table >';


                                 echo '<tr ><b>Sub-Total:</b> R$ '.number_format($sub_total, 2, ',', ' ').'</tr><br/>
                                <tr ><b>Frete:</b> R$ '.number_format($frete, 2, ',', ' ').'</tr><br/>
                                <tr ><b>Total: <span style="color: #de010c">R$ '.number_format($totalfinal, 2, ',', ' ').'</span></b></tr><br/>';


                       echo '</table>
                    </div>
                    <br/>';

                    ?>
                    <ul class="list-inline text-center">

                        <li class="list-inline-item" style="padding-right: 20px">
                            <button onclick="window.location.href='index.php'" class="btn btn-info"><i class="fas fa-shopping-cart"></i> Continue Comprando</button>
                        </li>
                        <li class="list-inline-item">
                            <button onclick="window.location.href='checkout01.php'" class="btn  btn-success"><i class="fas fa-arrow-alt-circle-right"></i> Finalizar Compra</button>
                        </li>

                    </ul>
                    <br/>
                    <p class="tamanho-14 text-center">*O envio é de R$ 10,00 para o primeiro livro e R$ 5,00 para cada livro adicional.</p>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';



?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>