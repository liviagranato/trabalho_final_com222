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

    <title>Checkout</title>

</head>
<body class="background-index">





<?php 
include 'navbar.php';
include_once 'databaseConnection.php';

$numero_itens = $_COOKIE['BookCount'];

?>
<div class="fundo" >
    <div class="container fundo-container" style="height: 600px">

          <div class="col-md-12 text-center">
                <h2 class="text-center">Acessar sua Conta</h2>
              <br/><br/>
              <h4 class="text-center">Comprar Online é fácil e rápido!</h4>
              <br/>
              <h5 class="text-center">Você tem
                  <?php
                        echo ''.$numero_itens.'';
                  ?>
                  item(ns)  no carrinho.</h5>
              <br/>
              <table width="60%" style="margin-right:auto; margin-left:auto; ">
                  <tr>
                      <td>
                        <form action="checkout02.php" method="post" autocomplete="on" class="form-group">
                            <p class="text-justify">Inserir E-mail para prosseguir:</p>
                            <div class="input-group">

                            <input class="form-control mr-sm-2" type="text" name="email" id="email" placeholder="E-mail" required/>
                              <br/><br/>
                            <button class="btn btn-primary btn-block" name="enviar" type="submit">Continuar compra</button>
                          </div>
                        </form>
                      </td>
                  </tr>
              </table>
          </div>
    </div>
</div>




  </body>
</html>
<?php
include 'footer.php';

?>

