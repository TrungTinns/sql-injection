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
        $error = "Vui lòng nhập mật khẩu hiện tại!";
    elseif(!checkpass($old_password,$_SESSION['password']))
        $error = "Mật khẩu hiện tại sai!";
    else if (empty($password))
        $error = "Vui lòng nhập mật khẩu mới!";
    else if (empty($_POST['newpassword_comfirm']))
        $error = "Vui lòng xác nhận mật khẩu mới!";
    else if(!checkpass($password,$password_comfirm))
        $error = "Mật khẩu xác nhận không khớp!";
    else if($old_password==$password)
        $error = "Trùng mật khẩu cũ";
    else 
    {
        $con=open_database();
                $query = "SELECT * FROM account2 WHERE username=
                '$username'";
                $results = mysqli_query($con, $query);
                $dbpassword= $results->fetch_object()->password;

                if(password_verify($old_password,$dbpassword))
                {
                    $password = password_hash($password,PASSWORD_BCRYPT);
                        $query_updatedb=mysqli_query($con,"update account2 set password='$password'  where  username='$username'");
                        if($query_updatedb)
                        {
                            $message = "Đổi mật khẩu thành công!";
                            session_destroy();
                        }
                        else
                            $error ='Đổi mật khẩu thất bại.';
                }
                else{
                    $error = "Mật khẩu hiện tại không đúng";
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
	<title>Change password</title>
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
            <form action="reset_password.php" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light" onsubmit="return validateInput_forResetPassword()">
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
                <!-- <div class="form-group custom-control custom-checkbox">
                    <input  name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Remember login</label>
                </div> -->
                <div class="form-group">
                    <?php
                        if(!empty($error))
                        {
                            echo '<div class="alert alert-danger" id="errorMessage">' . $error .'</div>';
                        }
                        else
                        {
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