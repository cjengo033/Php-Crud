<?php

session_start(); //PARA SA MESSAGE ITO
// DEFAULT VARIABLE 
$name = "";
$location = "";
$update = false;
$id = 0;

    $mysqli = mysqli_connect('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    //SAVE SCRIPT
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $mysqli->query("INSERT INTO data (name,location) VALUES ('$name', '$location')") or die($mysqli->error);

        $_SESSION['message'] = "Record has been saved";
        $_SESSION['msg_type'] = "Success";
        header("location: index.php");
       
    }

    // DELETE SCRIPT
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id = $id") or die ($mysqli->$error());

        $_SESSION['message'] = "Record has been deleted";
        $_SESSION['msg_type'] = "Danger";
        header("location: index.php");// PAG NATAPOS NA YUNG SCRIPT, PUPUNTA NA SA INDEX.PHP
    }
    // EDIT SCRIPT
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result =  $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
        if ($result->num_rows){
            $row = $result->fetch_array();
            $name = $row['name'];
            $location = $row['location'];
        }   
    }
    //UPDATE SCRIPT
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id =$id") or die($mysqli->error()); 
        
        $_SESSION['message']= "Record has been updated";
        $_SESSION['msg_type']= "Success";
        header("location: index.php"); // PAG NATAPOS NA YUNG SCRIPT, PUPUNTA NA SA INDEX.PHP
        

    }
?>