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

    form {
        height: fit-content;
    }
    </style>

</head>

<?php 
            
            
            if (isset($_GET['editpuna'])) {
                $punaid=$_GET['editpuna'];
                $pune=merrPuneId($punaid);
                if($pune){
                    $pune=mysqli_fetch_assoc($pune);
                    $punaid=$pune['punaid'];
                    $projektiid=$pune['projektiid'];
                    $projekti=$pune['emri'];
                    $data=$pune['data'];
                    $data=date("Y-m-d",strtotime($data));
                    $pershkrimi=$pune['pershkrimi'];
                }

            }

            if(isset($_POST['update'])){

                modifikoPune($_POST['punaid'],$_POST['projekti'], $_POST['data'], $_POST['pershkrimi']);

                header('location:punet.php');
            }
            if(isset($_POST['shto'])){

                shtoPune($_POST['projekti'], $_POST['data'], $_POST['pershkrimi']);

                header('location:punet.php');
            }

            if(isset($_GET['deletepuna'])){
                $punaid=$_GET['deletepuna'];
                fshijPune($punaid);

                header('location:punet.php');

            }
         

?>

<body>

    <?php include './inc/header.php'; ?>
    <!-- ========== Start Banner ========== -->

    <div class="container d-flex justify-content-center forma">


        <form action="" method="POST" class="bg-white w-75
          my-5 py-4 px-5 shadow">
            <?php if(!empty($projekti['projektiid'])): ?>

            <h3 class="text-center ">Edit</h3>

            <?php else: ?>
            <h3 class="text-center">Shto</h3>
            <p class="text-center mb-4">
                Shto Pune.
            </p>
            <hr>
            <?php endif; ?>



            <input type="hidden" name="punaid" value="<?php if(!empty($punaid)) echo $punaid ?>">
            <div class="mb-3 position-relative">

                <label for="emri">Emri i projekti: </label>
                <select class="form-select" name="projekti" id="projekti" name="emri">
                    <option value="<?php if(!empty($projektiid)) echo $projektiid; ?>">
                        <?php if(!empty($projekti)) echo $projekti; ?>
                    </option>
                    <?php
                        $projektet=merrProjektet();
                        while ($projekti =mysqli_fetch_assoc($projektet)) {
                            $projektid=$projekti['projektiid'];
                            $emriProjekti=$projekti['emri'];
                          
                                echo "<option value='{$projektiid}'>$emriProjekti</option>";
                      }
                    ?>
                </select>
            </div>
            <div class="mb-3 position-relative">
                <label for="data">Data e punes: </label>
                <input class="form-control" type="date" value="<?php if(!empty($data)) echo $data ?>" id="data"
                    name="data">
            </div>


            <div class="mb-3 position-relative">

                <label>Pershkrimi: </label>
                <input type="text" class="form-control" name="pershkrimi"
                    value="<?php if(!empty($pershkrimi)) echo $pershkrimi?>" id="pershkrimi">
                </input>
            </div>

            <?php if(!empty($punaid)): ?>
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