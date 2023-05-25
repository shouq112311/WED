<?php session_start();?>
<!doctype html>
<html> 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>currentjob</title>
    <style> 
html, body{
    height:100%;
    width: 100%; 
    margin: 0; 
    display: table;
}
footer{display:table-row;}
</style>
</head>
<body>
      <!------------  check   ----------->
      <?php include("HK-header.php");?>
  
      <div class="container2"> 

    
      <p style="background-color: white; color:  rgb(87, 86, 86); font-weight:bolder; 
      font-size: 40px ; margin-left: 50px; font-family: 'Courier New', monospace; margin-top: -10px;">
       your Current jobs:    <br>

       <br>
       </p>
  
 


             
<?php

$servername= "localhost";
    $username= "root" ;
    $password= "";
    $dbname= "381project" ;
    $connection= mysqli_connect($servername,$username,$password,$dbname);
    $database= mysqli_select_db($connection, $dbname);
    if (!$connection)
        die("Connection failed: " . mysqli_connect_error());
    $session_email= $_SESSION['email'];
    $sql = "SELECT * FROM `offers`  INNER JOIN requests
ON requests.ID = offers.RequestID INNER JOIN HO
ON parent.email  = requests.HOEmail   where offers.HKEmail ='$session_email' and offers.offerstatus='accepted'";

    $userFound = mysqli_query($connection,$sql);
    if($userFound) {

    if (mysqli_num_rows($userFound) > 0) {

    while ($row = mysqli_fetch_assoc($userFound)) {
        if ($row['startDate'] >= date('Y-m-d')) {
            ?>
    <div style= float:left;
    class="cardOL">
    <image src="../image/userIcon.png" class="imagei" alt="userIcon"></image>
    <?php $id= $row['ID'];
                    $sql_user = "SELECT * FROM `table name`   where ID ='$id' ";

                    $userFound_job = mysqli_query($connection,$sql_user);
                    if($userFound_user) {

                        if (mysqli_num_rows($userFound_user) > 0) {
                                ?>



      <h5> <strong><?php echo mysqli_num_rows($userFound_user); ?></strong></h5>
      <p 
      <?php }}?>
          
      class="price">
      <strong> <?php echo $row['price'];?></strong> <i class="fa fa-money"  style="font-size:24px"></i> <small> per hr</small>
      </p>


        <div class="praOL" style="  font-family: 'Courier New', monospace;" >
          <br>
              <strong>Kind of job:</strong><?php echo $row['kOfjob'];?> <strong>Type of job:</strong><?php echo $row['tOFjob'];?>
              <br>
              <strong>Availability: </strong><?php echo $row['Availability'];?>
              <br>
                <strong>Duration: </strong><?php echo $row['Duration'];?> <br><br>
            </p>
            
              
                
            </p>
        </div>

    </div>
<?php }
}
}
} ?>


 </div>


</div>
<footer>
  <p>Copyright &copy; 2023 luxuryTime </p>
  <p><a href="mailto:luxurytimeInfo.sa@gmail.com" style="font-size:10px ; color:rgb(255, 255, 255); text-decoration:none;">Contact Us</a></p>

      <!------------  BACK TO TOP   ----------->
      <a href="#" class="to-top">
          <image src="../image/to top.png" class="ToTop" alt="toTop"></image>
        </a>
</footer>    
</body></html>
    






