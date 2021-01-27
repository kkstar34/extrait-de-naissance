<?php
require 'config/config.php';
 $numero = $_POST['delete'];
 
 $delete = $extrait = $db->query("DELETE  FROM naissances WHERE NUMERO=$numero");



 // check data deleted 
     $message = "naissance supprimée avec succès";


 //  Return response
 return response()->json([
     'success' => $success,
     'message' => $message,
 ]);

?>