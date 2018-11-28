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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Checkout</title>

</head>
<body class="background-index">

<?php
include 'navbar.php';
include_once 'databaseConnection.php';
include_once 'validationUtilities.php';

$flag = false;
echo '<div class="fundo" >
                                <div class="container fundo-container" style="height: 100%">
                                    <div class="col-md-12"><h2>Comprovante de Compra</h2><br/>';

if (isset($_POST['confirmar'])) {
    $valido = fIsValidEmail($_POST['email']);
    $id = $_POST['id'];
    $custID = $id;
    $ruaV = fIsValidLength($_POST['street'], 10, 40);
    $cidadeV = fIsValidLength($_POST['city'], 10, 20);
    $estadoV = fIsValidStateAbbr($_POST['state']);
    $cep = $_POST['zip'];
    $email = $_POST['email'];
    if ($valido) {

        $rua = $_POST['street'];
        $cidade = $_POST['city'];
        $estado = $_POST['state'];

        $query = "UPDATE bookcustomers set street = '$rua',
							 city = '$cidade',
							 state = '$estado',
							 zip = '$cep'
					  WHERE custID = '$id'";

        $resultado = $conn->query($query);

        if ($resultado) {


        } else {

            echo '<b>Erro ao atualizar dados!</b>';
        }

    }
    $flag = true;
}


if (isset($_POST['cadastrar'])) {

    $email = $_POST['email'];
    $valido = fIsValidEmail($_POST['email']);
    $nome = $_POST['fname'];
    $sobrenome = $_POST['lname'];
    $estadoV = fIsValidStateAbbr($_POST['state']);
    $cep = $_POST['zip'];

    if ($valido && $estadoV) {
        $rua = $_POST['street'];
        $cidade = $_POST['city'];
        $estado = $_POST['state'];

        $query = "INSERT INTO bookcustomers (email, fname, lname, street, city, state, zip)
		 		  VALUES('$email','$nome', '$sobrenome', '$rua', '$cidade', '$estado', '$cep') ";

        $resultado = $conn->query($query);

        if ($resultado) {

            echo "<b>Cadastro realizado com sucesso!</b>";
            $query = "SELECT * from bookcustomers where email like '$email'";
            $resultado = $conn->query($query);
            $row = $resultado->fetch_assoc();
            $custID = $row['custID'];

        } else {

            echo "<b>Usuário não cadastrado!</b>";
        }

    }
    $flag = true;
}

if ($flag && isset($_COOKIE['myCart2'])) {
    $bookArray = unserialize($_COOKIE['myCart2']);

    setcookie('myCart2', null, time()-60000);
    $query = "INSERT into bookorders (custID, orderdate) values ('$custID', current_date())";
    $resultado = $conn->query($query);
    $orderID = mysqli_insert_id($conn);
    $discount = 1;
    foreach ($bookArray as $isbn => $qty) {
        $query = "SELECT * from bookdescriptions where ISBN = '$isbn'";
        $resultado = $conn->query($query);
        $row = $resultado->fetch_assoc();
        $total_parcial = $row['price'] * $qty;

        $query2 = "INSERT INTO bookorderitems (orderID, ISBN, qty, price) values ('$orderID','$isbn', '$qty', (select (price * '$discount') from bookdescriptions where ISBN = '$isbn'))";
        $resultado2 = $conn->query($query2);
    }

    echo '


<div class="card" style="width: 100%">
              <div class="card-header">
                <b>Dados de Entrega</b>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Rua: ' . $rua . '</li>
                <li class="list-group-item">Cidade: ' . $cidade . '</li>
                <li class="list-group-item">Estado: ' . $estado . '</li>
                <li class="list-group-item">CEP: ' . $cep . '</li>
                <li class="list-group-item">Cidade: ' . $cidade . '</li>
                <li class="list-group-item">Estado: ' . $estado . '</li>
              </ul>
        </div>
        <br/>
        
        <table class=\'table table-striped\' id=\'cart\'><tr><th width=\"40%\">Título</th><th width=\"10%\">Qtd</th><th width=\"20%\">Preço</th><th width=\"20%\">Total</th></tr>';
    $contador = 0;
    $sub_total = 0;
    $query = "SELECT bd.ISBN, bd.title, boi.price, boi.qty from bookorderitems as boi join bookdescriptions as bd on bd.ISBN = boi.ISBN where orderID = '$orderID'";
    $resultado_compra = $conn->query($query);
    while ($row = $resultado_compra->fetch_assoc()) {
        $total_parcial = $row['price'] * $row['qty'];
        $sub_total += $total_parcial;
        $contador += $row['qty'];
        echo '<tr >
                        <td class=\'text - justify\' width="40%">
                           <a class="booktitle" href="ProductPage.php?id=' . $row['ISBN'] . '">' . $row['title'] . '</a> </td>
                        <td width="10%">' . $row['qty'] . '</td>
                        <td width="20%">
                           <a class="booktitle" style="color: #de010c">R$ ' . number_format($row['price'], 2, ',', ' ') . '</a> </td>
                        <td width="20%">
                           <a class="booktitle" style="color: #de010c">R$ ' . number_format($total_parcial, 2, ',', ' ') . '</a> </td>
                       
                     </tr>';
    }


    if ($contador == 0) {
        $frete = 0;
    } else {
        $frete = ($contador - 1) * 5 + 10;
        $totalfinal = $frete + $sub_total;
    }

    echo '</table>
                    <div align="right">
                        <table >
                                <tr ><b>Sub-Total:</b> R$ ' . number_format($sub_total, 2, ',', ' ') . '</tr><br/>
                                <tr ><b>Frete:</b> R$ ' . number_format($frete, 2, ',', ' ') . '</tr><br/>
                                <tr ><b>Total: <span style="color: #de010c">R$ ' . number_format($totalfinal, 2, ',', ' ') . '</span></b></tr><br/>
                   
                        </table>
                    </div>
        <br/>
        
        <div class="alert alert-success" role="alert">
  Uma confirmação foi enviada para seu e-mail. Agradecemos a preferência!
</div>
        <div class="card" style="width: 25%">
           <button onclick="window.location.href=\'orderHistory.php?custID='.$custID.'\'" class="btn btn-primary float-right">Ver histórico de pedidos</button>
        </div>

        <br/>
        </div></div></div>';

   /* ini_set('sendmail_from','liviagranato@hotmail.com');
    ini_set('SMTP','myserver');
    ini_set('smtp_port',25);
    mail($email, 'Compra no site LivrosWebDev', 'Sua compra foi realizada com sucesso!',"From: liviagranato@hotmail.com" . "\r\n");*/

} else {
    echo '<p style="height: 500px">Não há nada no carrinho. <a href="#" onclick="window.location.href=\'index.php\'">Retornar às compras</a></p></div></div>';

}

?>

<?php


?>
</body>
</html>
<?php
include 'footer.php';

?>

