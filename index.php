<?php require "config.php";?>
<?
  if((isset($_POST['SUBMIT'])))
  {
    $Name=$_post['Name'];
    $Enrollment=$_post['Enrollment No.'];
    $Email=$_post['Email-Id'];
    $Mobile=$_post['Mobile No.'];
    $dob=$_post['Date-of-Birth'];
    $Pincode=$_post['Pincode'];

    $query = "INSERT INTO stu_record(Name,Enrollment,Email,Mobile,dob,Pincode) VALUES ('$Name','$Enrollment','$Email','$Mobile','$dob','$Pincode')";

    $fire = mysqli_query($con,$qyuery) or die("Error: Check the form again.".mysqli_error($con));

     if($fire) echo "Registered Succesfully";
  }
?>

<!--// DELETE DATA -->
<?php
   if(isset($_GET['del']))
   {
     $id = $_GET ['del'];
     $query =  "DELETE FROM stu_record WHERE id = $id";
     $fire = mysqli_query($con,$query) or die("ERROR: Something went Wrong.".mysqli_error($con));
     if($fire) echo "Data Deleted";
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Baba Ramdas Memorial Sr. Sec. School</title>
    <link rel="stylesheet" type="text/css" href="style.php">
    <link rel="icon" href="https://www.favicon.cc/logo3d/952268.png">
  </head>
  <body>
    <h1>Baba Ramdas Memorial Sr. Sec. School</h1>
    <h2>Tehsil Kharkhod,Sonipat</h2>
    <h2>Pai, Haryana</h2>
    <h3>131402</h3>
    <div class="info">
      <h2 class="info-head">Information Portal</h2>
      <img class="logo" src="http://www.brdmschool.in/images/logo.png" alt="logo-img">
      <form class="portal" action="<?php $SERVER['PHP_SELF']?>" method="post">
        <label for="Name">Name:</label>
        <input id="Name" type="text" name="Name:" required >
        <br>
        <br>
        <label for="Enrollment">Enrollment No.</label>
        <input type="text" id="Enrollment" name="Enrollment No." required>
        <br>
        <br>
        <label for="E-mail">Email-id:</label>
        <input id="E-mail" type="email" name="Email-id" required>
        <br>
        <br>
        <label for="Mobile">Mobile No.:</label>
        <input id="Mobile" type="tel" name="Mobile No.:" placeholder="9876543210" pattern="[0-9]{10}" required >
        <small>Note: Use only 10 digits</small>
        <br>
        <br>
        <label for="Date-of-Birth">Date-of-Birth:</label>
        <input id="Date-of-Birth" type="date" name="Date-of-Birth:" placeholder="dd-mm-yyyy" required>
        <br>
        <br>
        <label for="pincode">Pincode:</label>
        <input type="postal" name="Pincode" placeholder="800001" required>
        <small>Note: Also known as Zip code</small>
    </div>
    </form>
    <button type="button" class="btn" name="submit">SUBMIT</button>
    <div class="output-data">
      <h3 class="undrln">Students Data</h3>

      <table class="table output-table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Enrollment No.</th>
      </tr>
    </thead>
    <tbody>
      <?php

        $query = "SELECT * FROM stu_record";
        $fire = mysqli_query($con,$query) or die("ERROR: Something Unexpected Happen".mysqli_error($con));
        if(mysqli_num_rows($fire)>0)
        {

          while($user = mysqli_fetch_assoc($fire))
          { ?>
      <tr>
        <td><?php echo $user['Name']?></td>
        <td><?php echo $user['Enrollment']?></td>
        <td>
          <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $user['id']?>"
             class="btn btn-sm btn-danger">DELETE</a>
        </td>
        <td>
          <a href="update.php?upd=<?php echo $user['id']?>" class="btn btn-sm btn-warning">UPDATE</a>
        </td>
      </tr>
            <?php
          }
        }
      ?>
    </tbody>
  </table>

    </div>
    <p>© 2020 Baba Ramdas Memorial Sr. Sec. School</p>
  </body>
</html>
