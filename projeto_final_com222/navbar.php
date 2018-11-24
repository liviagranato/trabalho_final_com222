<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="images/logo2.PNG"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">




        </ul>
        <div class="right">
            <lu class="navbar-nav mr-auto">
                <li class="nav-item right">
                    <lu class="navbar-nav mr-auto">
                        <li class="nav-item right">
                            <button class="btn btn-link float-right" onclick="window.location.href='shoppingCart.php'"><i class="fas fa-shopping-cart"></i> Ver Carrinho</button>
                        </li>
                        <li class="nav-item right">
                            <button class="btn btn-link float-right" ><i class="fas fa-user"></i> Sua Conta</button>
                        </li>
                    </lu>
                </li>
            </lu>
        </div>




        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->




<?php
//$funcao = $_COOKIE['inputFuncao'];
/*echo '<div class="right">
        <lu class="navbar-nav mr-auto">
            <li class="nav-item right">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>

    ';*/

if (isset($_COOKIE['inputFuncao']) && $_COOKIE['inputFuncao'] == '1') {
    echo '<li class="nav-item right">
                <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
        ';
}
echo '</lu></div></div></nav>';
?>