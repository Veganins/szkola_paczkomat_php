<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    
    echo "<form action='paczkomat_3.php?id=$id' method='POST'>"
    ?>
    
        <label>status przesyłki: </label><br>
        <input type="radio" name="s1" value="1">zatwierdzono<br>
        <input type="radio" name="s1" value="2">w drodze<br>
        <input type="radio" name="s1" value="3">dostarczono<br>
        <input type="radio" name="s1" value="4">odbebrano<br>
        
        <input type="submit" value="zartwierdz">
</form>
</body>
</html>