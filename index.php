<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD SYSTEM</title>
</head>
<body>  
<div class="row justify-content-center">
    
    <?php require 'process.php';?>
    
    
    <?php if(isset($_SESSION['message'])):?> <!--  -->
    <div class="alert alert-<?=$_SESSION['msg_type'];?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    <?php endif ?>

<div class="container">
    <?php
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli -> error);
    ?>
<div class ="row justify-conter-center">
    <table class="table">
        <thead> 
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
 
</div>

<?php
    while($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['location']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id'];?>"
                class="btn btn-info">Edit</a>
            <a href="process.php?delete=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
   
    
    <?php endwhile; ?>
    </table>  

<!-- form-->
    <form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="form-group">
        <label for="">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your name"class="form-control"> 
        </div>

        <div class="form-group">
        <label for="">Location:</label>
        <input type="text" name="location" value="<?php echo $location; ?>" placeholder="Enter your location" class="form-control"> 
        </div>

        <div class="form-group">
        <?php
            if($update == true):
        ?>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
         <?php else: ?>

        <button type="submit" name="save" class="btn btn-primary">Save</button>
         <?php endif; ?>
        </div>
    </form>
<!-- end of form -->
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>   
</body>
</html>