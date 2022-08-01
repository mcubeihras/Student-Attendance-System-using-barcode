<head>
	<link rel="stylesheet" type="text/css" href="assets/css/profile_page.css">
</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
  
    <!--Dashbord banner-->
    <main class="app-content">
        	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="fa fa-user-circle-o">
          	</i> User Profile</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Settings</a></li>
          <li class="breadcrumb-item"><a href="#">Profile</a></li>
        </ul>
        
      	</div>
        

<!------------------------------------------------------------------------------------------------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 well table-one">
        	<table align="center" width="100%" border="0">
            	<tr>
                	<td>
                    	<br>
                    	<center><img class="user-image" src="assets/img/user.png"></center><br>
                    	<h3 class="user_name"><b>Dilshan Maduranga</b></h3>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
	
    	<div class="col-md-7 well table-two">
            <table align="center" border="0" width="100%">
            	<tr>
                	<td class="u_email">
                    	<p><i class="glyphicon glyphicon-menu-right"></i> Email : Dilshanmaduranga@gmail.com</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> Phone : +94773644866 / +94710999972</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> From  : Matara Dickwella</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> School : MR/Minhath N.S</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> Age  : 21</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> Status : Single</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> About: </p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> Work At : Advanced Technical Institute Tangalle</p><br>
                        <p><i class="glyphicon glyphicon-menu-right"></i> Study At : Ruhunu Campus Matara</p><br>
                        
                        <a href="user_profile_edit.php"><button class="edit_btn" type="submit" value="submit">
            			<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit </button></a>
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