<head>
        <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/departments_data_table.css">
        <link rel="stylesheet" type="text/css" href="assets/css/button_all.css">
  	</head>

	<?php
		require_once ('inc/header.php'); 
	?>
    
        
    <!--Dashbord banner-->
    <main class="app-content">
      	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon glyphicon glyphicon-th-list">
          	</i> All Department List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Department</a></li>
          <li class="breadcrumb-"><a href="#">Department List</a></li>
        </ul>
        
      	</div>

        <?php
       $sucessMsg="";   
       $did = $_GET['did']; //delete id
 
        if(isset($did) && $did!="")
        {
            $deleteQuery = "UPDATE department_table SET dstatus='0' WHERE dcode='".$did."'";
            if($conn->query($deleteQuery))
                {
                    $sucessMsg = "Data Sucsessfully Deleted";
                }
            else
                {
                    $sucessMsg = "Delete Data Failed";
                }   
        }
    ?>

     
<!-------------------------------------------------------------------------------------------------------->

<!--Department Table-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 well">
            <div>
                <?php echo $sucessMsg; ?> 
            </div> 
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Department Code</th>
                <th>Department Description</th>
                <th class="btn_header">Edit / Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $selectQuery = "SELECT * FROM department_table WHERE dstatus=1";
            $runQuery = $conn->query($selectQuery);
            while($row=mysqli_fetch_array($runQuery))
        {
        ?>

            <tr>
                <td><?php echo $row['dcode']; ?></td>
                <td><?php echo $row['dname']; ?></td>
                <td><?php echo $row['ddescription']; ?></td>
                <td align="center"> 
                    
                    
                    <a class="btn_t" href="department_form.php?eid=<?php echo $row['dcode']; ?>">
                    <button class="e_or_d_1">Edit</button></a>
                    
                    <a class="btn_t" href="departments_data_table.php?did=<?php echo $row['dcode'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                    <button class="e_or_d_2">Delete</button></a>
                    

                </td>
            </tr>
            
            <?php
        }
            ?>
            
        </tbody>
    </table>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------------------->    
    
    <?php
		require_once ('inc/footer.php');
	?>

      
	<!-- Datatable jquery Link-->
    <script type="text/x-javascript" src="assets/data_table/datatables.min.js"></script>
	 
	 <!-- Datatable Function-->
	 <script>
		$(document).ready( function () {
    		$('#example').DataTable();
		} );
	 </script>
       
  </body>
</html>