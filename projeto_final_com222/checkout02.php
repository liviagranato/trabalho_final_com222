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
include_once 'validationUtilities.php';
error_reporting(0);


if (isset($_POST['enviar'])) {

$email  = $_POST['email'];

$valido = fIsValidEmail($email);

   if($valido){

     $query = "SELECT * FROM bookcustomers WHERE email = '$email'";
                            $resultado = $conn->query($query);
                            if ($resultado->num_rows > 0){
                                $row = $resultado -> fetch_assoc();


                                echo '<div class="fundo" >
                                <div class="container fundo-container" style="height: 100%">
                                    <div class="col-md-12 text-center">
                                        <h2>Bem-vindo(a) de volta, '.$row['fname'].'&nbsp;'.$row['lname'].'!</h2>
                                        <br/><br/>
                                        <h4>Por favor, confirme seus dados de entrega.</h4>
                                        <br/>
                                        
                                        <div class="col-md-8">
                                            <div class="card bg-light mb-3 text-justify" style="width: 150%" >
                                                <div class="card-header"><b>Confirmar Dados</b></div>
                                                <div class="card-body">
                                                    <form action="checkout03.php" method="post" autocomplete="on" class="form-group">
                                                        <input class="form-control" type="hidden" value="'.$row['custID'].'" name="id" />
                                                        Email: <input class="form-control mr-sm-2 " type="text" value="'.$email.'" name="email" placeholder="E-mail" required/>
                                                        Rua: <input class="form-control mr-sm-2 " type="text" value="'.$row['street'].'" name="street" placeholder="Rua" required/> 
                                                        Cidade: <input class="form-control mr-sm-2" type="text" value="'.$row['city'].'" name="city" placeholder="Cidade" required/> 
                                                        Estado (Sigla): <input class="form-control mr-sm-2" type="text" value="'.$row['state']. '" name="state" placeholder="Estado" required />
                                                        CEP: <input class="form-control mr-sm-2 " type="text" value="'.$row['zip'].'" name="zip" placeholder="xxxxx-xxx" required/> 
                                                        <br/>
                                                        <button class="btn btn-info btn-block" name="confirmar" type="submit">Confirmar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                            }else{

                                echo '<div class="fundo" >
                                <div class="container fundo-container" style="height: 100%">
                                    <div class="col-md-12 text-center">
                                        <h2>Informação de envio</h2>
                                        <br/><br/>
                                        <h4>Bem-vindo ao nosso site! Por favor, forneça um endereço de entrega.</h4>
                                        <br/>
                                        
                                        <div class="col-md-8">
                                            <div class="card bg-light mb-3 text-justify" style="width: 150%" >
                                                <div class="card-header"><b>Preencha seus Dados</b></div>
                                                <div class="card-body">
                                                    <form action="checkout03.php" method="post" autocomplete="on" class="form-group">
                                                        Email: <input class="form-control mr-sm-2 " type="text" value="'.$email.'" name="email" placeholder="E-mail" required/>
                                                        Nome: <input class="form-control mr-sm-2" type="text" name="fname" placeholder="Primeiro Nome"  required/>
                                                        Sobrenome: <input class="form-control mr-sm-2 " type="text" name="lname" placeholder="Sobrenome" required />
                                                        Rua: <input class="form-control mr-sm-2 " type="text" name="street" placeholder="Rua" required/>
                                                        Cidade: <input class="form-control mr-sm-2 " type="text" name="city" placeholder="Cidade" required/>
                                                        Estado (Sigla): <input class="form-control mr-sm-2 " type="text" name="state" placeholder="SP" required/>
                                                        CEP: <input class="form-control mr-sm-2 " type="text" name="zip" placeholder="xxxxx-xxx" required/>
                                                        <br/>
                                                        <button class="btn btn-info btn-block" name="cadastrar" type="submit">Cadastrar-se</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                            }

   }else{
      echo '<div class="fundo" >
              <div class="container fundo-container" style="height: 600px">
       <div class="col-md-12 text-center">';

       echo '
       <div>E-mail Inválido</div>
       <br/><br/>
       <button onclick="window.location.href=\'checkout01.php\'" class="btn  btn-primary"> Retornar à Página Anterior</button>
        </div></div></div>';
   }

}

?>

</body>
</html>
<?php
include 'footer.php';

?>




