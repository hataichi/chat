<?php
session_start();
// Install the DB module using 'pear install DB'
//require_once 'DB.php';
//echo "ore";
try{
$db = new PDO( 'sqlite:./messages.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//echo "hoge";
$db->beginTransaction();


$sth = $db->prepare( 'INSERT INTO messages VALUES ( null, ?, ? )' );
//echo "hoge2";
//$_SESSION['user']="hogeta";
// $_POST['message'] = "hogeo";
//echo $_SESSION['user'];
//echo $_POST['message'];
//echo "hoge2.5";
$sth->execute(  array( $_SESSION['user'], $_POST['message'] ) );
//echo "hoge3";
$db->commit();
//echo "hoge4";
?>
<table>
<?php
$res = $db->query('SELECT * FROM messages' );
while( $row = $res->fetch() )
{
?>
<tr>
<td><?php echo($row[1]) ?></td>
<td><?php echo($row[2]) ?></td>
</tr>
<?php
}
}catch (PDOException $e){
	die($e);
}


?>
</table>
