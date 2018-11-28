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
