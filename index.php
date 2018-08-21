
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
	<title>Eagle Club</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
 <link href="css/full-slider.css" rel="stylesheet"> 
 <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/bootstrap-tab.js"></script>
  <script src="js/jquery-ui.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/bootstrap.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.js"></script>  
  
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php
        include 'header.php';
        ?>
    
	<div id="contents">
		<div>
			<div class="body">
                          
                                 <div style="width: 940px; height: 520px;">
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/terminator.jpg');"></div>
                <div class="carousel-caption">
                    <h5><a href="" style="color: aliceblue; font-size: 17px;">TERMINATOR</a></h5>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/titanic.jpg');"></div>
                <div class="carousel-caption">
                    <h5><a href="" style="color: aliceblue; font-size: 17px;">TITANIC/a></h5>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/dracula.jpg');"></div>
                <div class="carousel-caption">
          <h5><a href="" style="color: aliceblue; font-size: 17px;">DRACULA</a></h5>

                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/sinestro.jpg');"></div>
                <div class="carousel-caption">
          <h5><a href="" style="color: aliceblue; font-size: 17px;">SINESTRO</a></h5>

                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/prince.jpg');"></div>
                <div class="carousel-caption">
          <h5><a href="" style="color: aliceblue; font-size: 17px;">THE PRINCE</a></h5>

                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    </div>
                             
                  
                                
			</div>
		</div>
	</div>
    
    
    
	<?php
        include 'footer.php';
        ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 4000 //changes the speed
    })
    </script>
</body>
</html>