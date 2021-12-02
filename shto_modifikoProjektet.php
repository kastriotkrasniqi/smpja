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

    <style>
    @import url("./styles/header.css");

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
            
            if(isset($_GET['projektiid'])){

                $projekti=mysqli_fetch_assoc(merrProjektiid($_GET['projektiid']));

            }

            if(isset($_POST['update'])){ 
                $projektiid=$_POST['projektiid'];
                $emri=$_POST['emri'];
                $pershkrimi=$_POST['pershkrimi'];
                $datafillimit=$_POST['datafillimit'];
                $datambarimit=$_POST['datambarimit'];
            

                modifikoProjektet($emri,$pershkrimi,$datafillimit,$datambarimit,$projektiid);

                header('location:projektet.php');
            }
            if(isset($_POST['shto'])){ 
            
                $emri=$_POST['emri'];
                $pershkrimi=$_POST['pershkrimi'];
                $datafillimit=$_POST['datafillimit'];
                $datambarimit=$_POST['datambarimit'];
            

                shtoProjektet($emri,$pershkrimi,$datafillimit,$datambarimit);

                header('location:projektet.php');
            }

            if(isset($_GET['deleteprojekte'])){
                $projektiid=$_GET['deleteprojekte'];
    
                fshiProjekte($projektiid);
    
                header('location:projektet.php');
    
    }
         

?>

<body>

    <?php include './inc/header.php'; ?>
    <!-- ========== Start Banner ========== -->

    <div class="container d-flex justify-content-center forma">


        <form action="" id="shtoAntar" method="post" class="bg-white w-75
          my-5 py-4 px-5 shadow">
            <?php if(!empty($projekti['projektiid'])): ?>

            <h3 class="text-center ">Edit</h3>

            <?php else: ?>
            <h3 class="text-center">Shto</h3>
            <p class="text-center mb-4">
                Shto projekte.
            </p>
            <hr>
            <?php endif; ?>



            <input type="hidden" name="projektiid"
                value="<?php if(!empty($projekti['projektiid'])) echo $projekti['projektiid'] ?>">
            <div class="mb-3 position-relative">

                <input type="text" class="form-control py-2 px-3" placeholder="Emri projektit" name="emri"
                    value="<?php if(!empty($projekti['emri'])) echo $projekti['emri'] ?>" />
            </div>
            <div class="mb-3 position-relative">

                <input type="text" class="form-control py-2 px-3" placeholder="Pershkrimi" name="pershkrimi"
                    value="<?php if(!empty($projekti['pershkrimi'])) echo $projekti['pershkrimi'] ?>" />
            </div>


            <div class="mb-3 position-relative">
                <label for="datafillimit" class="form-label">Data fillimit:</label>
                <input type="date" class="form-control py-2 px-3" placeholder="Data fillimit" name="datafillimit"
                    value="<?php if(!empty($projekti['datafillimit'])) echo $projekti['datafillimit'] ?>" />
            </div>
            <div class="mb-3 position-relative">
                <label for="datafillimit" class="form-label">Data mbarimit:</label>

                <input type="date" class="form-control py-2 px-3" name="datambarimit"
                    value="<?php if(!empty($projekti['datambarimit'])) echo $projekti['datambarimit'] ?>" />
            </div>
            <?php if(!empty($projekti['projektiid'])): ?>
            <button class="btn btn-primary w-100 py-2" name="update" type="submit">
                Update
            </button>
            <?php else: ?>
            <button class="btn btn-success w-100 py-2" name="shto" type="submit">
                Shto
            </button>
            <?php endif; ?>


        </form>


    </div>



    <?php include './inc/footer.php'; ?>

</body>

</html>