<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;

    }
    
    h6:first-of-type{
    display: flex;
    justify-content: center;
    align-items: center;
    color: gray;
    padding: 0px 10px ;
    }
   
    .gray{
        
        filter: grayscale(100%);
        opacity: 0.25;
        
    }
    .container{
        margin-left: auto;
        margin-right: auto;
        width: 1000px;
        display: flex ;
        justify-content: center;
        align-items: center;
    }
    .dox-left{
        width: 50%;

    }
    .dox-right{
        width: 50%;

    }
    .dox-left-up p{
        display: flex ;
        align-items: center;
        justify-content: center;
    }
</style>
<body>
    <h1>Śledzenie drogi Przesyłki DHL</h1>
<?php
DEFINE('host','127.0.0.1');
DEFINE('user','root');
DEFINE('pass','');
$conn=mysqli_connect(host,user,pass);
if(mysqli_connect_errno($conn)){
    echo "błąd połączenia z serwerem baz danych!";
}else{
    $baza=mysqli_select_db($conn,'Paczkomat');
    session_start();
    $numerpaczki = $_SESSION["numer_paczka"];
    $kwerenda="SELECT paczka_id,paczka_numer,p_status FROM paczkomat.paczka where paczka_numer=$numerpaczki;";
    $wyniki=mysqli_query($conn, $kwerenda);
    $ile_wynikow=mysqli_num_rows($wyniki);
    
    while($wiersz=mysqli_fetch_row($wyniki)){
    $status=$wiersz[2];
    settype($status,"int");
    
    
        if($ile_wynikow==0){
            echo "<h1>paczka o takim numerze nie istnieje</h1>";
        }else{
            echo"<h6>Status przesyłki numer $numerpaczki</h6>";
            echo"<div class='container'>";
            echo" <div class='dox-left'>";
            echo"  <div class='dox-left-up'>";
            echo"    <p> Droga przesyłki</p>";
            echo"</div>";
                echo"<div class='dox-left-down'>'";
                switch ($status) {
                    case '1':
                        echo" <img src='pickup-r.svg' class='red'>";
                        echo" <img src='car-r.svg' class='gray'>";
                        echo" <img src='courier-r.svg' class='gray'>";
                        echo" <img src='delivery-r.svg' class='gray'>";
                        break;
                    case '2':
                        echo" <img src='pickup-r.svg' class='red'>";
                        echo" <img src='car-r.svg' class='red'>";
                        echo" <img src='courier-r.svg' class='gray'>";
                        echo" <img src='delivery-r.svg' class='gray'>";
                        break;
                    case '3':
                        echo" <img src='pickup-r.svg' class='red'>";
                        echo" <img src='car-r.svg' class='red'>";
                        echo" <img src='courier-r.svg' class='red'>";
                        echo" <img src='delivery-r.svg' class='gray'>";
                        break;
                    case '4':
                        echo" <img src='pickup-r.svg' class='red'>";
                        echo" <img src='car-r.svg' class='red'>";
                        echo" <img src='courier-r.svg' class='red'>";
                        echo" <img src='delivery-r.svg' class='red'>";
                        break;
                    
                }
            echo"    </div>";
            echo"</div>";
            echo" <div class='dox-right'>";
            
        


                echo"<h4>Aktualny status przesyłki </h4>";

                switch ($status) {
                    case '1':
                        echo'<h3>zatwierdzono</h3>';
                        break;
                    case '2':
                        echo'<h3>w drodze</h3>';
                        break;
                    case '3':
                        echo'<h3>dostarczono</h3>';
                        break;
                    case '4':
                        echo'<h3>odbebrano</h3>';
                        break;
                    
                }
                echo"<h5>Paczka jest transportowana oddzalami  DHL</h5>";
                echo"<a href='paczkomat_4.php?id=$wiersz[0]'>Aktalny status paczki </a>";

                echo"</div>";
        }
        echo '</div>';
    }
}
?>
</body>
</html>

