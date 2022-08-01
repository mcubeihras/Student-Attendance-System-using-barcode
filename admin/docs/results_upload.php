<head>
  <title>Update Results Here</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

<?php
    require_once ('inc/header.php'); 
  ?>

<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "tan_ati_sars_db");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['result_file']['name'])
 {
  $filename = explode(".", $_FILES['result_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['result_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $result_id = mysqli_real_escape_string($connect, $data[0]);
    $c = mysqli_real_escape_string($connect, $data[1]);  
                $academic_id = mysqli_real_escape_string($connect, $data[2]);
    $attempt_id = mysqli_real_escape_string($connect, $data[3]);
    $sgpa = mysqli_real_escape_string($connect, $data[4]);
    $query = "
     UPDATE result_table 
     SET cid = '$cid', 
     academic_id = '$academic_id', 
     attempt_id = '$product_price', 
     sgpa = '$sgpa'
     WHERE result_id = '$product_id'
    ";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Result Updation Done</label>';
}

$query = "SELECT * FROM result_tables";
$result = mysqli_query($connect, $query);
?>

 
 <body>
  <br />
  <div class="container">
   <h2 align="center">Upload Examination Results Here.</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Examination Results</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Student Name</th>
      <th>Student Index No</th>
      <th>Subject Name</th>
      <th>Grade</th>
      <th>SGPA</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["st_name"].'</td>
       <td>'.$row["st_index_number"].'</td>
       <td>'.$row["sbcode"].'</td>
       <td>'.$row["grade"].'</td>
       <td>'.$row["sgpa"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>



        <?php
      require_once ('inc/footer.php');
    ?>
    
  </body>
</html>


