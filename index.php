<?php
include 'dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script>
        src = "https://code.jquery.com/jquery-3.6.0.min.js"
        integrity ="sha256-/xUj+30JU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function(){
          
            var count = 1;
            $("button").click(function(){
                count = count + 1;
                $(".todos").load("load-name.php",{
                    count : count
                });
            })
        })
        
    </script> -->
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
        <span id="time-span">
            <div id="time"></div>
        </span>
        <span><?php
        echo date("d/m/Y");
        ?></span>
        <span><?php
        echo date("l");
        ?></span>
    </div>
    <div class="sub-container">
        <div class="top">
            <button>Pending</button>
            <button>Completed</button>
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
       <button><img src="./outline_done_black_24dp.png" alt=""></button>
       <button><img src="./outline_clear_black_24dp.png" alt=""></button>
            </div></div>
               
        <?php }
            } else {
               echo "Empty";
            }
            ?>
       
        </div>
        </div>

   
        <div class="bottom">
            <form >
           <input type="text" name="newtask" required>
           <button type><img src="./outline_add_black_24dp.png" alt=""></button>
           </form>
        </div>
    </div>
    
  </div>
  </div>
  <script>
     $(function(){
         $('form').on('submit',function(e){
             e.preventDefault();
             let task = $(this).seralize();

             $.ajax({
                 type:'POST',
                 url:'/insert.php',
                 data:task
                
             })
         })
     }) 
  </script>
</body>
</html>