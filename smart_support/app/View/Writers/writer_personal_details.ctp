<?php
header('Content-Type: application/json'); 
unset($WriterPersonalDetails['User']);
echo json_encode($WriterPersonalDetails, JSON_PRETTY_PRINT);

?>