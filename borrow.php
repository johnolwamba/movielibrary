<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: movies.php");
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Borrow Movie</title>
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="css/style.css" type="text/css">
            <link rel="stylesheet" href="js/jquery-ui.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
            <script src="js/bootstrap-tab.js"></script>
            <script src="js/jquery-ui.js"></script>
            <script src="js/bootstrap-modal.js"></script>
            <script src="js/bootstrap-tooltip.js"></script>
            <script src="js/bootstrap-popover.js"></script>
            <script src="js/script.js"></script>            
            <script src="js/jquery-1.8.3.min.js"></script>

        </head>
        <body>
            <?php
            include 'header.php';
            ?>
            <div style="float: right; width: 150px; margin-right: 20px;">
                             
                  <a href="approvedmovies.php"> <button class="btn btn-primary" style="margin-bottom: 15px;">View approved Movies</button></a><br/>
                
                <a rel='tooltip' title='View cart' id="cart" href="cart.php" style="margin-bottom: 15px;"> <button class="btn btn-success">View Cart</button></a>
                <a href="logout.php"> <button class="btn btn-danger" style="margin-top: 15px;" >Logout</button></a><br/>
              
            </div>
            <div id="contents">
                <div>


                    <div class="body"  id="gallery">


                        <?php
                        include 'Administrator/connect.php';
                        ?>
                        <legend>All Movies</legend>
                        <?php
                        $movies = mysqli_query($link,"select * from movies");
                        $row = mysqli_fetch_row($movies);



                        $Nrows = mysqli_num_rows($movies);

                        echo '<div class="well">';

                        define('COLS', 5); // number of columns
                        $col = 0; // number of the last column filled

                        echo "<table width=\"100%\" border=\:0\" class='table table-bordered'>";
                        echo '<tr>'; // start first row

                        while ($rows = mysqli_fetch_array($movies)) {
                            $col++;
                            if ($col == COLS) { // have filled the last row
                                $col = 1;
                                echo '</tr><tr>'; // start a new one
                            }
                            echo '<td>';
                            echo '<center><br>';
                            echo "<img src='Administrator/movie_banners/" . $rows['photo'] . "' height='150px' width='150px'><br/>";
                            echo $rows['name'];
                            ?>
                            <br/><button id="<?= $rows['movie_id'] ?>" class="btn btn-success" onclick="add_cart(this.id)">Add to Cart</button></td>
                            <?php
                        }

                        echo '</tr>'; // end last row
                        echo "</table>";
                        ?>


                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </body>
    </html>
    <?php
}
?>

<script>
                                function add_cart(id) {
                                    if (window.XMLHttpRequest) {
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                            
                                            alert(xmlhttp.responseText);
                                            }
                                           
                                        
                                    }
                                    xmlhttp.open("GET", "add_cart.php?id=" + id, true);
                                    xmlhttp.send();
                                
                                }
</script>
