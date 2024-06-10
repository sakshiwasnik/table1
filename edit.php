<?php
  include "./connection.php";

  if(isset($_GET['edit_id'])){

    $id = $_GET['edit_id'];
   $query = mysqli_query($conn, "select * from `employee` where id='$id'");
   $fetch = mysqli_fetch_assoc($query);

   $tec = $fetch['Technologies'];
   $technology = explode(",", $tec);

  
      if(isset($_POST['submit_f'])){


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $age = $_POST['age'];
    
        $city = $_POST['city'];
        
        //radio
        $gender = $_POST['gender'];
    
        // checkbox
        $checkbox = $_POST['option1'];
        $check = implode(',', $checkbox);  //implode is used to convert array into string and "," is used to separate the items which we have chosen from checkbox.
      

        $update = mysqli_query($conn, "update `employee` set `FirstName`='$fname', `Lastname`='$lname', `Email`='$email', `Mobile`='$mobile', `Age`='$age', `Gender`='$gender', `Technologies`='$check', `city`='$city' where id='$id'");


       if($update){
       
        echo "<script> alert('Your data is update sucessfully !'); window.location.href='./display_data.php'; </script>";
        }
        else{
          echo "<script> alert('Your data is NOT updated !'); </script>";
           
        }
      }
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <center>
    <h2>Enter Your Information</h2>


<form method="POST">   

  <div>
    <label for="fname"> First Name: </label><br>
    <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fetch['FirstName']; ?>" required><br>
  </div>

  <br>

  <div>
    <label for="lname"> Last Name: </label><br>
    <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $fetch['Lastname']; ?>" required><br>
  </div>

  <br>

  <div>
    <label for="email"> Email: </label><br>
    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $fetch['Email']; ?>" required><br>
  </div>

  <br>

  <div>
    <label for="mobile"> Mobile: </label><br>
    <input type="number" id="mobile" name="mobile" placeholder="Mobile No." value="<?php echo $fetch['Mobile']; ?>" required><br>
  </div>
  <br>

  <div>
    <label for="age"> Age: </label><br>
    <input type="number" id="mobile" name="age" placeholder="Age" value="<?php echo $fetch['Age']; ?>" required><br>
  </div>
  <br>


  <div>
    <label for="gender"> Gender: </label><br>
    <input type="radio" id="male" name="gender" value="male" <?php if('male' == $fetch['Gender'])  echo "checked"  ?>>
    <label for="male">Male</label><br>

    <input type="radio" id="female" name="gender" value="female" <?php if('female' == $fetch['Gender'])  echo "checked"  ?>>
    <label for="female">Female</label><br>

    <input type="radio" id="female" name="gender" value="Others" <?php if('Others' == $fetch['Gender']) echo "checked"  ?>>
    <label for="female">Others</label><br>
  </div>


  <br>

  

  <div>
    <label for="Technologies"> Technologies: </label><br> 

    <input type="checkbox" id="option1" name="option1[]" value="HTML" <?php if(in_array("HTML", $technology)){ echo "checked"; }  ?>>
    <label for="option1">HTML</label><br>

    <input type="checkbox" id="option2" name="option1[]" value="CSS" <?php if(in_array("CSS", $technology)){ echo "checked"; }  ?>>
    <label for="option2">CSS</label><br>

    <input type="checkbox" id="option3" name="option1[]" value="BOOTSTRAP" <?php if(in_array("BOOTSTRAP", $technology)){ echo "checked"; }  ?>>
    <label for="option3">BOOTSTRAP</label><br>

    <input type="checkbox" id="option4" name="option1[]" value="SQL" <?php if(in_array("SQL", $technology)){ echo "checked"; }  ?>>
    <label for="option4">SQL</label><br>

    <input type="checkbox" id="option5" name="option1[]" value="JAVA" <?php if(in_array("JAVA", $technology)){ echo "checked"; }  ?>>
    <label for="option5">JAVA</label><br>

    <input type="checkbox" id="option6" name="option1[]" value="PHP" <?php if(in_array("PHP", $technology)){ echo "checked"; }  ?>>
    <label for="option6">PHP</label><br>

    <input type="checkbox" id="option7" name="option1[]" value="Dot Net" <?php if(in_array("Dot Net", $technology)){ echo "checked"; }  ?>>
    <label for="option7">Dot Net</label><br>

    <input type="checkbox" id="option8" name="option1[]" value="C#" <?php if(in_array("C#", $technology)){ echo "checked"; }  ?>>
    <label for="option8">C#</label><br>

  </div> <br>



  <div>
  <label for="city">Choose a city:</label>
  <select id="city" name="city" required>
    <option style = "background-color: blue" value="">Select Your City</option>    
    <option value="Nagpur" <?php if('Nagpur' == $fetch['city'])  echo "selected"  ?>>Nagpur</option>
    <option value="Pune" <?php if('Pune' == $fetch['city'])  echo "selected"  ?>>Pune</option>
    <option value="Bangalore" <?php if('Bangalore' == $fetch['city'])  echo "selected"  ?>>Bangalore</option>
    <option value="Mumbai" <?php if('Mumbai' == $fetch['city'])  echo "selected"  ?>>Mumbai</option>
    <option value="Delhi" <?php if('Delhi' == $fetch['city'])  echo "selected"  ?>>Delhi</option>
    <option value="Hyderabad" <?php if('Hyderabad' == $fetch['city'])  echo "selected"  ?>>Hyderabad</option>
  </select>
  </div>

  <br>
  
  <button type="submit" name="submit_f">Submit</button>
 </form>

</center>

</head>
<body>
    
</body>
</html>