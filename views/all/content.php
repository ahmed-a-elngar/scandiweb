<?php

    include_once("views/all/header.php");
    
    echo " <div class='container mt-4'> ";

    echo " <form id='delete_form' action='delete' method='POST'> <div class='row col-md-12'> ";
    
    foreach($products as $product)
    {
        include('views/all/partial/product.php');
    }

    echo "</div> </form> </div>";

?>