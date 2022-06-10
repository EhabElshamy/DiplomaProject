<?php  
require "connect.php";
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM courses";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
            <tr>  
                    <th>'.$row['id'].'</th>
                    <th>'.$row['name'].'</th>
                    <th>'.$row['description'].'</th>
                    <th>'.$row['stage'].'</th>
                    <th>'.$row['level'].'</th>
                    <th>'.$row['class'].'</th>
            </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xlsx');
  header('Content-Disposition: attachment; filename=teachers.xls');
  echo $output;
 }
}
?>