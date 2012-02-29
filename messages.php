<?php
// Install the DB module using 'pear install DB'
//require_once 'DB.php';
header( 'Content-type: text/xml' );
$id = 0;
if ( array_key_exists( 'id', $_GET ) ) { $id = $_GET['id']; }

try{
   $db = new PDO( 'sqlite:./messages.db');
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   $res = $db->query('CREATE TABLE messages (
        message_id INTEGER PRIMARY KEY ,
        username text NOT NULL,
        message TEXT        
        );' );
   $res = $db->query('SELECT * FROM messages' );
?>
<messages>
<?php

echo var_dump($res);
   if($res){
      while( $row = $res->fetch() )
      {

?>
<message id="<?php echo($row[0]) ?>" user="<?php echo($row[1]) ?>">
<?php echo($row[2]) ?>
</message>
<?php
      }
   }

}catch (PDOException $e){
//	die($e->getMessage());
var_dump($e->getMessage());
}
?>
</messages>
