<?php
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'connect.php';

$registerdata=json_decode(file_get_contents("php://input"));
if(sizeof($registerdata)!=0){
    $login=$registerdata->login;
    $password=$registerdata->haslo;
    $imie=$registerdata->imie;
    $nazwisko=$registerdata->nazwisko;
    $nr_telefonu=$registerdata->nr_telefonu;
    $email=$registerdata->email;
    $wynik=0;
    $czy_administrator=0;

    $param_password=password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO uzytkownicy(login, haslo, imie, nazwisko, nr_telefonu, email, wynik, czyadministrator) VALUES('$login', '$param_password', '$imie', '$nazwisko', '$nr_telefonu', '$email', '$wynik', '$czy_administrator')";
    if($result = mysqli_query($con,$sql))
    {
        echo json_encode($result);

    }else
    {
      http_response_code(404);
    } 
}
?>