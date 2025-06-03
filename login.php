
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>login</title>
   <style>

 
  
          
        /* background-image: url("backgroung.jpg"); */
        /* background-size: cover;      */
         /* background-repeat: no-repeat;*/
        /* background-position: center; */
    

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: sans-serif;
        }

        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        input {
            padding: 13px 20px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid white;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            margin: 15px;
            width: 300px;
            height: 34px;
           
            
        }
        .a{
         
            padding: 11px ;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid white;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            margin-top: 15px;  
            height: 10;
            text-decoration: none;
        }

        .main{
            padding: 11px ;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid white;
            background: rgba(0, 0, 0, 0.5);
            color: white;
         
            height: 10;
            text-decoration: none;
            cursor: pointer;
            
        }
   </style>
   
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<video autoplay muted loop>
    <source src="video.mp4" type="video/mp4">
</video>

    <center>

       
   
    
     <br>
    
        
        <input type="text" name="user" id="" placeholder="enter user name"><br><br>
        <input type="password" name="pass" placeholder="enter your password" ><br><br>
        <input type="submit" value="login" class="main" ><br>
       
        <br>
       
    </div>
    <a href="sign.php" class="a">sing up </a>
    </form>
    </center>
    <div>
            <?php
            if(isset($_POST['user']) && (!empty($_POST['user'])) && (!empty($_POST['pass']))){
               
                extract($_POST);
            $con=new mysqli('localhost' , 'root' , '' ,'computer');
            $sql="SELECT * FROM  client  WHERE    passcl='$pass' and usercl='$user'";
           
            $res=$con->query($sql);
            if($res->num_rows!=0){


                header("location:index.php");
                
            }
            else echo "Invalid user";
            }
            ?>
        </div>
        

       
</body>
</html>