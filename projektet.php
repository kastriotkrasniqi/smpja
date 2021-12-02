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
            Projektet
        </h1>
    </div>
    <!-- ========== End Banner ========== -->

    <!-- ========== Start Projektet ========== -->
    <section class="projektet">
        <div class="container d-flex justify-content-center gap-4 ">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h6>Dizajnimi Webit</h6>
                    </div>
                </div>
                <img src="./img/project0.jpg" class="card-img d-block mx-auto" alt="projekt-1" />
                <div class="card-body">
                    <div class="card-text text-muted">
                        <p>
                            Ky projekt do mundesoj kompanis Probit publikimin e
                            informatave per klientet me anene web faqes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h6>Aplikacion per shkollen Probit</h6>
                    </div>
                </div>
                <img src="./img/project1.jpg" class="card-img d-block mx-auto" alt="projekt-1" />
                <div class="card-body">
                    <div class="card-text text-muted">
                        <p>
                            Ky projekt do mundesoj shkolles Probit Academy menaxhimin e
                            studentave me ane te web app.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h6>Dizajnimi Webit</h6>
                    </div>
                </div>
                <img src="./img/project2.jpg" class="card-img d-block mx-auto" alt="projekt-1" />
                <div class="card-body">
                    <div class="card-text text-muted">
                        <p>
                            Ky projekt do mundesoj kompanis Probit publikimin e
                            informatave per klientet me anene web faqes.
                        </p>
                    </div>
                </div>
            </div>
            </ul>
        </div>
    </section>
    <!-- ========== End Projektet ========== -->

    <!-- ========== Start Antaret ========== -->
    <section class="antaret">
        <div class="container p-5 ">
            <div class="kard  border ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Projektet</h4>
                    <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                    <a href="shto_modifikoProjektet.php" class="btn btn-success float-end ">Shto Projekte</a>
                    <?php endif; endif; ?>

                </div>
                <div class="card-body">
                    <table class="table table-primary  table-striped my-4">
                        <tr>
                            <th>Emri </th>
                            <th>Pershkrimi</th>
                            <th>Data fillimit</th>
                            <th>Data mbarimit</th>
                            <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                            <th>Edit</th>
                            <th>Delete</th>
                            <?php endif; endif; ?>
                        </tr>
                        <?php $result=merrProjektet(); ?>
                        <?php while($row=mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['emri'] ?></td>
                            <td> <?php echo $row['pershkrimi'] ?></td>
                            <td><?php echo $row['datafillimit'] ?></td>
                            <td><?php echo $row['datambarimit'] ?></td>
                            <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                            <td class="text-center"><a class="btn btn-primary "
                                    href="shto_modifikoProjektet.php?projektiid=<?php echo $row['projektiid'] ?>">Edit</a>
                            </td>
                            <td class="text-center"><a class="btn btn-danger   "
                                    href="shto_modifikoProjektet.php?deleteprojekte=<?php echo $row['projektiid']?>">Delete</a>
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







    <!-- ========== Start footer ========== -->
    <?php include './inc/footer.php'; ?>
    <!-- ========== End footer ========== -->
</body>

</html>