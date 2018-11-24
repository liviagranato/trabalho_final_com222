<?php 
include 'navbar.php';
include_once 'databaseConnection.php';
include_once 'validationUtilities.php';




if(isset($_POST['confirmar'])){
	$id = $_POST['id'];
	$ruaV = fIsValidLength($_POST['street'],10,40);
	$cidadeV = fIsValidLength($_POST['city'],10,20);
	$estadoV = fIsValidStateAbbr($_POST['state']);
	$cep = $_POST['zip'];

	if($ruaV && $cidadeV && $estadoV && $cep != ''){

		$rua = $_POST['street'];
		$cidade = $_POST['city'];
		$estado =  $_POST['state'];

			$query = "UPDATE bookcustomers set street = '$rua',
							 city = '$cidade',
							 state = '$estado',
							 zip = '$cep'
					  WHERE custID = '$id'";

                            $resultado = $conn->query($query);

                            if($resultado){

                            	echo "Dados cadastrados com sucesso";		

                            }else{

                            	echo "Erro ao atualizar dados";
                            }

		}

}


if (isset($_POST['cadastrar'])) {

	$email =  $_POST['email']; 
	$nome = $_POST['fname'];
	$sobrenome = $_POST['lname'];
	$ruaV = fIsValidLength($_POST['street'],10,40);
	$cidadeV = fIsValidLength($_POST['city'],10,20);
	$estadoV = fIsValidStateAbbr($_POST['state']);
	$cep = $_POST['zip'];

	if ($email != '' || $nome != '' || $sobrenome != '' || $ruaV || $cidadeV || $estadoV || $cep != '') {
		$rua = $_POST['street'];
		$cidade = $_POST['city'];
		$estado = $_POST['state'];

		$query = "INSERT INTO bookcustomers (email, fname, lname, street, city, state, zip)
		 		  VALUES('$email','$nome', '$sobrenome', '$rua', '$cidade', '$estado', '$cep') ";

		 		  $resultado = $conn->query($query);

		 		  if($resultado){

		 		  		echo "Cadastro realizado com sucesso!";

		 		  }else{

		 		  		echo "Usuário não cadastrado";
		 		  }

	}



}

?>