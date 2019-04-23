<?php require "config/config.php";?>
<?php
    if((isset($_POST['submit']))){
        $fullname = strip_tags($_POST['fullname']);
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(empty(trim($fullname))){
            echo "Fullname is required";
        }
        

        
 
        $query = "INSERT INTO users(fullname,email,username,password) VALUES('$fullname','$email','$username','$password')";
        $fire = mysqli_query($con,$query) or die("can not insert data into database.".mysqli_error($con));
        if($fire) echo "Data submitted to the database.";
    }
    ?>

    <!--Delete Data-->
    <?php
        if(isset($_GET['del'])){
          $id = $_GET['del'];
          $query = "DELETE FROM users WHERE id = $id";
          $fire = mysqli_query($con,$query) or die("Can not delete the data from database.".mysqli_error($con));
          if($fire) echo "Data deleted from Database";
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
                <!--show data here-->
                <div class="col-lg-8">
                     <h3>Users Data</h3>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>username</th>
                          <th>Fullname</th>
                          <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                             <?php
                             $query = "SELECT * FROM users";
                             $fire = mysqli_query($con,$query) or die("Can not fetch the data from Database".mysqli_error($con));
                             //if($fire) echo "We got the data from Database.";
                            //echo mysqli_num_rows($fire);
                            if(mysqli_num_rows($fire)>0){
                           //$users = mysqli_fetch_assoc($fire);
                           
                           while($user = mysqli_fetch_assoc($fire)){?>
                           <tr>
                              <td><?php echo $user['username'] ?></td>
                              <td><?php echo $user['fullname'] ?></td>
                              <td><?php echo $user['email'] ?></td>
                              <td>
                                 <a href="<?php $_SERVER['PHP_SELF']?>?del=<?php echo $user['id']?>"
                                 class="btn btn-sm-danger">Delete</a>
                                 
                                 
                             </td>
                             <td>
                                <a class="btn btn-sm btn-warning"
                                href="update.php?upd=<?php echo $user['id']?>"
                                >Update</a>
                             </td>

                           </tr>
                              <?php
                               }
                            } 

                          ?>
                        
                        </tbody>
                    </table>

                </div>
                <!--signup form-->
                <div class="col-lg-4">
                <h3>signup<h3>
                    <hr>
                    <form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input name="fullname" id="fullname" type="text" class="form-control" placeholder="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" id="username" type="text" class="form-control" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="text" class="form-control" placeholder="password" required>
                        </div>
                        <div class="form-group">
                           <button name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div>
</body>
</html>