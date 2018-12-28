<?php
session_start();
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>FileMonster Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!--<link rel="shortcut icon" href="../favicon.ico">-->
        <link rel="stylesheet" type="text/css" href="css/login.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1>File Management System</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="admin"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Register</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1> Register Here </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="name" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="password"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
        <?php
            include "db.php";
            
            function register($id,$uname,$pass){
                $q="insert into users values ('$id','$uname','$pass')";
                mysqli_query("alter table users auto_increment = 1");
                if(mysqli_query($q)){
                    mkdir("$dir", 0700);
                    echo "<script language='javascript'>
				alert('User Registered');
				window.location = 'login.php';
				</script>
				";
                    
                }
                else{
                     echo "<script language='javascript'>
				alert('Registration Failed Or User Already Registered');
				window.location = 'login.php';
				</script>
				";
                }
            }
            if(isset($_POST['usernamesignup'])){
                $uname=$_POST['usernamesignup'];
                $pass=$_POST['passwordsignup'];
                $pass_crypt=md5($pass);
            
                register('',$uname,$pass_crypt);
            }
            if(isset($_POST['username'])){
                include "db.php";
                $username=$_POST['username'];
                $password=$_POST['password'];
                $pass_crypt=md5($password);
            
                $q ="SELECT * FROM users WHERE username = '$username' and password = '$pass_crypt'";
                $query=mysqli_query($config, $q);
                // Check username and password match
                if (mysqli_num_rows($query) == 1){
                        // Set username session variable
                        $_SESSION['username']=$_POST['username'];
                        // Jump to secured page
                        header("Location: home.php");
                }
                else{
                        echo "
                        <script language='javascript'>
                                alert('Invalid Credentials');
                        </script>
                        ";
                }
            }
        ?>
    </body>
</html>