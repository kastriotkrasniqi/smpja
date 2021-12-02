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

<body>

    <?php include './inc/header.php'; ?>
    <!-- ========== Start Banner ========== -->
    <div class="banner d-flex align-items-center justify-content-center">
        <h1 class="text-light fw-bold">
            Sistemi per menaxhimin e projekteve - SMP
        </h1>
    </div>
    <!-- ========== End Banner ========== -->

    <!-- ========== Start Pershkrimi ========== -->
    <section class="pershkrimi">
        <div class="container">
            <h2 class="text-center mb-4">SMP Projekti Pershkrimi</h2>
            <p class="text-center text-muted">
                Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e
                punëve nga punëtorët e saj për projektet që ajo ka. Sistemi ofron
                menaxhimin e stafit: shtimin, modifikimin fshirjen, paraqitjen e
                stafit, menaxhimin e projekteve: shtimin, modifikimin fshirjen,
                paraqitjen e projekteve dhe menaxhimin e punëve ë bën stafi në kuadër
                të projekteve.
            </p>
        </div>
    </section>
    <!-- ========== End Pershkrimi ========== -->

    <!-- ========== Start wrapper ========== -->
    <div class="wrapper mb-4">
        <div class="container">
            <h2>Projektet</h2>
        </div>
    </div>
    <!-- ========== End wrapper ========== -->

    <!-- ========== Start Projektet ========== -->
    <section class="projektet">
        <div class="container d-flex justify-content-center gap-4 flex-wrap ">
            <?php
                    $projektet=merrProjektet();
                    $i=0;
                    while ($projekti =mysqli_fetch_assoc($projektet)) :
                        $projektiid=$projekti['projektiid'];
                        $emriProjekti=$projekti['emri'];
                        $pershkrimi=$projekti['pershkrimi'];
                        if(strlen($pershkrimi)>100){
                            $pershkrimi=substr($pershkrimi,0,100) . "...";
                        }
                        ?>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h6><?php echo $emriProjekti ?></h6>
                    </div>
                </div>
                <?php echo " <img src='./img/project{$i}.jpg' class='card-img d-block mx-auto' alt='projekt-1' />" ?>
                <div class="card-body">
                    <div class="card-text text-muted">
                        <p>
                            <?php echo $pershkrimi; ?>
                        </p>
                    </div>
                    <a href="" class="float-end">More >>></a>
                </div>
            </div>
            <?php $i++;
                        if($i==3) $i=0; ?>
            <?php endwhile; ?>

        </div>



    </section>
    <!-- ========== End Projektet ========== -->
    <!-- ========== Start wrapper ========== -->
    <div class="wrapper my-5">
        <div class="container">
            <h2>Details</h2>
        </div>
    </div>
    <hr />
    <!-- ========== End wrapper ========== -->

    <!-- ========== Start Antaret ========== -->
    <section class="antaret">
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
                <div class="border">
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

    <?php include './inc/footer.php'; ?>
</body>

</html>