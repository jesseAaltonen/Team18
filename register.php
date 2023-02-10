<?php
$email = isset($_post["email"]) ? $_POST["email"] : "";
$password = isset($_post["password"]) ? $_POST["password"] : "";
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "team18");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}

$last_id = mysqli_insert_id($yhteys);

    foreach ($email as $password ){
        $sql="insert into user(email, password) values(?, ?)";
        $stmt=mysqli_prepare($yhteys, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
        mysqli_stmt_execute($stmt);
    }

    header("Location:tallennahenkilo.php");
    exit;




    
    

    //Suljetaan tietokantayhteys
    mysqli_close($yhteys);
   
?>