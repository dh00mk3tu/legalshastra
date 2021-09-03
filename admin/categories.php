<?php
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    
<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" ></script>

<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<style>
    table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}
</style>
<body>
<?php include('nav.php') ?>
    <div class="container">
        
    <div class="card" style="padding:2em; margin-top:5em; height:auto;">
    <div class="row" style="margin:1em 0;">
            <a class="btn btn-success" href="add_category.php">Add New</a>    
        </div>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">


  <thead>
    <tr>
     
      <th class="th-sm">Category
      </th>
     
      <th class="th-sm">Edit
      </th>

    <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include('database/db_connect.php');
      $sql = "SELECT * FROM blog_categories";
      $result = mysqli_query($con, $sql);
      while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $title = $row['name'];
      

?>

<tr>
      
      <td><?php echo $title; ?></td>
    
     
      <td><a class="btn btn-danger" href="edit_category.php?id=<?php echo $id; ?>">Edit</a></td>
      <td><button class="btn btn-success" onclick="getDelete('<?php echo $id; ?>')">Delete</a></button></td>
    </tr>

<?php

      }

      ?>
    
</tbody>
</table>
</div>
</div>
<?php include('footer.php') ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" ></script>

<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
function getDelete(id){
  if (confirm("Are you sure!")) {
    $.ajax({type: "POST",
         url: "post.php",  
          data:{action:'delete',id:id, table:'blog_categories'},  
          success:function(data){  
              location.reload();
                
          }  
    })
  } else {
    location.reload();
  }
   
  }
    $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
</html>