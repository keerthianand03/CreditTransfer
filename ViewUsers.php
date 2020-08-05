<html>
<head>
<style>
body  {
  background-image: url("images.jpg");
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: 1600px 1500px;
 background-blend-mode: overlay;
}
</style>
<style>
.banner{
width:800px;
height:200px;
margin:7px auto;
-webkit-border-shadow:0 1px 3px rgba(0,0,0,0.5);
-webkit-border-radius:25px;
padding-left:50px;
font-family:"Times New Roman";
letter-spacing:5px;
font-size:50px;
}
</style>
</head>
<body style="font-family:Comic Sans MS;font-size:160%;color:blue;">

<div class="banner"><center></br>Welcome to Credit Management</center></div>
    <?php
            $dbhost = 'localhost';
            $dbuser = 'id14543754_root';
            $dbpass = '^4n77~d58>B}wM|n';
            $dbname = 'id14543754_internship';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            
            if(!$conn){
                die('Could not Connect: '.mysqli_error);
            }
            mysqli_select_db($conn,$dbname);
            
            $sql = "SELECT * FROM user" ;
            $result = mysqli_query($conn,$sql);  
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            $number = mysqli_num_rows($result);
	?>
<table aligns="center" border="1px" style="width:1300px; line-height:40px;border-collapse: collapse; color: black">
			
<tr>				
<th><span style="color:purple;text-decoration:underline;font-size:20px;">NAME</th>
				
<th><span style="color:purple;text-decoration:underline;font-size:20px;">EMAIL</th>
				
<th><span style="color:purple;text-decoration:underline;font-size:20px;">CREDITS</th>
	
</tr>
<?php
	if($number > 0){
    // output data of each row
    while($row = mysqli_fetch_array($result)) {       
?>
					
<tr>
						
<td><center><span style="color:blue;font-weight:bold;font-size:19px;"><?php echo $row ['Name']?></center></td>
					
<td><center><span style="color:blue;font-weight:bold;font-size:19px;"><?php echo $row ['Email']?></center></td>
						
<td><center><span style="color:darkolivegreen;font-weight:bold;font-size:19px;"><?php echo $row ['Credits']?></center></td>
				
</tr>
				
<?php 
	}}
		$conn->close();
		
?>
		</center>
		</table>
		
		<h3> 
<center><a href="TransferCredit.php"> Transfer Credits</center>
<center><a href="index.php">HOME</a></center>
</h3>
</body>
</html>
