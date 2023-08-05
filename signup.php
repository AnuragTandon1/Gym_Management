<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into sign_in (user_id,user_name,user_password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location : index.html");
			exit;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User signup</title>
</head>
<body>
    <style >
        body{
    
    background-image: url(https://e0.pxfuel.com/wallpapers/1018/998/desktop-wallpaper-gym-background-beautiful-high-resolution-empty-gym.jpg);
  
    background-repeat: no-repeat;
    background-size: cover;
   
    
}
        #text{
            height: 25px;
            border-radius:5px;
            padding:4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button{
            padding: 10px ;
            width : 100px;
            color : white;
            background-color: lightblue ;
            border: none ;

        }
        #box{
          background-color:grey;
          margin:auto;
          width:300px;
          padding:20px;
        }
        .hg{
            position: relative;
            top: 200px;
        }
        .jiji{
           position: relative;
           left: 140px;
        }
    </style>
    <div class="hg" id="box">

<form action="post">

    <div style=" font-size:20px; margin:10px; color:white;">Sign up</div>
    <label for="">Enter Username</label>
    <input id="text" type="text" name="user_name"><br><br>
    <label for="">Enter Password</label>
    <input id="text" type="password" name="password"><br><br>
     <input id="button" type="submit" value="Signup"><br><br>
     <a href="user_login.php">Go to login</a>
     <a  class="jiji"  href="index.html">Return home</a>
</form>
</div>
</body>
</html>