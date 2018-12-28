<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Browser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    
    <!-- bootstarp -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <!--bootstrap-->
    <!-- data tables-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
    <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	    $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 15
            });
	})
    </script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php
	    session_start();

	    $uname=null;
	    if (!isset($_SESSION['username'])) {
	    }
	    else{
		$uname=$_SESSION['username'];
	    }
	    
	    if($uname!=""){
		echo "<a class='brand' href='home.php'>FileMonster</a>";?>
		<div class="nav-collapse">
		<ul class="nav">
		    <li class="active"><a href="home.php">Home</a></li>
		    <li><a href="about.php">About</a></li>
		    <li><a href="contact.php">Contact</a></li>              
		</ul>
		<a class="btn btn-primary pull-right" href="logout.php" title="Click to logout"><i class="icon-off"></i><?=$_SESSION['username']?></a>
	    <?php
	    }
	    else{
		echo "<a class='brand' href='index.php'>FileMonster</a>";?>
		<div class="nav-collapse">
		<ul class="nav">
		    <li class="active"><a href="index.php">Home</a></li>
		    <li><a href="about.php">About</a></li>
		    <li><a href="contact.php">Contact</a></li>              
		</ul>
	     <?php
	    }
		if($uname!=""){
		}
		else{
	    ?>
	    <a class="btn btn-primary pull-right" href="login.php" title="Click to login"><i class="icon-user icon-red"></i>Login</a>
	    <?php } ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
        <div class="main">
	<?php
	    if($uname!=""){
		echo "<a href='addfile.php'><button class='btn btn-success'><i class='icon-upload icon-white'></i>Add File</button></a>";
	    }
	    else{
	?>
           <a href="index.php?categ=Images"><button class="btn btn-inverse"><i class=" icon-picture icon-white"></i>Images</button></a>
	   <a href="index.php?categ=Music"><button class="btn btn-success"><i class=" icon-music icon-white"></i>Music</button></a>
           <a href="index.php?categ=Videos"><button class="btn btn-primary" id="clickme"><i class="icon-film icon-white"></i>Videos</button></a>
           <a href="index.php?categ=Documents"><button class="btn btn-info"><i class="icon-file icon-white"></i>Documents</button></a>
           <a href="index.php?categ=Text Files"><button class="btn btn-warning"><i class="icon-file icon-white"></i>Text Files</button></a>
           <a href="index.php?categ="><button class="btn"><i class="icon-check"></i>All Files</button></a>
	<?php } ?>
           <hr>
	    <h2 style="color:#ee6b26">Contact Us</h2>
            <div align="justify">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel purus et massa ultrices sagittis vitae sed mi. Aenean id massa bibendum, ullamcorper augue a, malesuada mi. Aliquam in libero sed nisi viverra vehicula. Nam aliquet fermentum magna at ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan a sapien quis placerat. Integer lacinia laoreet sem, eget bibendum leo laoreet at. Sed eleifend interdum dui sit amet adipiscing. Praesent consectetur mattis ornare. Fusce ac pellentesque neque, in hendrerit nisi. Sed luctus fermentum volutpat.

		
	    </div>
        </div>
    </div>
</body>
</html>
