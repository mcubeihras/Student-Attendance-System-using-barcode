<head>
	<link rel="stylesheet" type="text/css" href="assets/css/profile_edit.css">
</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
  
    <!--Dashbord banner-->
    <main class="app-content">
	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="glyphicon glyphicon-edit"></i>
          	</i> Edit User Profile</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Profile</a></li>
          <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>    
	</div>
       

<!----------------------------------------------------------------------------------------------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 well table-one">
        	<table align="center" width="100%" border="0">
            	<tr>
                	<td>
                    	<center><img class="user-image" src="assets/img/user.png"></center><br>
                        <input type="file">
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-7 well table-two">
            <table align="center" border="0" width="100%">
            	<tr>
                	<td align="center">
                    	<div>
                        	<p class="e_profile">User Name : <p>
                            <input type="text" name="u_name" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">Phone No : </p>
                        	<input type="text" name="u_phone_No" class="name">
                        <div><br>
                        
                        <div>
                        	<p class="e_profile">From : </p>
                        	<input type="text" name="u_from" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">School : </p>
                        	<input type="text" name="u_school" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">Age : </p>
                        	<input type="text" name="u_age" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">Status : </p>
                        	<input type="text" name="u_status" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">About: </p>
                        	<input type="text" name="u_about" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">Work At : </p>
                        	<input type="text" name="u_work_at" class="name">
                        </div><br>
                        
                        <div>
                        	<p class="e_profile">Study At : </p>
                        	<input type="text" name="u_study_at" class="name">
                        </div><br><br>
                        
                        <hr class="ruler">
                    </td>
                    </tr>
                    
                    <tr>
                    <td class="btn_set">    
                        <a href="#"><button class="save_btn" type="submit" value="submit">
            			<i class="glyphicon glyphicon-ok-sign"></i>&nbsp; Save </button></a>
                        &nbsp;
                        
                        <a href="#"><button class="cancel_btn" type="submit" value="submit">
            			<i class="glyphicon glyphicon-remove-sign"></i>&nbsp; Cancel </button></a>
                    </td>
                </tr>
            </table>
     	</div>
	</div>
</div>

<!---------------------------------------------------------------------------------------------------->


    
        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>