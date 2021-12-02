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

</head>
<?php 

            
            ?>

<body>

    <!-- ========== Start header ========== -->
    <?php include './inc/header.php'; ?>
    <!-- ========== End header ========== -->
    <div class="banner d-flex align-items-center justify-content-center">
        <h1 class="text-light fw-bold">
            Antaret
        </h1>
    </div>
    <!-- ========== End Banner ========== -->

    <!-- ========== Start Antaret ========== -->
    <section class="antaret mt-4">
        <div class="container d-flex gap-5">
            <div class="left-side w-25">
                <section class="p-3">
                    <h6>SMP ka këto funksionalitete:</h6>
                    <ol class="text-secondary">
                        <li>Menaxhimin e anetareve(Shtimin| Fshirjen | Modifikimin)</li>
                        <li>Menaxhimin e projekteve(Shtimin| Fshirjen | Modifikimin)</li>
                        <li>Menaxhimin e puneve(Shtimin| Fshirjen | Modifikimin)</li>
                        <li>Hyrjen dhe Daljen nga sistemi</li>
                        <li>Menaxhime te tjera</li>
                    </ol>
                    <hr />
                    <h6>Trajnimi Web Development ofron:</h6>
                    <ul class="text-secondary">
                        <li>HTML & CSS</li>
                        <li>JavaScript & jQuery</li>
                        <li>PHP & MySQL</li>
                        <li>Kodimi i projektit real SMP</li>
                        <li>Kodimi i projektit real Rent a Car</li>
                        <li>Detajet e trajnimit - <a href="#">Probit Academy</a></li>
                    </ul>
                </section>
            </div>

            <div class="right-side w-75">
                <div class="border ">
                    <div class="card-header">
                        <h4>Antaret</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-primary  table-striped my-4">
                            <tr>
                                <th>Emri </th>
                                <th>Mbiemri</th>
                                <th>Telefoni</th>
                                <th>Email</th>
                                <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                                <th>Edit</th>
                                <th>Delete</th>
                                <?php endif; endif; ?>
                            </tr>
                            <?php $result=merrAntaret();
           while( $antari=mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $antari['emri']; ?></td>
                                <td><?php echo $antari['mbiemri'] ?></td>
                                <td><?php echo $antari['telefoni'] ?></td>
                                <td><?php echo $antari['email'] ?></td>
                                <?php if(isset($_SESSION['roli'])):
                    if($_SESSION['roli'] == 1):  ?>
                                <td class="text-center"><a class="btn btn-primary"
                                        href="modifikoantaret.php?aid=<?php echo $antari['antariid']; ?>">Edit</a></td>
                                <td class="text-center"><a class="btn btn-danger"
                                        href="modifikoantaret.php?deleteantaret=<?php echo $antari['antariid'];?>">Delete</a>
                                </td>
                                <?php endif; endif; ?>
                            </tr>
                            <?php endwhile; ?>

                        </table>
                    </div>
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