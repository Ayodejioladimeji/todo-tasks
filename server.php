<?php
    // CONNECTING TO THE DATABASE
    $db = mysqli_connect('localhost', 'root', '', 'todo');


    // DECLARING THE ERROR
    $errors = "";

    if(isset($_POST['submit'])){
        $task = $_POST['task'];
        if(empty($task)){
            $errors = "Fields cannot be empty";
        }
        else{
    
            // INSERTING DATA INSIDE THE DATABASE
            mysqli_query($db, "INSERT INTO tasks (task) VALUES('$task')");
            header("location:index.php");
        }
    }


    // DELETING DATA FROM THE DATABASE
    if(isset($_GET['del_task'])){
        $id = $_GET['del_task'];

        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header("location:index.php");
    }


    // FETCHING DATA FROM THE DATABASE
    $tasks = mysqli_query($db, "SELECT * FROM tasks");
    

?>
