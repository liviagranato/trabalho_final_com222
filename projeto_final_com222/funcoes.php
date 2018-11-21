
<?php


function carregaConteudoTopicos($conn, $categoria){



$query = "SELECT  bd.*, ba.nameF, ba.nameL from bookcategories as bc 
 join bookcategoriesbooks as bcb on bc.CategoryID = bcb.CategoryID
 join bookdescriptions as bd on bcb.ISBN = bd.ISBN 
 join bookauthorsbooks as bab on bab.ISBN = bcb.ISBN 
 join bookauthors as ba on bab.AuthorID = ba.AuthorID where bc.CategoryName like '$categoria'";
$resultado = $conn ->();


}