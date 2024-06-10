<?php
include "./connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>This is my entries</h1>
    <a href="./index.php">Add Data</a>
    <br><br>

    <table border="5">
        <tr>
            <th>Sr.No</th>  
            <th>ID</th>  
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Technologies</th>
            <th>City</th>
            <th>Edit / Delete</th>
        </tr>
       
        
        <?php

        $select = "SELECT * FROM `employee` ORDER BY `id` DESC";

        $data = mysqli_query($conn, $select);

        $i = 1; // for getting the serial number in the order i.e. 1 2 3 4 etc
        
        while($fetch = mysqli_fetch_assoc($data)){       

        ?>

        
        <tr>
            <td><?php echo $i; ?></td>            
            <td><?php echo $fetch['id']; ?></td>  
            <td><?php echo $fetch['FirstName']; ?></td>
            <td><?php echo $fetch['Lastname']; ?></td>
            <td><?php echo $fetch['Email']; ?></td>
            <td><?php echo $fetch['Mobile']; ?></td>
            <td><?php echo $fetch['Age']; ?></td>
            <td><?php echo $fetch['Gender']; ?></td>
            <td><?php echo $fetch['Technologies']; ?></td>
            <td><?php echo $fetch['city']; ?></td>

            <td><a href="./edit.php?edit_id=<?php echo $fetch['id']; ?>">Edit</a> / <a href="./delete.php?delete_id=<?php echo $fetch['id']; ?>">Delete</a></td>           
        </tr>

        <?php
        $i++;
         }
        ?>



    </table>

    </center>
</body>
</html>