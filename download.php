<?php  
//download.php  

   

$connect = mysqli_connect("localhost", "dbadmin", "^b^@!!T117C%^$%%", "anx_db");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM anx_form";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {

  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>
                         <th>job</th>
                         <th>mob</th>
       <th>email</th>
       <th>location</th>
        <th>experience</th>
       <th>Image</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["fname"].'</td>
                         <td>'.$row["job"].'</td>
                         <td>'.$row["mobile"].'</td>
             <td>'.$row["email"].'</td>
             <td>'.$row["location"].'</td>
             <td>'.$row["exp"].'</td>
             <td><img src="'.$row["image"].'" height="200" width="200"/></td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

?>
