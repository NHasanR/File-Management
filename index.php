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
          <a class="brand" href="index.php">FileMonster</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>              
	    </ul>
	    <a class="btn btn-primary pull-right" href="login.php" title="Click to login"><i class="icon-user icon-red"></i>Login</a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
        <div class="main">
           <a href="index.php?categ=Images"><button class="btn btn-inverse"><i class=" icon-picture icon-white"></i>Images</button></a>
	   <a href="index.php?categ=Music"><button class="btn btn-success"><i class=" icon-music icon-white"></i>Music</button></a>
           <a href="index.php?categ=Videos"><button class="btn btn-primary" id="clickme"><i class="icon-film icon-white"></i>Videos</button></a>
           <a href="index.php?categ=Documents"><button class="btn btn-info"><i class="icon-file icon-white"></i>Documents</button></a>
           <a href="index.php?categ=Text Files"><button class="btn btn-warning"><i class="icon-file icon-white"></i>Text Files</button></a>
           <a href="index.php?categ="><button class="btn"><i class="icon-check"></i>All Files</button></a>
           <hr>
            <table id="dtable" width="100%">
                    <thead>
                        <th>File Name</th>
                        <th>File Size</th>
                        <th>Uploader</th>
                        <th>DOWNLOAD</th>
                    </thead>
                    <tbody>
                        <?php

                            $categ=null;

                            include "db.php";
							$categ="all";
							$categ=$_GET["categ"];
                            if($categ=="all"){
                                $q="select * from upload_data";
                            }
                            else{
                                $q="select * from upload_data where CATEGORY='$categ'";
                            }
                            $result=mysqli_query($config, $q);
                            while($rs=mysqli_fetch_array($result)){
                                echo "
                                    <tr>
                                        <td width='60%'>".$rs['FILE_NAME']."</td>
                                        <td align='right'>".$rs['FILE_SIZE']." KB</td>
                                        <td align='right'>".$rs['UPLOADED_BY']."</td>
                                        <td align='right'><a href='".$rs['PATH']."'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>
