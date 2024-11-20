<?php
require_once ('Session.php');
require_once ('Config.php');
?>  
<?php
if (isset($_POST['NoteAccountTong'])) {
    $Name = $_POST['NoteAccountTong'];
    $ID = $_GET['id'];
mysqli_query ($ConnectData, "UPDATE account_main SET note='$Name' WHERE id=$ID");
}

if (isset($_POST['NoteAccountAuthen'])) {
    $Name = $_POST['NoteAccountAuthen'];
    $ID = $_GET['id'];
mysqli_query ($ConnectData, "UPDATE account_sms SET note='$Name' WHERE id=$ID");
}

if (isset($_POST['NoteAccountTTT'])) {
    $Name = $_POST['NoteAccountTTT'];
    $ID = $_GET['id'];
mysqli_query ($ConnectData, "UPDATE account_ttt SET note='$Name' WHERE id=$ID");
}

if (isset($_POST['NoteAccountLoiPass'])) {
    $Name = $_POST['NoteAccountLoiPass'];
    $ID = $_GET['id'];
mysqli_query ($ConnectData, "UPDATE account_loi SET note='$Name' WHERE id=$ID");
}
if (isset($_GET['KeyProxy'])) {
    $Name = $_GET['Key'];
    $ID = '1';
mysqli_query ($ConnectData, "UPDATE Setting SET ProxyKey='$Name' WHERE id=$ID");
}
    
    ?>