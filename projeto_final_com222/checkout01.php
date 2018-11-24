

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
include_once 'DatabaseConnection.php';

?>

<div class="container">
        <div class="row">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">

            <form action="checkout02.php" method="post" autocomplete="on" class="myForm">
              

              <div class="input-group">
                <input class="form-control" type="text" name="email" placeholder="E-mail" />
                  <div class="input-group-btn">
                      <button class="btn btn-info" name="enviar" type="submit">Verifique seu E-mail</button>
                  </div>
              </div>
             
            </form>
          
          </div>
          <div class="col-md-4">
            
          </div>
          
        </div>



</div>




  </body>
</html>


