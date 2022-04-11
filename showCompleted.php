<?php
include "dbConnect.php";

if(isset($_POST['delid'])){
    $delid = $_POST['delid'];
    unset($_POST['delid']); 
    mysqli_query($connect,"DELETE FROM todos WHERE id = '$delid'");
}
if(isset($_POST['revid'])){
    $revid = $_POST['revid'];
    unset($_POST['delid']); 
    mysqli_query($connect,"UPDATE todos SET completed = 0 WHERE id = '$revid'");
}
        ?>
        
        
        <div class="todo">
        <?php
        $res = mysqli_query($connect, 'SELECT *FROM todos WHERE completed = "1"');
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="taskabtn" id="taskabtnc">
            <div class="task" id="taskc"><?php
            echo '<p>';
            echo $row['task'], '<br>';
            echo '</p>';
            
            ?>
             </div>    
         <div class="taskbtns" id="taskbtnsc">
   <button onClick ="revTask(<?php echo $row['id'] ?>)"><img src="./outline_reply_black_24dp.png" alt="" title="Mark pending"></button>
   <button onClick ="delTask(<?php echo $row['id'] ?>)"><img src="./outline_clear_black_24dp.png" alt="" title = "Delete from list"></button>
        </div></div>
           
    <?php }
        } else {
           echo "No completed task";
        }
        ?>



<script>
   


        function delTask(id){
       $(document).ready(function(){
        $(".todos").load("showCompleted.php",{
          delid:id
          });
          
        })
     
        
    
    }
    function revTask(id){
            $(document).ready(function(){
                $(".todos").load("showCompleted.php",{
          revid:id
          }); 
            })
        }
  </script>


