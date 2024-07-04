<?php
session_start();
if (!isset($_SESSION['tennv']) && !isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$ten_nv = $_SESSION['tennv'];
include('db.php');
$username=$_SESSION['username'];
$old_password ='';
$password='';
$error="";
$message='';
function checkpass($newpasswold, $newpasswold_comfirm)
{
    if ($newpasswold== $newpasswold_comfirm)
        return TRUE;
    return FALSE;
}
if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpassword_comfirm']))
{
    $old_password = ($_POST['oldpassword']);
    $password=($_POST['newpassword']);
    $password_comfirm=($_POST['newpassword_comfirm']);

    if(empty($old_password))
        $error = "Please enter your current password!";
    elseif(!checkpass($old_password,$_SESSION['password']))
        $error = "Current password is wrong!";
    else if (empty($password))
        $error = "Please enter a new password!";
    else if (empty($_POST['newpassword_comfirm']))
        $error = "Please confirm new password!";
    else if(!checkpass($password,$password_comfirm))
        $error = "Confirmation password does not match!";
    else if($old_password==$password)
        $error = "Duplicate old password";
    else 
    {
                $query = "SELECT * FROM account1 WHERE username=
                '$username'";
                $con = open_database();
                $results = mysqli_query($con, $query);
                $dbpassword= $results->fetch_object()->password;

                if(($old_password==$dbpassword))
                {
                        $query_updatedb=mysqli_query($con,"update account1 set password='$password'  where  username='$username'");
                        if($query_updatedb)
                        {
                            $message = "Change password successfully!";
                            session_destroy();
                        }
                        else
                            $error ='Change password failed.';
                }
                else{
                    $error = "Current password is incorrect";
                } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

	<link rel="stylesheet" href="style.css"> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<title>Đổi mật khẩu</title>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">  
        <!-- Brand -->
        <?php
            echo '<a class="navbar-brand" href="#"> Xin chào ' .$ten_nv.'!</a>';
        ?>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> 
            <span class="navbar-toggler-icon"></span>
        </button>
        
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="reset_password.php">Reset password</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
<div class="container" >
    <div class="row justify-content-center " >
        <div class="col-md-8 col-lg-6">
            <h3 class="text-center text-secondary mt-5 mb-3">Change password</h3>
            <form action="reset_password.php" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group " >
                    <label for="oldpassword">Current password</label>
                    <input name="oldpassword" id="oldpassword" type="password" class="form-control input-lg" placeholder="Enter current password" autofocus onclick="clearErrorMessage()">
                </div>
                <div class="form-group">
                    <label for="newpassword">New password</label>
                    <input  name="newpassword" id="newpassword" type="password" class="form-control input-lg" placeholder="Enter new password" onclick="clearErrorMessage()">
                </div>
                <div class="form-group">
                    <label for="newpassword_comfirm">Confirm password</label>
                    <input name="newpassword_comfirm" id="newpassword_comfirm" type="password" class="form-control input-lg" placeholder="Enter a new password" onclick="clearErrorMessage()">
                </div>
                <div class="form-group">
                    <?php
                        if(!empty($error))
                        {
                            echo '<div class="alert alert-danger" id="errorMessage">' . $error .'</div>';
                        }
                        else{
                            echo '<div class="alert alert-danger" id="errorMessage" style="display: none;"></div>';
                        }
                        if(!empty($message))
                        {
                            echo '<div class="alert alert-success">' . $message .'</div>';
                        }
                    ?>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success ">Change password</button>
                    </div>     
                    <a href="logout.php">👈 Logout</a>          
                </div>
            </form>

        </div>
    </div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>