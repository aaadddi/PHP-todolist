<?php
include 'dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   
    <script>
        $(document).ready(function(){
            $('#time').load("time.php");
            setInterval(function(){
                $('#time').load("time.php")
            },1000);
        });
        </script>
  
  
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-container">
    <div class="timesdisplay">
        <span id="time-span"><div id="time"></div></span>
        <span><?php echo date("d/m/Y");?></span>
        <span><?php echo date("l");?></span>
    </div>
    <div class="sub-container">
        <div class="top">
            <button onClick = "showPending()">Pending</button>
            <button onClick = "showCompleted()">Completed</button>
        </div>
        <div class="todos">    
            <div class="todo">
            <?php
            $res = mysqli_query($connect, 'SELECT *FROM todos WHERE completed = "0"');
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) { ?>
                <div class="taskabtn">
                <div class="task"><?php
                echo '<p>';
                echo $row['task'], '<br>';
                echo '</p>';
                
                ?>
                 </div>    
             <div class="taskbtns">
       <button onClick ="comTask(<?php echo $row['id'] ?>)"><img src="./outline_done_black_24dp.png" alt="" title="Mark"></button>
       <button onClick ="delTask(<?php echo $row['id'] ?>)"><img src="./outline_clear_black_24dp.png" alt="" title = "Delete from list"></button>
            </div></div>
               
        <?php }
            } else {
               echo "No pending task";
            }
            ?>
       
        </div>
        </div>

   
        <div class="bottom">
          
           <input type="text" name="newtask" id="newtask" >
           <button type = "" title="Add"  class="newtasksubmit" onClick="addTask()" ><img src="./outline_add_black_24dp.png" alt="" ></button>
          
        </div>
    </div>
    
  </div>
  </div>
  <script>
      function addTask(){
          var task = $("#newtask").val();
          if(task != ""){
            $(document).ready(function(){
        $(".todos").load("showPending.php",{
            newtask:task
        });
          
        }) 
        $("#newtask").val() = null;
          }
      }
		
  </script>
<script>
    function showPending(){
        $(document).ready(function(){
        $(".todos").load("showPending.php",{});
          
        }) 
    }
    function showCompleted(){
        $(document).ready(function(){
        $(".todos").load("showCompleted.php",{});
          
        }) 
    }
    function delTask(id){
       $(document).ready(function(){
        $(".todos").load("showPending.php",{
          delid:id
          });
          
        })
        
    
    }
    function comTask(id){
        $(document).ready(function(){
        $(".todos").load("showPending.php",{
          comid:id
          });
          
        })
    }
  </script>
</body>
</html>