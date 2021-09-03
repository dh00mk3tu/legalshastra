<?php
function countrecords($table,$status){
    include("database/db_connect.php");
  
//   if ($currentuser=="admin") {
    # code...
    if ($status=="all") {
      # code...
       $sql="SELECT * FROM $table ORDER BY id";
    if ($result=mysqli_query($con,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
      printf("%d",$rowcount);
      // Free result set
      mysqli_free_result($result);
      }
    }
elseif ($status=="publish") {
  # code...
  $sql="SELECT * FROM $table WHERE posted='$status' ORDER BY id";
    if ($result=mysqli_query($con,$sql))
      {
      // Return the number of rows in result set
      $rowcounter=mysqli_num_rows($result);
      printf("%d",$rowcounter);
      // Free result set
      mysqli_free_result($result);
      }
}
elseif ($status=="draft") {
  # code...
  $sql="SELECT * FROM $table WHERE posted='$status' ORDER BY id";
    if ($result=mysqli_query($con,$sql))
      {
      // Return the number of rows in result set
      $rowcounter=mysqli_num_rows($result);
      printf("%d",$rowcounter);
      // Free result set
     mysqli_free_result($result);
      }
}

elseif ($status=="editor_choice") {
    # code...
    $sql="SELECT * FROM $table WHERE editor_choice=1 ORDER BY id";
      if ($result=mysqli_query($con,$sql))
        {
        // Return the number of rows in result set
        $rowcounter=mysqli_num_rows($result);
        printf("%d",$rowcounter);
        // Free result set
       mysqli_free_result($result);
        }
  }
    mysqli_close($con);
//   }


}
function admincounter($tablename)
{
  include("database/db_connect.php");
  # code...
  $sql="SELECT * FROM $tablename";
  if ($result=mysqli_query($con,$sql))
    {
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    printf("%d",$rowcount);
    // Free result set
    mysqli_free_result($result);
    }

  mysqli_close($con);
}


?>
