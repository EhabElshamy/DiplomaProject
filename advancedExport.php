<?php  
require "connect.php";
$table = $_GET['table'];
$name  = $_GET['name'];
$stage = $_GET['stage'];
$level = $_GET['level'];
$class = $_GET['class'];

// echo $table."\n\r";
// echo $name."\n";
// echo $stage."\n";
// echo $level."\n";
// echo $class."\n";
$output = '';
if(isset($_POST["export"]))
{
    $basic_query = "SELECT * FROM `$table`";
    $where = " WHERE";
    $and   = "`id` BETWEEN 0 AND 1000000";

    if(!empty ($name)){
        $and .=" AND `name` like '%$name%'";
    }
    if(!empty ($stage)){
        $and .=" AND `stage` = '$stage'";
    }
    if(!empty ($level)){
        $and .=" AND `level` = '$level'";
    }
    if(!empty ($class)){
        $and .=" AND `class` = '$class'";
    }
    $query = $basic_query . $where . $and ;
    $result=  mysqli_query($conn,$query);
     if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Notes</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
            <tr>  
            <th>'.$row['id'].'</th>
            <th>'.$row['name'].'</th>
            <th>'.$row['birthdate'].'</th>
            <th>'.$row['address'].'</th>
            <th>'.$row['stage'].'</th>
            <th>'.$row['level'].'</th>
            <th>'.$row['class'].'</th>
            <th>'.$row['notes'].'</th>
            </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xlsx');
  header('Content-Disposition: attachment; filename=search.xls');
  echo $output;
 }
}
?>