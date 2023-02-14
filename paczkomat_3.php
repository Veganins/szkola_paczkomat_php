
<?PHP
DEFINE('host','127.0.0.1');
DEFINE('user','root');
DEFINE('pass','');
$conn=mysqli_connect(host,user,pass);
if(mysqli_connect_errno($conn)){
    echo "błąd połączenia z serwerem baz danych!";
}else{
    $baza=mysqli_select_db($conn,'paczkomat');
    
	
	$id_paczkomat = $_GET['id'];
    if(isSet($_POST['s1'])){
    $element=$_POST['s1'];
	
    
	$kwerenda="UPDATE `paczkomat`.`paczka` SET `p_status` = $element WHERE (`paczka_id` = $id_paczkomat);";
    mysqli_query($conn,$kwerenda);
    
        echo"UPDATETING";
        
        header("refresh:2;url='paczkomat_2.php'");
    
    }else{
        echo"brak zaznaczonego elementu";
    }
    mysqli_close($conn);
}

?>
