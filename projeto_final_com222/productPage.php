
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

    <title>Produto</title>

</head>
<body class="background-index">





<?php include 'navbar.php';
include_once 'databaseConnection.php';

?>

<div class="fundo">
    <div class="container fundo-container">
        <div class="row">
            <div class="col-md-3 mx-auto">

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <p class="card-text">
                        <form class="form-group" method="post" action="searchBrowse.php">
                            <input class="form-control mr-sm-2" name="palavra_chave" id="palavra_chave" type="search" placeholder="Search" aria-label="Search">
                            <br/>
                            <input class="btn btn-primary btn-block" value="Buscar" name="submit" id="submit" type="submit" formaction="searchBrowse.php">
                        </form>

                        </p>


                    </div>
                </div>

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Pesquisar</div>
                    <div class="card-body">
                        <p class="card-text">
                        <ul class="list-group">
                            <?php


                            $query = "SELECT distinct bc.* from bookcategories as bc join bookcategoriesbooks as bcb on bc.CategoryID = bcb.CategoryID order by bc.CategoryName asc";
                            $resultado = $conn->query($query);
                            if ($resultado->num_rows > 0){
                                while ($row = $resultado->fetch_assoc()){
                                    echo '<li class="list-group-item"><a href="#" onclick="window.location.href=\'searchBrowse.php?id='.$row['CategoryID'].'&nome='.$row['CategoryName'].'\'">'.$row['CategoryName'].'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-8 mx-auto">
                <ul class="list-group">
                    <?php
                    $ISBN = $_GET['id'];
                    $query = "SELECT * from bookdescriptions where ISBN = '$ISBN'";
                    $query_authores = "SELECT * from bookauthors as ba join bookauthorsbooks as bab on ba.AuthorID = bab.AuthorID where bab.ISBN = '$ISBN'";
                    $resultado = $conn -> query($query);
                    $resultado_authores = $conn->query($query_authores);
                    if ($resultado->num_rows>0){
                        $row = $resultado->fetch_assoc();
                        echo '
                            <div>
                                <h3>'.$row['title'].'</h3><br/>
                                <p>Por ';
                                    while ($authores = $resultado_authores->fetch_array()){
                                        echo'<a href="#">'.$authores['nameF'].' '.$authores['nameL'].'</a> ';
                                    }

                                echo '</p>
                                            <table>
                                                <td>
                                                    <a href="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/'.$row['ISBN'].'.01.LZZZZZZZ.jpg"><img src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/'.$row['ISBN'].'.01.MZZZZZZZ.jpg"></a>
                                                </td>
                                                <td width="100%" style="padding-left: 15px">
                                                    <ul class="list-unstyled tamanho-18">
                                                        <li>
                                                            <b>Preço:</b> <span style="color:#de010c"><b>R$ ' .$row['price'].'</b></span>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled tamanho-14">
                                                        <li>
                                                            <b>ISBN:</b> '.$row['ISBN'].'
                                                        </li>
                                                        <li>
                                                            <b>Editora:</b> '.$row['publisher'].'
                                                        </li>
                                                        <li>
                                                            <b>Páginas:</b> '.$row['pages'].'
                                                        </li>
                                                        <li>
                                                            <b>Edição:</b> '.$row['edition'].'
                                                        </li>
                                                    
                                                    </ul>
                                                    <ul>
                                                       <button onclick="window.location.href=\'shoppingCart.php?addISBN='.$row['ISBN'].'\'" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</button>
                                                    </ul>
                                                </td>
                                            </table>
                                            <br/>
                                            <div class="text-justify">
                                            '.$row['description'].'
                                            </div>
                                            <button onclick="window.location.href=\'shoppingCart.php?addISBN='.$row['ISBN'].'\'" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</button>
                                            
                                            
                            </div>
                        ';

                    }
                    ?>
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