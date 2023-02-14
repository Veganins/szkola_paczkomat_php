<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="paczkomat_1.php" method="POST">
        <label>Numer przesyłki: </label><input type="text" name="Pnumer"  ><br>
        <input type="submit" value="szukaj">
    </form>
    <?php
    if(isSet($_POST['Pnumer'])){
        $liczby=$_POST['Pnumer'];
        session_start();
        $_SESSION['numer_paczka']=$liczby;
        header("refresh:0;url='paczkomat_2.php'");
    }
    ?>
</body>
</html>