<?php
    include('server.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Tasks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="particles.js"></script>
</head>
<body>
        
    <!-- THE SECTION -->
    <section>
        <header>
            <div class="header">Daily <br> Scheduler  <h4 id="time"></h4></div>
            
            <!-- THE FORM OF THE PAGE -->
            <form method="POST">
                <input type="text" placeholder="New task" name="task">
                <button type="submit" name="submit">Add Task</button>
            </form>

            <!-- DECLARING THE ERROR -->
            <?php
                if(isset($errors)){
            ?>
                <p class="error"><?php echo $errors; ?></p>

            <?php
                }
            ?>
        </header>

            <!-- THE SECTION OF THE DATE -->
            <div class="datetime">
                <p class="weekday"></p>,&nbsp;
                <p class="month"></p>
            </div>
        

        <!-- FETCHING THE DISPLAY FROM THE DATABASE -->
        <?php 
            while($row = mysqli_fetch_array($tasks)){
        ?>
           <div class="output draggable" draggable="true">

                <!-- THE SECTION THAT DISPLAYS THE OUTPUT -->
                <div class="display">
                    <?php echo $row['task']; ?>
                </div>
                
                <!-- THE SECTION OF THE DELETE -->
                <p class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </a>      
                </p>
            </div>
        <?php
        }
        ?>
    
    </section>
     <!-- particles.js container --> 
     <div id="particles-js"></div> 
    
    <script src="index.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script> 
</body>
</html>