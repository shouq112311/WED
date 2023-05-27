<?php
session_start();
    
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title> View HouseKeeper Profile</title>
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

<body>

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
  <!--------- Container -------->
  <a href="#" class="back">
    <image src="../image/back.png" class="back" alt="back" style="width:40px ; margin-left: 30px; margin-top: 30px;" onclick="history.go(-1);"></image>
  </a>

  <div class="container2" style=height:1000px;> 

      <div class=box style="	display: block; margin-left: -65px ;">
 

  <!--------- Card 1 -------->

        <div class="card" style="padding-top: 70px; text-align:left;"  >
          <h5>My Profile:</h5> 
          <div class="pra" style="  font-family: 'Courier New', monospace;">
        <br>
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
                  <img src="../image/userIcon.png "  id = "imagee" name="imagee"style="width:100px ; height: 100px; padding-left: 340px;">

<form enctype='multipart/form-data' id="sign-up-form-homeowner" class="parent" style="padding-left:100px ;" action="." method="post">
   
      
        <input type="text" id="firstName"  name="firstName" value="FirstName: <?php echo $row['firstName']; ?>" style="background-color:white;"readonly required />
        <input type="text" id="lastName"  name="lastName" value="LastName: <?php echo $row['lastName']; ?>" style="background-color:white;" readonly required/>
        <input type="text" id="id"  name="id" value="ID: <?php echo $row['ID']; ?>" style="background-color:white;" readonly required/>
        <input type="text" id="age"  name="age" value="Age: <?php echo $row['age']; ?>" style="background-color:white;" readonly required/>
        <input type="text" name="gender" id="gender"   name="gender" value="Gender: <?php echo $row['gender']; ?>"style="border-radius:30px ; background-color:#fbf6ff;" readonly required/>
        <input type="email" id="email"   name="email" value="Email: <?php echo $row['email']; ?>" style="background-color:white;" readonly required/>
       <!--<input type="password" id="password"  name="password" value="Password: Dana1234" style="background-color:white;" readonly required/>-->
        <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $row['phone']; ?>" style="background-color:white;" readonly required/>
        <input type="text" id="city"  name="city" value="City: <?php echo $row['city']; ?>" style="background-color:white;"  readonly required/> <br>
       <!-- <input type="file" id="image"  name="image"  value="choose profile " style="background-color:white;"  accept="image/*" disabled /> <br>-->
       


        <textarea name="Bio" id="bio" cols="25" rows="10" style="border-radius :30px; resize: none; width:560px ; height: 150px; background-color:white;" readonly>   <?php echo $row['bio']; ?> </textarea>
     
        <br> <br><br>
        <div style="text-align: center; display:flex;">
                    
            <div class="button"  onclick="unlock()" href="#" style="margin-left: 90px; color:rgb(104, 104, 104); " >save</div>
            <div class="button"  onclick="unlock()" href="hk-edit.php" style="color:rgb(104, 104, 104);  " >Edit</div>
            <div class="button"  onclick="unlock()" href="hk-delete" style="color:rgb(244, 50, 50); " >Delete Account!</div>

            
               
              
        </div>
       
        

           

  </form >

  

</div>
</div>







</div>
</div>




      <?php
}}}  ?>
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


   
