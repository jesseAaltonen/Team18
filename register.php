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

if(!empty($email) && !empty($password)){
    $sql="insert into user (email, password) values(?, ?)";
    //Valmistellaan sql-lause
    $stmt=mysqli_prepare($yhteys, $sql);
    //Sijoitetaan muuttujat oikeisiin paikkoihin
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    //Suoritetaan sql-lause
    mysqli_stmt_execute($stmt);
    }

    //Suljetaan tietokantayhteys
    mysqli_close($yhteys);
   
?>