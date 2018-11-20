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
    <title>Início</title>
</head>
<body class="background-index">





<?php include 'navbar.php';


?>

<div class="fundo">
    <div class="container fundo-container">
        <div class="row">
            <div class="col-md-3 mx-auto">

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <p class="card-text">
                        <form class="form-group">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                        </form>
                        <button class="btn btn-primary btn-block" type="submit">Buscar</button>
                        </p>
                    </div>
                </div>

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Pesquisar</div>
                    <div class="card-body">
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('ASP.NET')">ASP.NET</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('Web Services')">Web Services</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('MySQL')">MySQL</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('PHP')">PHP</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('Regular Expressions')">Regular Expressions</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('SQL')">SQL</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('Web Usability')">Web Usability</a></li>
                            <li class="list-group-item"><a href="#" onclick="chamaCarregaConteudoTopicos('Morse Code')">Morse Code</a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-8 mx-auto">

            </div>



<?php
include_once 'DatabaseConnection.php';
include_once 'funcoes.php';
$conexao = $conn;
$topico = $_GET();
    CarregaConteudoTopicos($conexao, $topico);

?>
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