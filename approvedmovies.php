<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: movies.php");
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>My Borrow Log</title>
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
                     
                     $per_page = 10;
$pages_query=mysqli_query($link,"select * from borrow where user_id = '{$_SESSION['id']}' and status = 2");
$pages = ceil(mysqli_num_rows($pages_query)/$per_page);

if(!isset($_GET['page']))
{
   header("location: approvedmovies.php?page=1");
}else {
    
$page=$_GET['page'] ;

}
$start = (($page - 1)* $per_page); 

 $query = "select * from borrow limit $start,$per_page";
                        ?>
                     
                         <a onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
                        <legend>My Borrow Log</legend>
                        <table border= "1" width=\"150%\" border=\:0\" class='table table-striped'>
                             <th>Movie</th><th>Date Approved</th> 
                              
                        <?php
                         echo '<tr>';
                       $get_movies = mysqli_query($link,"select * from borrow where user_id = '{$_SESSION['id']}' and status = 2");
                       while ($show_cart= mysqli_fetch_array($get_movies)) {
                          
                           $get_movie = mysqli_query("select * from movies where movie_id='{$show_cart['movie_id']}'");
                            $movie_borrowed = mysqli_fetch_array($get_movie);
                            
                           
                            
                            $id = $movie_borrowed['movie_id'];
                            
                           ?>
                             <td><?php echo $movie_borrowed['name']; ?></td><td><?php echo $show_cart['approval_date']; ?></td>                         
                        
                           <?php
                            echo '</tr>'; // end last row
                          
                       }
                       
                        echo "</table>";
                        
                         
echo '<div style="float:right; width:200px;" class="alert alert-info">';
for ($number = 1; $number <=$pages; $number++) {
    
    echo '<a href="?page='.$number.'" style="font-size:16px; margin-right:10px;" class="alert-success">'.$number.'</a>'; 
   
}
echo '  ';
echo "Current Page: $page";
echo '</div>';
                        
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

