<?php
include "dbConnect.php";
$count = $_POST['count'];
        $res = mysqli_query($connect,"SELECT *FROM todos LIMIT $count");
        if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                echo "<p>";
                echo $row['task'],"<br>";
                
                echo "</p>";
            }
        }
        else{
            echo "NO";
        }
        ?>



