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

    <title>Carrinho</title>

</head>
<body class="background-index">

<?php include 'navbar.php';
include_once 'databaseConnection.php';
include_once("validationUtilities.php");

//Shopping cart uses cookies to store cart items.
//PHP script uses an array for adding, removing and displaying the cart items.
//Cookies can contain only string data so array must be serialized.


if ($_GET['addISBN']){
    $cookieName = "addISBN";
    $addISBN = $_GET['addISBN'];
    if (strlen($addISBN) > 0) {
        if (isset($addISBN, $bookArray)) {
            // Increment by +1
            $bookArray[$addISBN] += 1;
        } else {
            // Add new item to cart
            $bookArray[$addISBN] = 1;
        }
    }
} else if ($_GET['deleteISBN']){
    $cookieName = "deleteISBN";
    $deleteISBN = $_GET['deleteISBN'];
    if (strlen($deleteISBN) > 0) {
        if (isset($bookArray[$deleteISBN])) {
            // Deincrement by 1
            $bookArray[$deleteISBN] -= 1;
            // remove ISBN from array if qty==0
            if ($bookArray[$deleteISBN] == 0) {
                unset($bookArray[$deleteISBN]);
            }
        }
    }
}

// retrieve cookie and unserialize into $bookArray
if (isset($_COOKIE[$cookieName])) {
   $bookArray = unserialize($_COOKIE[$cookieName]);
}


if (isset($bookArray)) {
   // Write cookie
   setcookie($cookieName, serialize($bookArray), time() + 60 * 60 * 24 * 180);

   //Count total books in cart
   $totalbooks = 0;
   foreach ($bookArray as $isbn => $qty) {
      $totalbooks += $qty;
   }
   setCookie('BookCount', $totalbooks, time() + 60 * 60 * 24 * 180);
}
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
                                    echo '<li class="list-group-item"><a href="#" onclick="window.location.href=\'searchBrowse.php?id='.$row['CategoryID'].'&nome='.$row['CategoryName'].'&tag='.'browse'.'\'">'.$row['CategoryName'].'</a></li>';
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
                    <p class="text-center">
                        <?php
                        echo $totalbooks . " item";
                        if ($totalbooks != 1)
                            echo 's';
                        echo ' in your cart'
                        ?>
                    </p>

                    <?php
                    //To do:
                    // 1. Build sql statement containing ISBNs. Use foreach loop.
                    // 2. Execute sql and display book titles, prices, qty, etc.
                    if (count($bookArray)) {
                        echo "<table class='text-center' id='cart'><tr><th>ISBN</th><th>Qty</th><th>Add/Remove</th></tr>";
                        foreach ($bookArray as $isbn => $qty) {
                            echo "
                     <tr>
                        <td>
                           <a class='booktitle' href='ProductPage.php?isbn=$isbn'>$isbn</a> </td>
                        <td>$qty</td>
                        <td>
                           <a href='?addISBN=$isbn'>Add</a><br>
                           <a href='?deleteISBN=$isbn'>Remove</a>
                        </td>
                     </tr>";
                        }
                    }
                    ?>
                    </table>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';



?>
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