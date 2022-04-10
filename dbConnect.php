<?php
    try{
    $connect = mysqli_connect("localhost","root","","todolist");
 
    }
    catch(Exception $e){
        echo "failed";
    }

?>