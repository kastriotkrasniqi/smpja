<?php 

   global $conn;

    session_start();
    function connection(){

    $conn=mysqli_connect('localhost','root','','smp');
    
    if(mysqli_connect_errno()) {
        die("Lidhja me databaze deshtoi: ".mysqli_connect_error());
    }

    return $conn;

}





function login($email,$password){
  $conn=connection();
    $sql="SELECT * FROM antaret";
    $sql.=" WHERE email='$email' AND fjalekalimi='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);        
        $_SESSION['antariid']=$row['antariid'];
        $_SESSION['emri']=$row['emri'];
        $_SESSION['mbiemri']=$row['mbiemri'];
        $_SESSION['roli']=$row['roli'];
        header("Location: index.php");
    }
}


    // ANTARET //

function shtoAntar($name,$lastname,$phone,$email,$password){
    $conn=connection();
    $sql ="INSERT INTO antaret(emri,mbiemri,telefoni,email,fjalekalimi) VALUES('$name','$lastname','$phone','$email','$password')";
    $result=mysqli_query($conn,$sql);
    return $result;
}


function merrAntaret(){
    $conn=connection();
    $sql="SELECT * FROM antaret";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function merrAntariid($id){
    $conn=connection();
    $sql="SELECT * FROM antaret where antariid='$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function modifikoAntaret($name,$lastname,$email,$telefoni,$fjalekalimi,$id){
    $conn=connection();
    $sql="UPDATE antaret SET emri='$name',mbiemri='$lastname',email='$email',telefoni='$telefoni',fjalekalimi='$fjalekalimi' where antariid='$id' ";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function fshiAntaret($id){
    $conn=connection();
    $sql="DELETE FROM antaret WHERE antariid='$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}

    // END - ANTARET //


    // START - PROJEKTET // 

    function merrProjektet(){
        $conn=connection();
        $sql ="SELECT * from projektet";
        $result=mysqli_query($conn,$sql);

        return $result;
    }


    function merrProjektiid($projektiid){
        $conn=connection();
        $sql="SELECT * FROM projektet where projektiid='$projektiid'";
        $result=mysqli_query($conn,$sql);
        return $result;
    }

   function modifikoProjektet($emri,$pershkrimi,$datafillimit,$datambarimit,$projektiid){
        $conn=connection();
        $sql="UPDATE projektet SET emri='$emri',pershkrimi='$pershkrimi',datafillimit='$datafillimit',datambarimit='$datambarimit' where projektiid='$projektiid'";
        $result=mysqli_query($conn,$sql);
        return $result;
    }
        
    function fshiProjekte($projektiid){
        $conn=connection();
        $sql="DELETE FROM projektet where projektiid='$projektiid'";
        $result=mysqli_query($conn,$sql);
        return $result;
    }

    function shtoProjektet($emri,$pershkrimi,$datafillimit,$datambarimit){
        $conn=connection();
        $sql="INSERT INTO projektet(emri,pershkrimi,datafillimit,datambarimit) VALUES('$emri','$pershkrimi','$datafillimit','$datambarimit')";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        return $result;
    }


    // END - PROJEKTET // 


    // start - punet //
    function merrPunet(){
        $conn=connection();
        $antariid=$_SESSION['antariid'];
        $sql="SELECT p.punaid, pr.emri,p.data,p.pershkrimi FROM projektet pr INNER JOIN punet p ON pr.projektiid=p.projektiid";
        if($_SESSION['roli']!=1){
            $sql.=" WHERE p.antariid=$antariid";
        }
         $result=mysqli_query($conn,$sql);
         return $result;
    }
    function merrPuneId($pid){
        $conn=connection();
        $sql="SELECT p.punaid,p.projektiid, pr.emri,p.data,p.pershkrimi FROM projektet pr INNER JOIN punet p ON pr.projektiid=p.projektiid WHERE p.punaid={$pid}";
         $result=mysqli_query($conn,$sql);
         return $result;
    }
    function fshijPune($pid){
        $conn=connection();
        $sql="DELETE FROM punet WHERE punaid=$pid";
        $pune=mysqli_query($conn,$sql);
        
        return $pune;
    }
    function shtoPune($projektiid, $data, $pershkrimi){
        $conn=connection();
        $antariid=$_SESSION['antariid'];
        $sql="INSERT INTO punet(antariid,projektiid, data, pershkrimi) VALUES('$antariid','$projektiid','$data','$pershkrimi') ";
        
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
      return  $result;
    }
    function modifikoPune($punaid,$projektiid, $data, $pershkrimi){
        $conn=connection();
        $sql="UPDATE punet SET projektiid='$projektiid',data='$data', pershkrimi='$pershkrimi' WHERE punaid=$punaid";
        $pune=mysqli_query($conn,$sql);
        
        return $pune;
    }

    // end - punet //

?>