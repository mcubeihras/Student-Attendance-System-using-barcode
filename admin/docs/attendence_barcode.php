<head>
	<link rel="stylesheet" type="text/css" href="assets/css/barcode.css">
</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
  
    <!--Dashbord banner-->
    <main class="app-content">
	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon glyphicon glyphicon-barcode">
          	</i> Add Attendance</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Attendance</a></li>
          <li class="breadcrumb-item"><a href="#">Barcode</a></li>
        </ul>    
	</div>
   
<!------------------------------------------------------------------------------------------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 well table-one">
        	<table align="center" width="100%" border="0">
                    <tr align="center">
                	<td class="index_no">
                    	<p class="index_no"> Lecture : 
                            <select name="lecture" id="lecture" class="drop_down">
                                <?php 
                                $selectQueryL = "SELECT * FROM lecturer_table WHERE lc_status=1";
                                $runQueryL = $conn->query($selectQueryL);
                                while($rowL=mysqli_fetch_array($runQueryL)){
                                ?>
                                <option value="<?php echo $rowL['lc_code']; ?>"><?php echo $rowL['lc_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </p>
                    </td>
                </tr>
                <tr align="center">
                	<td class="index_no">
                    	<p class="index_no"> Subject :
                            <select name="subject" id="subject" class="drop_down">
                                <?php 
                                $selectQueryS = "SELECT * FROM subject_table WHERE sbstatus=1";
                                $runQueryS = $conn->query($selectQueryS);
                                while($rowS=mysqli_fetch_array($runQueryS)){
                                ?>
                                <option value="<?php echo $rowS['sbcode']; ?>"><?php echo $rowS['sbname']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </p><br>
                    </td>
                </tr>
                <tr align="center">
                	<td class="index_no">
                    	<p class="index_no">Depart :
                            <select name="department" id="department" class="drop_down">
                                <?php 
                                $selectQueryD = "SELECT * FROM department_table WHERE dstatus=1";
                                $runQueryD = $conn->query($selectQueryD);
                                while($rowD=mysqli_fetch_array($runQueryD)){
                                ?>
                                <option value="<?php echo $rowD['dcode']; ?>"><?php echo $rowD['dname']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </p><br>
                    </td>
                </tr>
				<tr align="center">
                	<td class="index_no">
                    	<p class="index_no"> Subject :
                            <select name="course" id="course" class="drop_down">
                                <?php 
                                $selectQueryC = "SELECT * FROM course_table WHERE cstatus=1";
                                $runQueryC = $conn->query($selectQueryC);
                                while($rowC=mysqli_fetch_array($runQueryC)){
                                ?>
                                <option value="<?php echo $rowC['cid']; ?>"><?php echo $rowC['cname']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </p><br>
                    </td>
                </tr>
            	<tr align="center">
                	<td class="index_no">
                    	<p class="index_no"> Index Number : 
                        <input class="barcode_input" id="barcode_input" type="text" placeholder="Barcode input here…">
                        </p>
                    </td>
                </tr>
          	</table>
        </div>
   	</div>
</div>

<script type="text/javascript">
jQuery( document ).ready(function() {    
    $('#barcode_input').on({
    keypress: function() { typed_into = true; },
    change: function() {
       if (typed_into) {
         //  alert('type');
         //  typed_into = false; //reset type listener
           var barcode = $.trim($( "#barcode_input" ).val());
  $.post( "inc/ajax_barcode.php",{ sid: barcode, sub: $("#subject").val(), lec: $("#lecture").val(), dep: $("#department").val(), cor: $("#course").val() }, function( data ) { //alert(data);
        var dataList = data.split("^"); 
        if($.trim(dataList[0])=="Y"){ 
            $(".student_details_name").html(dataList[4]);
            $(".student_details_id").html(dataList[1]);
            $(".student_details_lcode").html(dataList[3]);
            $(".student_details_scode").html(dataList[2]);
            $(".student_details_date").html(dataList[5]);
            $(".student_details_time").html(dataList[6]);
            $(".student_details_attnds").html(dataList[7]);
            $( "#barcode_input" ).val("");
            $( "#barcode_input" ).focus();
        }else{
            $(".student_details_name").html("No Data Found...!");
            $(".student_details_id").html("");
            $(".student_details_lcode").html("");
            $(".student_details_scode").html("");
            $(".student_details_date").html("");
            $(".student_details_time").html("");
            $(".student_details_attnds").html("");
            $( "#barcode_input" ).val("");
            $( "#barcode_input" ).focus();
        }
  });
       } else {
          // alert('not type');
       }
    }
});
// $( "#barcode_input" ).keypress(function() {
//   var barcode = $.trim($( "#barcode_input" ).val());
//   $.post( "inc/ajax_barcode.php",{ sid: barcode, sub:$("#subject").val(), lec:$("#lecture").val() }, function( data ) { //alert(data);
//         var dataList = data.split("^"); 
//         if($.trim(dataList[0])=="Y"){ 
//             $(".student_details_name").html(dataList[4]);
//             $(".student_details_id").html(dataList[1]);
//             $(".student_details_lcode").html(dataList[3]);
//             $(".student_details_scode").html(dataList[2]);
//             $(".student_details_date").html(dataList[5]);
//             $(".student_details_time").html(dataList[6]);
//             $(".student_details_attnds").html(dataList[7]);
//         }else{
//             $(".student_details_name").html("No Data Found...!");
//             $(".student_details_id").html("");
//             $(".student_details_lcode").html("");
//             $(".student_details_scode").html("");
//             $(".student_details_date").html("");
//             $(".student_details_time").html("");
//             $(".student_details_attnds").html("");
//         }
//   });
  
//});


});   
</script>    
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 well table-two">
        	<table align="center" width="100%" border="0">
            	<tr>
                    <td align="right" class="student_info" width="50%"><h4> Student Name : </h4></td>
                    <td class="student_details_name" width="50%">&nbsp; </td>
                </tr>
            	<tr>
                    <td align="right" class="student_info" width="50%"><h4> Student Index Number : </h4></td>
                    <td class="student_details_id" width="50%">&nbsp; </td>
                </tr>
                <tr>
                    <td align="right" class="student_info" width="50%"><h4> Lecture ID : </h4></td>
                    <td class="student_details_lcode" width="50%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="right" class="student_info" width="50%"><h4> Subject Code : </h4></td>
                    <td class="student_details_scode" width="50%">&nbsp; </td>
                </tr>
                <tr>
                    <td align="right" class="student_info" width="50%"><h4> Enter Date : </h4></td>
                    <td class="student_details_date" width="50%">&nbsp; </td>
                </tr>
                <tr>
                    <td align="right" class="student_info" width="50%"><h4> Enter Time : </h4></td>
                    <td class="student_details_time" width="50%">&nbsp; </td>
                </tr>
                <tr>
                    <td align="right" class="student_info" width="50%"><h4> Attendance Status : </h4></td>
                    <td class="student_details_attnds" width="50%">&nbsp; </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 well table-two">
        </div>
    </div>
</div>-->     	

<!------------------------------------------------------------------------------------------------------>

        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>