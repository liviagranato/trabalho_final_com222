
<?php 


include 'navbar.php';
include_once 'DatabaseConnection.php';

function fIsValidEmail($email) {
   //validate using php filter function. Returns true or false.
   $email = trim($email);
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}



if (isset($_POST['enviar'])) {

$email  = $_POST['email'];

$valido = fIsValidEmail($email);

   if($valido){


    
     $query = "SELECT * FROM bookcustomers WHERE email = '$email'";
                            $resultado = $conn->query($query);
                            if ($resultado->num_rows > 0){
                                $row = $resultado -> fetch_assoc();

                                echo '</p>
                                            <table>
                                                <td>
                                                    
                                                </td>
                                                <td width="100%">
                                                    <ul class="list-unstyled tamanho-18">
                                                        <li>
                                                            <b>Bem vindo</b> <span style="color:#de010c"><b> ' .$row['fname'].$row['lname'].'</b></span>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled tamanho-14">
                                                        <li>
                                                            <b>E-mail:</b> '.$row['email'].'
                                                        </li>
                                                        <li>
                                                            <b>Cidade:</b> '.$row['city'].'/'.$row['state'].'
                                                        </li>
                                                        <li>
                                                            <b>Rua:</b> '.$row['street'].'
                                                        </li>
                                                        
                                                        <li>
                                                            <b>CEP:</b> '.$row['zip'].'
                                                        </li>
                                                    
                                                    </ul>
                                                    
                                                </td>
                                            </table>
                                            <br/>      
                            </div>
                        ';
                            }else{

                                echo '<div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
            
                                            </div>
                                        <div class="col-md-4">

                                        <p>Informação de envio</p>
                                        <p>Novo cliente - forneça seu endereço de entrega.</p>

                                        <form action="checkout03.php" method="post" autocomplete="on" class="myForm">

                                            <div class="input-group">
                                            <input class="form-control" type="text" value="'.$email.'" name="email" placeholder="E-mail" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="fname" placeholder="Primeiro Nome" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="lname" placeholder="Sobrenome" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="street" placeholder="Rua" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="city" placeholder="Cidade" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="state" placeholder="Estado" />
                                            </div>
                                            <div class="input-group">
                                            <input class="form-control" type="text" name="zip" placeholder="CEP" />
                                            
                                            </div>
                                             <div class="input-group-btn">
                                            <button class="btn btn-info" name="cadastrar" type="submit">Cadastro</button>
                                              </div>
             
                                        </form>
          
                                            </div>
                                            <div class="col-md-4">
            
                                            </div>
          
                                        </div>


                                    </div>';




                            }

                            



   }else{
        echo "E-mail Inválido";
   }







}






?>

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

    <title>Início</title>

</head>
<body class="background-index">



