
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





<?php include 'navbar.php';
include_once 'DatabaseConnection.php';

?>

<div class="fundo">
    <div class="container fundo-container">
        <div class="row">
            <div class="col-md-3 mx-auto">

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <p class="card-text">
                        <form class="form-group" method="get" action="searchBrowse.php">
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
                    $query = "SELECT * from bookcategoriesbooks as bcb join bookdescriptions as bd on bcb.ISBN = bd.ISBN ORDER BY RAND() LIMIT 3";
                    $resultado = $conn -> query($query);
                    if ($resultado->num_rows>0){
                        while($row = $resultado->fetch_assoc()){
                            $s = substr($row['description'], 0, 260);
                            $result = substr($s, 0, strrpos($s, ' '));
                            $more = '<a onclick="window.location.href=\'productPage.php?id='.$row['ISBN'].'\'" href="#">Mais...</a>';
                            echo '<li class="list-group-item">
                                  <div>
                                       <h4><a href="#" onclick="window.location.href=\'productPage.php?id='.$row['ISBN'].'\'">'.$row['title'].'</a></h4> 
                                            <table>
                                                <td>
                                                    <img onclick="window.location.href=\'productPage.php?id='.$row['ISBN'].'\'" src="www.baldochi.unifei.edu.br/COM222/trabfinal/imagens/'.$row['ISBN'].'.01.THUMBZZZ.jpg">
                                                </td>
                                                <td>
                                                    '.$result.' '.$more.'
                                                </td>
                                            </table>
                                  </div>
                              </li>';
                        }
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