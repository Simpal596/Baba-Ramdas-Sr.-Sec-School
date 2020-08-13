<?php require "config.php";?>
<?php
    if (isset($_GET['upd']))
    {
      $id = $_GET['upd'];
      $query = "SELECT * FROM stu_record WHERE id= $id";
      $fire = mysquli_query($con,$query) or die("ERROR: Can't fetch the Data".mysqli_error($con));
      $user = mysqli_fetch_assoc($fire);
    }

<?php
     if(isset($_POST['btnupdate']))
     {
       $Name=$_post['Name'];
       $Enrollment=$_post['Enrollment No.'];
       $Email=$_post['Email-Id'];
       $Mobile=$_post['Mobile No.'];
       $dob=$_post['Date-of-Birth'];
       $Pincode=$_post['Pincode'];

       $query = "UPDATE stu_record SET Name='$Name', Enrollment='$Enrollment', Email='$Email', Mobile='$Mobile',dob='$dob', Pincode='$Pincode' WHERE id=$id";
       $fire = mysqli_query($con,$query) or die ("ERROR: Can't Update the Data".mysqli_error($con));

       if($fire) header("Location:index.php");  
     }


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Baba Ramdas Memorial Sr. Sec. School</title>
    <link rel="stylesheet" type="text/css" href="style.php">
    <link rel="icon" href="C:\Users\Lenovo\Desktop\intern project\images\BRD school favicon.ico">
  </head>
  <body>
    <h1>Baba Ramdas Memorial Sr. Sec. School</h1>
    <h2>Tehsil Kharkhod,Sonipat</h2>
    <h2>Pai, Haryana</h2>
    <h3>131402</h3>
    <div class="info">
      <h2 class="info-head">Information Portal</h2>
      <img class="logo" src="C:\Users\Lenovo\Desktop\intern project\images\logo.png" alt="logo-img">
      <form class="portal" action="<?php $SERVER['PHP_SELF']?>" method="post">
        <label for="Name">Name:</label>
        <input value="<?php echo $user['Name']?>" id="Name" type="text" name="Name:" required>
        <br>
        <br>
        <label for="Enrollment">Enrollment No.</label>
        <input value="<?php echo $user['Enrollment']?>" type="text" id="Enrollment" name="Enrollment No." required>
        <br>
        <br>
        <label for="E-mail">Email-id:</label>
        <input value="<?php echo $user['Email']?>" id="E-mail" type="email" name="Email-id" required>
        <br>
        <br>
        <label for="Mobile">Mobile No.:</label>
        <input value="<?php echo $user['Mobile']?>" id="Mobile" type="tel" name="Mobile No.:" placeholder="9876543210" pattern="[0-9]{10}" required >
        <small>Note: Use only 10 digits example shown</small>
        <br>
        <br>
        <label for="Date-of-Birth">Date-of-Birth:</label>
        <input value="<?php echo $user['dob']?>" id="Date-of-Birth" type="date" name="Date-of-Birth:" placeholder="dd-mm-yyyy" required>
        <br>
        <br>
        <label for="pincode">Pincode:</label>
        <input value="<?php echo $user['Pincode']?>" type="postal" name="Pincode" placeholder="800001" required>
        <small>Note: Also known as Zip code</small>
    </div>
    </form>
    <button type="button" class="btn" name="btnupdate">UPDATE</button>

    <p>© 2020 Baba Ramdas Memorial Sr. Sec. School</p>
  </body>
</html>
