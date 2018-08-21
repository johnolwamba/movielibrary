<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: movies.php");
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>My Cart</title>
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
           
            <div id="contents">
                <div>


                    <div class="body"  id="gallery">
                    <?php
                     include 'Administrator/connect.php';
                        ?>
                        <legend>My Cart</legend>
                        
                       
                        <form action="cart.php" method="post">
                        <table border= "1" width=\"150%\" border=\:0\" class='table table-striped'>
                             <th>Movie</th><th>REMOVE</th> 
                              
                        <?php
                         echo '<tr>';
                       $get_movies = mysqli_query($link,"select * from borrow where user_id = '{$_SESSION['id']}' and status = 0");
                       while ($show_cart= mysqli_fetch_array($get_movies)) {
                          
                           $get_movie = mysqli_query($link,"select * from movies where movie_id='{$show_cart['movie_id']}'");
                            $movie_borrowed = mysqli_fetch_array($get_movie);
                            
                           
                            
                            $id = $movie_borrowed['movie_id'];
                            
                           ?>
                             <td><?php echo $movie_borrowed['name']; ?></td><td><button id="<?= $id ?>" class="btn btn-danger" onclick="add_cart(this.id)">Delete</button></a></td>                         
                        
                           <?php
                            echo '</tr>'; // end last row
                          
                       }
                       
                        echo "</table>";
                        echo '<button class="btn btn-primary" name="submit" style="margin-right:15px;">Order</button><a href="borrow.php">Back to Shopping</a>';
                        echo '</form>';
                        
                        if(isset($_POST['submit'])){
                            $orders = mysqli_query($link,"update borrow set status = 1 where status = 0 and user_id='{$_SESSION['id']}'");
                            ?>
                             <script>
                             //  location.reload();                             
                              </script>
                                <?php
                             
                        }
                        
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
                                            location.reload();
                                            }
                                           
                                        
                                    }
                                    xmlhttp.open("GET", "delete_movie.php?id=" + id, true);
                                    xmlhttp.send();
                                
                                }
                                
</script>
