<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
    include('db.php');
    $username="";
    $password="";
    $tennv="";
    $error="";
    $con = open_database();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(!empty($username) && !empty($password))
        {
            $query = "SELECT * FROM account1 WHERE username=
                    '$username'&& password = '$password'";
            $result = $con->query($query);

            if(!$result)
            {
                $error ='Error SQL ';
            }
            else{
            if($result->num_rows==0)
            {
                $error="Username or password is wrong";
            }
                $data = $result->fetch_assoc();
                $_SESSION['query'] = $query;
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['tennv'] = $data['lastname'].' '.$data['firstname'];
                header("Location: index.php");
                exit();
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
	<title>Login</title>
</head>

<body>
<div class="container" >
    <div class="row justify-content-center " >
        <div class="col-md-8 col-lg-6">
            <h3 class="text-center text-secondary mt-5 mb-3">Login</h3>
            <form action="login.php" method="post" class="border rounded mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group " >
                    <label for="username">Username</label>
                    <input  value="<?= $username ?>" name="username" id="username" type="text" class="form-control input-lg" placeholder="Enter the username" autofocus onclick="clearErrorMessage()">
                </div>
                <div class="form-group">
                    <label for="username">Password</label>
                    <input name="password" id="password" type="password" class="form-control input-lg" placeholder="Enter the password" onclick="clearErrorMessage()">
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
                    ?>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success ">Login</button>
                    </div>              
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