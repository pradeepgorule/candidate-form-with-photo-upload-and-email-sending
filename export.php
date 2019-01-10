<?php
$connect = mysqli_connect("localhost", "dbadmin", "^b^@!!T117C%^$%%", "anx_db");
$sql = "SELECT * FROM anx_form order by id";
$result = mysqli_query($connect, $sql);
?>
<html>
 <head>
  <title>Export MySQL data to Excel in PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <br />
   <div class="table-responsive">
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br />
    <table class="table table-bordered">
     <tr>
                         <th>Name</th>
                         <th>job</th>
                         <th>mob</th>
       <th>email</th>
       <th>location</th>
        <th>experience</th>
       <th>Image</th>


                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
        echo '
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
     ?>
    </table>
    <br />

   </div>
  </div>
  
 </body>
</html>
