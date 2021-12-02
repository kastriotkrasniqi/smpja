<?php include './inc/sqlfunctions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />

    <!-- ========== Start font-awesome ========== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- ========== End font-awesome ========== -->

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/login.css" />
    <style>
    .error {
        color: red;
    }
    </style>
</head>
<?php 
            
                if(isset($_POST['login'])){
                    $email=$_POST['email'];
                    $password=$_POST['password'];

                    login($email,$password);
                }
            
            
            ?>

<body>
    <!-- ========== Start LOGIN PAGE ========== -->
    <a name="" id="homepage" class="btn btn-primary py-2 position-absolute" href="index.php" role="button">Back to
        Homepage</a>
    <div class="container d-flex flex-column align-items-center">
        <img src="./img/smp_logo.png" alt="" id="logo" class="mb-4" />
        <form action="" id="login-form" method="post" class="bg-white p-5 shadow">
            <h3 class="text-center">Welcome Back</h3>
            <p class="text-center mb-5">
                Enter your credentials to access your account.
            </p>
            <div class="mb-4 position-relative">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control py-2 px-5" placeholder="Enter your email" name="email" />
            </div>
            <div class="mb-4 position-relative">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control py-2 px-5" placeholder="Enter your password"
                    name="password" />
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100 py-2">Login</button>
        </form>
        <small class="mt-4 text-muted">Not a user yet?
            <a href="register.php" class="text-decoration-none">
                Register
            </a></small>
    </div>

    <!-- ========== End LOGIN PAGE ========== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="./script/validation.js"></script>
</body>

</html>