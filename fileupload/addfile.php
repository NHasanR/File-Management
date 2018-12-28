<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}
else{
    $uname=$_SESSION['username'];
    $desired_dir="user_data/$uname/";
}
?>
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
          <a class="brand" href="home.php">FileMonster</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>              
	    </ul>
	    <a class="btn btn-primary pull-right" href="logout.php" title="Click to logout"><i class="icon-off icon-red"></i><?=$_SESSION['username']?></a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
        <div class="main">
           <button class="btn btn-success"><i class="icon-upload icon-white"></i><a href="addfile.php">Add File</a></button>
           <hr>
	    <div id="container">
		<div class="form_head">Add File Form</div><hr>
			<div class="control-group">
				    <label class="control-label">Name</label>
				    <div class="controls">
					<input type="text" name="uploader" value="<?=$uname?>" readonly/>
				    </div>
			</div>
			<div class="control-group">
			    <?php
				if(isset($_POST['categ'])){
				    $filter=$_POST['categ'];
				    if($filter=='audio/*'){
					$filtername="Music";
				    }
				    else if ($filter=='image/*'){
					$filtername="Images";
				    }
				    else if($filter=='video/*'){
					$filtername="Videos";
				    }
				    else if($filter=='application/*'){
					$filtername="Documents";
				    }
				    else{
					$filtername="Text Files";
				    }
				}
			    ?>
				    <label class="control-label">Category</label>
				    <div class="controls">
					<form action="" method="post">
					<select name="categ" id="categ" onchange="this.form.submit();" required>
					    <option value="<?=$filter?>"><?=$filtername?></option>
					    <option value=""></option>
					    <option value="audio/*">Music</option>
					    <option value="image/*">Images</option>
					    <option value="video/*">Videos</option>
					    <option value="application/*">Documents</option>
					    <option value="text/*">Text Files</option>
					</select>
					</form>
				    </div>
			</div>
		    <form method="post" action="addfile.php?cat=<?=$filtername?>" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label">Select Files</label>
				<input type="file" name="files[]" accept="<?=$filter?>" multiple required/>
			</div><hr>
			 <div class="controls">
				    <input type="submit" class="btn btn-primary" value="UPLOAD">
				    <a href="home.php" type="reset" class="btn btn-warning"><i class="icon-remove icon-white"></i>CANCEL</a>
			</div>
		    </form>
		<?php
		if(isset($_FILES['files'])){
			$cat_name=$_GET['cat'];
			if($cat_name==""){
			    echo "Category Required";
			    header('Refresh: 1;url=addfile.php');
			}
			else{
			    $count=0;
			    
			    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
				    $file_name = $key.$_FILES['files']['name'][$key];
				    $size =$_FILES['files']['size'][$key];
				    $file_f = $size / 1024;
				    $file_size =round($file_f);
				    $file_tmp =$_FILES['files']['tmp_name'][$key];
				    $file_type=$_FILES['files']['type'][$key];
				    $path="user_data/$uname/$file_name";
				    
				    
				    if($size==0){
					    echo "<h6 style='color:red'>$file_name Exeeds upload limit</h6>";
				    }
				    else{
					    include "db.php";
					    
					    if (file_exists("$desired_dir" . $file_name))
					    {
						    echo "<h6 style='color:red'>".$file_name . " already exists.</h6>";
					    }
					    else
					    {
						    $query="INSERT into upload_data VALUES('$file_name','$file_size','$file_type','$cat_name','$uname','$path')";
						    if(mysqli_query($config, $query)){			      
							    move_uploaded_file($file_tmp,"$desired_dir".$file_name);
							    //echo "<p style='color:blue'>$file_name Uploaded</p";
							    $count=$count+1;
						    }
						    else{
							    echo "Error in adding Files";
						    }
					    }
				    }
			    }
			    echo "<h6 style='color:blue'>"."$count Files Uploaded<h6>";
			    header('Refresh: 2;url=addfile.php');
			}
		}
		?>
	    </div>
	</div>
    </div>
</body>
</html>
