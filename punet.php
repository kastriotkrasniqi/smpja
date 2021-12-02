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
    .antaret {
        background-color: #f2f6ff;
    }
    </style>

</head>






<body>



    <!-- ========== Start HEADER ========== -->
    <?php include './inc/header.php'; ?>
    <!-- ========== End HEADER ========== -->

    <!-- ========== Start Banner ========== -->
    <div class="banner d-flex align-items-center justify-content-center">
        <h1 class="text-light fw-bold">
            Punet
        </h1>
    </div>
    <!-- ========== End Banner ========== -->



    <!-- ========== Start Antaret ========== -->
    <section class="antaret">
        <div class="container p-5 ">
            <div class="kard  border ">
                <div class="card-header d-flex justify-content-between ">
                    <h4>Punet</h4>
                    <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                    <a href="shto_modifikoPunet.php" class="btn btn-success ">Shto Pune</a>
                    <?php endif; endif; ?>

                </div>
                <div class="card-body">
                    <table class="table table-primary  table-striped my-4">
                        <tr>
                            <th>Projekti </th>
                            <th>Data punes</th>
                            <th>Pershkrimi</th>
                            <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                            <th>Edit</th>
                            <th>Delete</th>
                            <?php endif; endif; ?>
                        </tr>
                        <?php $result=merrPunet(); ?>
                        <?php while($row=mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['emri'] ?></td>
                            <td> <?php echo $row['data'] ?></td>
                            <td><?php echo $row['pershkrimi'] ?></td>
                            <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>

                            <td class="text-center"><a class="btn btn-primary "
                                    href="shto_modifikoPunet.php?editpuna=<?php echo $row['punaid'] ?>">Edit</a>
                            </td>
                            <td class="text-center"><a class="btn btn-danger   "
                                    href="shto_modifikoPunet.php?deletepuna=<?php echo $row['punaid']?>">Delete</a>
                            </td>
                            <?php endif; endif; ?>

                        </tr>
                        <?php endwhile; ?>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <!-- ========== End Antaret ========== -->
    <?php include './inc/footer.php'; ?>

</body>

</html>