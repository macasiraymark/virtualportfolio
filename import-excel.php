<?php  
$connect = mysqli_connect("localhost", "root", "", "db_virtualportfolio");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[1]);
                $item4 = mysqli_real_escape_string($connect, $data[1]);
                $item5 = mysqli_real_escape_string($connect, $data[1]);
                $item6 = mysqli_real_escape_string($connect, $data[1]);
                $item7 = mysqli_real_escape_string($connect, $data[1]);
                $item8 = mysqli_real_escape_string($connect, $data[1]);
                $item9 = mysqli_real_escape_string($connect, $data[1]);
                $query = "INSERT into excel(firstname, middlename, lastname, contact, address, municipality, province, categoryid, subcategoryid) values('$item1','$item2', '$item3', '$item4', '$item5', '$item6', '$item7', '$item8', '$item9')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
 </body>  
</html>