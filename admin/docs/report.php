<!DOCTYPE html>
<html lang="en">
	


    <?php
   // session_start();
		require_once ('inc/header.php'); 
	?>
      
<!----------------------------------------------------------------------------------------------------->      

	<div id="report">
    	<table align="center">
        	<tr>
            	<th>Student Name</th>
            	<th>Student Index No</th>
            	<th>Lecture Name</th>
            	<th>Subject Name</th>
            	<th>Date</th>
            	<th>Time</th>
            	<th>Prsent/Abcent Status</th>
            </tr>
            <?php
            $selectQueryA = "SELECT * FROM attandance_table WHERE st_status=1";
            $runQueryA = $conn->query($selectQueryA);
            while($rowA=mysqli_fetch_assoc($runQueryA)){
            ?>
            <tr>
            	<td><?php echo $rowA['st_index_number']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

<!------------------------------------------------------------------------------------------------------>    
	
    <?php
		require_once ('inc/footer.php');
	?>

  </body>
</html>