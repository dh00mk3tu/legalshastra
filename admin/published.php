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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
   
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    

  <thead>
    <tr>
      <th class="th-sm">Title
      </th>
      <th class="th-sm">Category
      </th>
      <th class="th-sm">Tags
      </th>
      <th class="th-sm">Content
      </th>
      <th class="th-sm">Photo
      </th>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Video
      </th>
      <th class="th-sm">Status
      </th>
      <th class="th-sm">Edit
      </th>
      <th class="th-sm">Edit Blog</th>
      <th class="th-sm">Delete Blog</th>

    
    </tr>
  </thead>
  <tbody>
      <?php 
      include('database/db_connect.php');
      $sql = "SELECT * FROM blogs where posted = ?";
      $stmt = mysqli_prepare($con, $sql);
      if($stmt){
        $published ='publish';
        $result = mysqli_stmt_bind_param($stmt, "s", $published);
        $get = mysqli_stmt_execute($stmt);
        
        $getResult = mysqli_stmt_get_result($stmt);

      while($row =  mysqli_fetch_array($getResult)){
          $id = $row['id'];
          $title = $row['title'];
          $categoryId = $row['category'];
          $tags = $row['tags'];
          $content = $row['content'];
          $date = $row['date'];
          $status = $row['posted'];
          $getcategory = "SELECT * FROM blog_categories where id = ?";
          $stmt = mysqli_prepare($con, $getcategory);
          if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $categoryId);
            mysqli_stmt_execute($stmt);
        
            $catresult = mysqli_stmt_get_result($stmt);
            $getCat = mysqli_fetch_array($catresult);
                $category = $getCat['name'];
            // }
            
          }

?>

<tr>
      
      <td><?php echo $title; ?></td>
      <td><?php echo $category; ?></td>
      <td><?php echo $tags; ?></td>
      <td><?php echo $content; ?></td>
      <td><?php echo "none" ?></td>
      <td><?php echo $date; ?></td>
      <td><?php echo 'video'; ?></td>
      <td><?php echo $status; ?></td>
      <td><a class="btn btn-danger" onclick="getUpdate('<?php echo $id; ?>')">Make Draft</a></td>
      <td><a class="btn btn-danger" href="edit.php?id=<?php echo $id; ?>">Edit</a></td>
      <td><button class="btn btn-success" onclick="getDelete('<?php echo $id; ?>')">Delete</a></button></td>
      
    </tr>

<?php

      }
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
          data:{action:'delete',id:id, table:'blogs'},  
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

function getUpdate(id){
  if (confirm("Are you sure!")) {
    $.ajax({type: "POST",
         url: "post.php",  
          data:{update:'update',id:id, field:'posted', update_data:'draft'},  
          success:function(data){  
              location.reload();
                
          }  
    })
  } else {
    location.reload();
  }
   
  }
</script>
</html>