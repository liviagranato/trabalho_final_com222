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
                            <li class="list-group-item"><a href="#">ASP.NET</a></li>
                            <li class="list-group-item"><a href="#">JavaScript</a></li>
                            <li class="list-group-item"><a href="#">MySQL</a></li>
                            <li class="list-group-item"><a href="#">PHP</a></li>
                            <li class="list-group-item"><a href="#">Regular Expressions</a></li>
                            <li class="list-group-item"><a href="#">SQL</a></li>
                            <li class="list-group-item"><a href="#">Web Usability</a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-8 mx-auto">
                <h1>Sobre o LivrosWebDev</h1>
                <br/>
                <p>
                    Esse site foi desenvolvido como parte da disciplina Desenvolvimento de Sistemas na Web.
                </p>
                <p>
                    A aplicação consta em um site de e-commerce de livros e foi baseada no site <a href="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/index.php">GeekBooks.com</a>
                </p>
                <p>
                    <b>Membros da equipe:</b></br>
                    Lívia Granato </br>
                    Luis Henrique </br>
                    Thiago Silva </br>
                    Ramon Martins </br>
                </p>
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