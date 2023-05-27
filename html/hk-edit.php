<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: " . mysqli_connect_error());
$fname_err = $lname_err = $gender_err = $id_err = $age_err = $email_err = $city_err = $phone_err = $password_err =  $msg_err = $notification = "";
if(isset($_POST['submit'])){
//print_r($_POST);
$loggedInUser = $_SESSION['email'];
$firstname  =    $_POST['firstname'];

$lastname =    $_POST['lastname'];
$gender =    $_POST['gender'];
$id =    $_POST['id'];
$age =    $_POST['age'];
$eMail =    $_POST['eMail'];
$city =    $_POST['city'];
$phone =    $_POST['phone'];
$bio =    $_POST['biotextbox'];

$userPassword =mysqli_real_escape_string($connection,$_POST['password']);

$fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    if (isset($_POST["gender"]))
        $gender = $_POST["gender"];
    
    $id = $_POST["id"];
    $age = $_POST["age"];
    $email = $_POST["eMail"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $msg = $_POST["biotextbox"];
    $valid = true;
    if ($fname == "" || !ctype_alpha(str_replace(" ", "", $fname))) {
        $fname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($lname == "" || !ctype_alpha(str_replace(" ", "", $lname))) {
        $lname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($email == "" || !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_err = " please enter a valid email!";
        $valid = false;
    }

    if ($password!=""&&strlen($password) < 6) {
        $password_err = " password needs to be at least 6 characters!";
        $valid = false;
    }
    if ($city == "" || !ctype_alpha(str_replace(" ", "", $city))) {
        $city_err = " please enter a valid city!";
        $valid = false;
    }
    if(!preg_match("/[a-zA-Z]/i", $msg)){
        $msg_err = " please enter a valid bio (must contain letters)!";
        $valid = false;
    }
    if (!preg_match("/^05\d{8}$/", $phone)) {
        $phone_err = " please enter a valid phone number (must start with 05)!";
        $valid = false;
    }
    if($email!=$_SESSION['email']){
        $sql = "SELECT email FROM `HK` WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $nummy=mysqli_num_rows($result);
        
        if ($nummy > 0) {
            $email_err = " this email is already registered, please enter a different email!";
            $valid = false;
        }}
        
        if (!preg_match("/^\\d+$/", $id)) {
            $id_err = " please enter a valid id!";
            $valid = false;
        }
        if ($valid) {
            $_SESSION['email']=$eMail;
            $_SESSION['firstName']=$fname;
        if($_FILES['img']['name']!=""){
            //print_r($_FILES['img']);
            $userImage    =   $_FILES['img'];   
            $imageName = $userImage ['name'];
            $fileType  = $userImage['type'];
            $fileSize  = $userImage['size'];
            $fileTmpName = $userImage['tmp_name'];
            $fileError = $userImage['error'];
            
            $fileImageData = explode('/',$fileType);
            $fileExtension = $fileImageData[count($fileImageData)-1];
               //echo  $fileExtension;
    if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg'){
        //Process Image
        
        if($fileSize < 6161400){
            //var_dump(basename($imageName));
    
            $fileNewName = "../IMGE/userImages/".$imageName;
            
            $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
            
            if($uploaded){
                if(isset($_POST['password']) && $_POST['password']!= ""){
                    $userPassword =mysqli_real_escape_string($connection,$_POST['password']);
                    $sql = "UPDATE `HK` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
                    ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName',password ='$userPassword' WHERE email = '$loggedInUser'";
                    }else{
                        $sql = "UPDATE `HK` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
                        ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName' WHERE email = '$loggedInUser'";
                    }
                        //print($imageName);
                                    $results = mysqli_query($connection,$sql);
                                    echo '<script>alert("Your edits has been sent successfully!");window.location.href="babysittereditprofile.php";</script>';
                                exit;
                                }
                        
                        
                            }}}
                            if(isset($_POST['password']) && $_POST['password']!= ""){
                                 $sql = "UPDATE `HK` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
                                 ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio',password ='$userPassword' WHERE email = '$loggedInUser'";
                     
                                 }else{
                                     $sql = "UPDATE `HK` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
                                     ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio' WHERE email = '$loggedInUser'";
                                     
                                 }
                                 $results = mysqli_query($connection,$sql);
                                 echo '<script>alert("Your edits has been sent successfully!");window.location.href="babysittereditprofile.php";</script>';
                                 exit;
                     
                     }}
                     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete HouseKeeper account</title>
    <link rel = "stylesheet" href ="../css/home.css">
  
  <style>
    body{

background-color: rgb(255, 247, 237);
}

:root{
    --form-height:1000px;
    --form-width: 900px;
    
    --left-color:#FFB3B3;
    
    --right-color: #FFDBA4;
  }
  .input-ground{
    top: 180px;
    position: absolute;
    width: 280px;
    transition: .5s;
}

  body, html{
    width: 100%;
    height: 100%;
    margin: 0;
    font-family: 'Helvetica Neue', sans-serif;
    letter-spacing: 0.5px;
    
  }


  .container2{
    width: 1300px;
    height: var(--form-height);
    position: relative;
    margin: auto;
    box-shadow: 2px 10px 40px rgba(8, 8, 8, 0.4);
    border-radius: 10px;
    margin-top: 50px;
    margin-bottom: 50px;
    background-image: url(../images/background.JPG) ;
    background-position:center ;
    background-size: cover;
    background-image: linear-gradient(WHITE, #ffefe6);
    padding-top: 55px;
overflow: scroll;
 
  } 



  #sign-up-form-homeowner input {
    margin: 12px;
    font-size: 14px;
    padding: 15px;
    width: 260px;
    font-weight: 300;
    border: none;
    background-color: #e4e4e494;
    font-family: 'Helvetica Neue', sans-serif;
    letter-spacing: 1.5px;
    padding-left: 20px;
  }

  .header{

width:100%;
margin:auto;
padding:15px 0;
display:flex;
align-items:center;
justify-content:space-between;
background-image: linear-gradient(to bottom right,#95aac1, #4b6480);
}
.logo{
margin-left : 30px;
  width:130px;
  cursor:pointer;
  border-radius: 10px; 
  transition: 0.5s ease;
  cursor: pointer;
}
/*
.logo:hover{
  margin-left : 30px;
    width:100px;
    cursor:pointer;
    border-radius: 10px; 
    box-shadow: 2px 5px 12px rgba(60, 53, 53, 0.4);
    transform: scale(1.09);

  }*/

.header ul li{
list-style:none;
display:inline-block;
margin: 0 20px;
position: relative;

}
.header ul li a{
text-decoration: none;
color: white ;
font-family: 'Courier New', monospace;
font-weight: 800;
margin-left: -8px;

}
.header ul li ::after{
content: '';
height: 3px;
width: 0;
background: white;
position: absolute;
left: 0;
bottom: -10px;
transition:0.5s ;
}
.header ul li :hover::after{
width: 100%;
}
.image {
  margin-right : 30px;
  margin-left: 0px;
  width:80px;
  cursor:pointer;
  border-radius: 20px;
  transition: 0.5s ease;
  cursor: pointer;
}
.image:hover {
  margin-right : 30px;
  margin-left: 0px;
  width:80px;
  cursor:pointer;
  border-radius: 200px;
  box-shadow: 2px 5px 12px rgba(8, 8, 8, 0.4);
  transform: scale(1.09);
}


.card .button{
	background-color:#b3c9e1;
	color: rgb(104, 104, 104);
	text-decoration: none;
	border: 2px solid transparent;
	font-weight: bold;
	padding: 9px 22px;
	border-radius: 30px;
	transition: .4s; 
  margin-right: 3px;

}

.card .button:hover{
	background-color: transparent;
	border: 2px solid  rgb(104, 104, 104);
	cursor: pointer;
}

h5{
	color: rgb(76, 76, 76);
	font-size: 20px;
	margin-left: 70px;
  font-family: 'Courier New', monospace;
  margin-top: -30px;
  


}


  footer {
    text-align: center;
    padding: 0.05px;
    background-image: linear-gradient(to bottom right,#95aac1, #4b6480);

    color: white;
  } 

.backicon{
margin-left : 30px;
  width:40px;
  cursor:pointer;
  border-radius: 10px; 
  transition: 0.5s ease;
  cursor: pointer;
}


.ToTop{
margin-left : 0;
  width:30px;
  cursor:pointer;
  border-radius: 10px; 
  transition: 0.5s ease;
  cursor: pointer;
}


.card{ width:800px; height:75%; margin-left: 215px;
	padding: 20px 35px;
	background: linear-gradient(to bottom right,#95aac1, #4b6480);
	border-radius: 20px;
	position: relative;
	overflow: hidden;
	text-align: center;
  box-shadow: 2px 10px 40px rgba(8, 8, 8, 0.4);
  transition: 0.5s ease;
cursor: pointer;
margin-bottom: 40px;
}
.card:hover{
	background: linear-gradient(to bottom right,#95aac1, #4b6480);
	background: linear-gradient(to bottom right,#4b6480,#95aac1);
transform: scale(1.01);
}
input{
  background-color:white; 
  color: rgb(104, 104, 104);;
  text-decoration: none;
  border: 2px solid transparent;
  font-weight: bold; 
  border-radius: 30px;
margin-bottom: 5px;
}

.card {
	background-color:#ffe3e3;
	color: rgb(104, 104, 104);
  height: 850px;

}
.button{
	background-color:rgb(255, 247, 237);;
	color: rgb(104, 104, 104);;
    width:25%;
    margin:1px;
    border: 0;
  width: 80px;
  padding: 10px;

  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
           border-radius: 5px; 
  display: block;
  text-decoration: none;
   text-align: center;
  font-family:'Courier New', monospace;; 
  font-size: 1.2em;

}


/* DROPDOWN MENU TO USER ICON */

.dropdown {
  position: relative;
  display: inline-block;
  

}
.dropdown ul {
    margin-left: -140px;
  padding-right:40px;
  margin-top: -1px;
  padding-top: 10px;
  padding-bottom: 15px;
  margin-right: 5px;
    display: none;
  position: absolute;
  background-color: #383535;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;


}

.dropdown:hover ul {
  display: block;
}
.dropdown a{
    text-decoration: none;
color: rgb(0, 0, 0);
text-transform: uppercase;
font-family: 'Courier New', monospace;
padding-bottom: 10px;
}



/* DROPDOWN MENU TO USER ICON ENDs*/

h5{
	border-radius: 30px;
  padding: 9px 22px;
	background-color:white;
margin-left: -5px;
margin-top: -42px;
}

  </style>
</head>
    <!--------- Header -------->

    <div class="header" >
    <image src="../image/logooo.png" class="logo">
<ul>
    <li><a href="../html/HK-homepage.html">Home</a></li>
    <li><a href="mailto:luxurytimeInfo.sa@gmail.com">Contact Us</a></li>
    <li style="text-decoration:underline ;"><a href ="../html/HK-profile.html"> My Profile</a></li>
</ul>
<div class="dropdown">
    <image src="../image/userIcon.png" class="image">
    <ul>

        <li><a href="../html/login.html">Sign-Out</a></li>
    </ul>
    </div> 
  </div>
  <div class="container2" style=height:1000px;> 

  <p style="background-color: white; color:  rgb(87, 86, 86); font-weight:bolder; font-size: 40px ; margin-left: 50px; font-family: Courier New, monospace; margin-top: -10px;">
  Edit profile:    
     </p> 
     <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <?php
                
                        $currentUser = $_SESSION['email'];
                        //print($_SESSION['email']);
                        $sql = "SELECT * FROM `HK` WHERE email ='$currentUser'";

                        $gotResuslts = mysqli_query($connection,$sql);

                        if($gotResuslts){
                            if(mysqli_num_rows($gotResuslts)>0){
                                while($row = mysqli_fetch_array($gotResuslts)){
                                    //print_r("ygbyb8yn".$row['email']);
                                ?>
  <form enctype='multipart/form-data' id="sign-up-form-homeowner" class="parent" style="padding-left:100px ;" action="." method="post">
   
  <label for="firstname"></label><span style="color:red;"><?php echo $fname_err; ?>  </span>
   <input type="text" id="firstName"  name="firstName" value="FirstName: <?php echo $row['firstName']; ?>" style="background-color:white;"readonly required />
   <label for="lastname"></label><span style="color:red;"> <?php echo $lname_err; ?> </span>
   <input type="text" id="lastName"  name="lastName" value="LastName: <?php echo $row['lastName']; ?>" style="background-color:white;" readonly required/>
   <label for="id"></label><span style="color:red;"> <?php echo $id_err; ?> </span>
   <input type="text" id="id"  name="id" value="ID: <?php echo $row['ID']; ?>" style="background-color:white;" readonly required/>
   <label for="age"></label><span style="color:red;">  </span>
   <input type="text" id="age"  name="age" value="Age: <?php echo $row['age']; ?>" style="background-color:white;" readonly required/>
   <label>Gender:</label>
                <p class="more-space-on-bottom"></p>
                <input type="radio" name="gender" value="male"<?php if (isset($row['gender']) && strtolower($row['gender'])=="male") echo "checked";?>> Male
                <input type="radio" name="gender" value="female"<?php if (isset($row['gender']) && strtolower($row['gender'])=="female") echo "checked";?>> Female
                <p class="more-space-on-bottom"></p>
                <label for="eMail"></label><span style="color:red;"> <?php echo $email_err; ?> </span>
                <?php
if(isset($_GET['error'])){

if($_GET['error'] == 'emailDup'){
    ?>
    <span style="color:red;">
    
    the email you entered was already registered, please enter a different email!
</span>
    <!--<small class="in-log-in">Please Enter correct email and password</small>-->
    
<?php
}}

?>

   <input type="email" id="email"   name="email" value="Email: <?php echo $row['email']; ?>" style="background-color:white;" readonly required/>
   <label for="password"> password:</label><span style="color:red;"> <?php echo $password_err; ?> </span>

  <!--<input type="password" id="password"  name="password" value="Password: Dana1234" style="background-color:white;" readonly required/>-->
  <label for="phone"></label><span style="color:red;"> <?php echo $phone_err; ?> </span><!--<span id="redfff"style="color:red;"></span>-->
 <input type="text"onblur="myFunction()"id="phoneNumber" name="phoneNumber" value="<?php echo $row['phone']; ?>" style="background-color:white;" readonly required/>
 <script>
   var errordet=false;
function myFunction() {
    var phoneno =/^05\d{8}$/;
  if(!document.getElementById("phone").value.match(phoneno))

        {
            alert("gjnkfd");global errordet=true;
            var x = document.getElementById("redfff");
  x.innerHTML="invalid phone number";
        }else{
            global errordet=false;
            var x = document.getElementById("redfff");
  x.innerHTML="";

        }
  
}
fuction geterrdet(){
    c=global errordet;
    return c;
}
</script>

   <label for="city"></label><span style="color:red;"> <?php echo $city_err; ?> </span>
   <input type="text" id="city"  name="city" value="City: <?php echo $row['city']; ?>" style="background-color:white;"  readonly required/> <br>
  <!-- <input type="file" id="image"  name="image"  value="choose profile " style="background-color:white;"  accept="image/*" disabled /> <br>-->
  <label for="bio"></label><span style="color:red;"> <?php echo $msg_err; ?></span> </span>



   <textarea name="Bio" id="bio" cols="25" rows="10" style="border-radius :30px; resize: none; width:560px ; height: 150px; background-color:white;" readonly>   <?php echo $row['bio']; ?> </textarea>
   <input class="submit-btn" type="submit" name="submit" onclick="return geterrdet()" value="Update" />

   <br> <br><br></form>
</div>
    </div>
  <!--------- footer -------->

  <footer>
    <p>Copyright &copy; 2023 luxuryTime </p>
    <p><a href="mailto:luxurytimeInfo.sa@gmail.com" style="font-size:10px ; color:rgb(255, 255, 255); text-decoration:none;">Contact Us</a></p>
  
        <!------------  BACK TO TOP   ----------->
        <a href="#" class="to-top">
            <image src="../image/to top.png" class="ToTop" alt="toTop"></image>
          </a>
  </footer>     

</body>





</html>




