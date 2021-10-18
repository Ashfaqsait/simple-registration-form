<?php
$insert = false;
if (isset($_POST['name'])) {
  $server="localhost";
  $username="root";
  $password="";

  $con = mysqli_connect($server,$username,$password);

  if(!$con){
		die("Connection To The Database Failed Due To ".mysqli_connect_error());
  }
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $Feedback = $_POST['Feedback'];
  $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
  VALUES ('$name', '$age', '$gender', '$email', '$phone', '$Feedback', current_timestamp());";
  //echo $sql; 
  if($con->query($sql) == true){
        $insert = true;
		//echo"succesfully incerted";
  }
  else{
		echo  "ERROR: $sql <br> $con->error"; 
  }
  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>"Welcome To Travel Form"</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@1,100&family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <img class="bg" src="bg.jpg" alt="ustrip" />
    <div class="container">
        <h1>WELCOME TO US TRIP FORM</h1>
        <p>Enter Your Details And Submit The Form To Conform Your Participation In The Trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name:" />
            <input type="text" name="age" id="age" placeholder="Enter Your Age:" />
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender:" />
            <input type="email" name="email" id="email" placeholder="Enter Your Mail:" />
            <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number:" />
            <textarea name="Feedback" id="Feedback" cols="30" rows="10" placeholder="Enter your FeedBack...."></textarea>
            <button class="btn">Submit</button>


        </form>
    </div>
    <script src="index.js"></script>
    <!--INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('1', 'testname', '20', 'male', 'this@this.com', '9999999999', 'this is good value',
        '2021-10-15 15:25:32.000000');-->
</body>
</html>