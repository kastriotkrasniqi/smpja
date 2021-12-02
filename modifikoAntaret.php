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
    <link rel="stylesheet" href="styles/index.css" />
    <style>
    body {
        background-color: #f2f6ff;
    }

    .forma {
        height: calc(100vh - 75px);
    }

    #shtoAntar {
        height: fit-content;
    }
    </style>

</head>

<?php 
            
            if(isset($_GET['aid'])){

                $antari=mysqli_fetch_assoc(merrAntariid($_GET['aid']));

            }

            if(isset($_POST['edit'])){ 
                $antariid=$_POST['antariid'];
                $name=$_POST['name'];
                $lastname=$_POST['lastname'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $password=$_POST['password'];

                modifikoAntaret($name,$lastname,$email,$phone,$password,$antariid);

                header('location:antaret.php');
            }

        
            if(isset($_GET['deleteantaret'])){
              

                fshiAntaret($_GET['deleteantaret']);

                header('location:antaret.php');
               
            }
            
            
            
          

?>

<body>

    <?php include './inc/header.php'; ?>
    <!-- ========== Start Banner ========== -->

    <div class="container d-flex justify-content-center forma">
        <form action="" id="shtoAntar" method="post" class="bg-white w-75 my-5 py-4 px-5 shadow">
            <h3 class="text-center">Edit</h3>
            <p class="text-center mb-4">
                Edit your account details.
            </p>
            <hr>
            <input type="hidden" name="antariid"
                value="<?php if(!empty($antari['antariid'])) echo $antari['antariid'] ?>">
            <div class="mb-3 position-relative">

                <input type="text" class="form-control py-2 px-3" placeholder="Enter your name" name="name"
                    value="<?php if(!empty($antari['emri'])) echo $antari['emri'] ?>" />
            </div>
            <div class="mb-3 position-relative">

                <input type="text" class="form-control py-2 px-3" placeholder="Enter your lastname" name="lastname"
                    value="<?php if(!empty($antari['mbiemri'])) echo $antari['mbiemri'] ?>" />
            </div>


            <div class="mb-3 position-relative">

                <input type="text" class="form-control py-2 px-3" placeholder="Enter your phone number" name="phone"
                    value="<?php if(!empty($antari['telefoni'])) echo $antari['telefoni'] ?>" />
            </div>
            <div class="mb-3 position-relative">

                <input type="email" class="form-control py-2 px-3" placeholder="Enter your email" name="email"
                    value="<?php if(!empty($antari['email'])) echo $antari['email'] ?>" />
            </div>
            <div class="mb-3 position-relative">

                <input type="password" class="form-control py-2 px-3" placeholder="Enter your password"
                    value="<?php if(!empty($antari['fjalekalimi'])) echo $antari['fjalekalimi'] ?>" name="password" />
            </div>
            <button class="btn btn-primary w-100 py-2" name="edit" type="submit">
                Update
            </button>
        </form>
    </div>



    <?php include './inc/footer.php'; ?>

</body>

</html>