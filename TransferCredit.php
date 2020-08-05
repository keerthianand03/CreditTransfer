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
				
		 if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'id14543754_root';
            $dbpass = '^4n77~d58>B}wM|n';
            $dbname = 'id14543754_internship';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            
            if(!$conn){
                die('Could not Connect: '.mysqli_error);
            }
            mysqli_select_db($conn,$dbname);
			
				$froma = ($_POST['froma']);
				$to = ($_POST['to']);
				$amt= ($_POST['amt']);
						
			$sql1 = "SELECT * FROM user Where Name = '$froma' ";
            $result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
			
			
			$sql2 = "SELECT * FROM user WHERE Name = '$to'" ;
            $result2 = mysqli_query($conn,$sql2); 
				$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
				
			if (!$result1 || !$result2) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }

			if(!$row1 || !$row2){
				echo "Enter proper data";
			}
			else{
				$xi = intval($row1["Credits"]);
				$yi = intval($row2["Credits"]);
				
				$x = $xi - $amt;
				$y = $yi + $amt;
			 
				 $sql3 = "UPDATE user SET Credits = $x WHERE Name = '$froma'";
				$result3 = mysqli_query($conn,$sql3);
			
		$sql4 = "UPDATE user SET Credits = $y WHERE Name = '$to'";
		$result4 = mysqli_query($conn,$sql4);

		echo " credits transfered successfully";
	}		
		 }
				
			 
	
	?>
	
	<p >
	<center>
                   <form method = "post" action = "<?php $_PHP_SELF ?>" autocomplete="off">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
		<td width = "100"><span style="color:darkolivegreen;font-weight:bold;font-size:19px;">From</td>
                        <td><input name = "froma" type = "text" id = "froma"></td>
		
                     </tr>
<tr>
		<td width = "100"><span style="color:darkolivegreen;font-weight:bold;font-size:19px;">To</td>
                        <td><input name = "to" type = "text" id = "to"></td>
		
                     </tr>
                     
					 <tr>
		<td width = "100"><span style="color:darkolivegreen;font-weight:bold;font-size:19px;">Credit</td>
                        <td><input name = "amt" type = "number" id = "amt"></td>
		
                     </tr>
					 
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                    <tr>
                        <td width = "100"> </td>
                        <td>
                           <input type="submit" name="update"  id = "update" value="Submit">
                        </td>
                     </tr>
                     
                  </table>
     </form>
            </center></p>
			<h3> 
<center><a href="ViewUsers.php"> View all Users>></center>
<center><a href="index.php">HOME</a></center>
</h3>
	

</body>
</html>
