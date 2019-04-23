<?php require "config/config.php";?>
<?php
    if(isset($_GET['upd'])){
        $id = $_GET['upd'];
        $query = "SELECT * FROM users WHERE id=$id";
        $fire = mysqli_query($con,$query) or die("Can not fetch the Data.".mysqli_error($con));
       $user = mysqli_fetch_assoc($fire); 
      //echo $user['fullname'];
       }

?>
<!--update the data-->
<?php
    if(isset($_POST['btnupdate'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = "UPDATE users SET fullname = '$fullname',email = '$email',username = '$username',password = '$password' WHERE id=$id";
        $fire = mysqli_query($con,$query) or die("Can not update the data.".mysqli_error($con));

        if($fire) header("Location:index.php");
  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--signup-->
                <div class="col-lg-4 col-lg-offset-4">
                <h3>Update Data</h3>
                    <hr>
                    <form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input value="<?php echo $user['fullname']?>" name="fullname" id="fullname" type="text" class="form-control" placeholder="fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $user['email']?>" name="email" id="email" type="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $user['username']?>"name="username" id="username" type="text" class="form-control" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                           <button name="btnupdate" id="btnupdate" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div>
</body>
</html>