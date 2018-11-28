
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
include_once 'databaseConnection.php';

?>

<div class="fundo">
    <div class="container fundo-container">
        <div class="row">

            <?php
            include_once 'menu_lateral.php';
            ?>

            <div class="col-md-8 mx-auto">
                <ul class="list-group">
                    <?php
                    $query = "SELECT * from bookcategoriesbooks as bcb join bookdescriptions as bd on bcb.ISBN = bd.ISBN ORDER BY RAND() LIMIT 4";
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
                                                    <img onclick="window.location.href=\'productPage.php?id='.$row['ISBN'].'\'" src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/'.$row['ISBN'].'.01.THUMBZZZ.jpg">
                                                </td>
                                                <td style="padding-left: 15px" class="text-justify">
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