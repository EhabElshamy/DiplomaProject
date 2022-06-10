<?php  
require "connect.php";
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM students";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ID</th>
                    <th>Name</th>
                    <th>Guardian</th>
                    <th>Guardian Phone</th>
                    <th>BirthDate</th>
                    <th>Address</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Passed</th>
                    <th>Notes</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
            <tr>  
                    <th>'.$row['id'].'</th>
                    <th>'.$row['name'].'</th>
                    <th>'.$row['guardian_name'].'</th>
                    <th>'.$row['guardian_phone'].'</th>
                    <th>'.$row['birthdate'].'</th>
                    <th>'.$row['address'].'</th>
                    <th>'.$row['stage'].'</th>
                    <th>'.$row['level'].'</th>
                    <th>'.$row['class'].'</th>
                    <th>'.$row['success'].'</th>
                    <th>'.$row['notes'].'</th>
            </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=students.xls');
  echo $output;
 }
}
?>