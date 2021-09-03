<?php
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include('database/db_connect.php');
    $sql = "select * from blogs where id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $catid = $row['category'];
            $date = $row['date'];
            $tags = $row['tags'];
            $content = $row['content'];
            $photo = $row['photo'];
            $status = $row['posted'];
            $video = $row['video'];
            $editor_choice = $row['editor_choice'];
            $author = $row['author'];
            $getcategory = "SELECT * FROM blog_categories where id = ?";
            $stmt = mysqli_prepare($con, $getcategory);
            if($stmt){
              mysqli_stmt_bind_param($stmt, "s", $catid);
              mysqli_stmt_execute($stmt);
              $catresult = mysqli_stmt_get_result($stmt);
              $getCat = mysqli_fetch_array($catresult);
                $category = $getCat['name'];
          
              
            }
            
                ?>
               
                <?php
          }
}else{
    ?>
    <script>
        window.location = "dashboard.php";
    </script>
    <?php
}
?>

           
<body>
<?php include('nav.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h3>Edit Blogs</h3>
            
                <div class="detail-add" style="background-color:#f5f5f5;">
                    <div class="page-heading">
                        Blog Details
                    </div>
                    <hr>
                </div>
                <div class="add-form" style="border:1px solid #f5f5f5">
                <form action="post.php" method="POST" style="padding:40px;" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                        <input type="hidden" class="form-control" id="blogid" name="blogid" value="<?php echo $id; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="category" name="category">
                            <option value="<?php echo $catid; ?>"><?php echo $category ?></option>
                            <?php
                            include('database/db_connect.php');
                        $sql = "SELECT * FROM blog_categories";
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                                $getid = $row['id'];
                                $categoryname = $row['name'];
                        ?>
                                <option value="<?php echo $getid ?>"><?php echo $categoryname ?></option>
                     <?php
                            }

                        ?>
                        </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $tags; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                        <textarea id="content" name="content"><?php echo $content; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="tags" name="author" value="<?php echo $author; ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Video Link</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $video ?>" id="video" name="video">
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Uploaded Date</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" value="<?php echo $date; ?>" disabled></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Is Editor Choice</label>
                        <div class="col-sm-10">
                            <?php if($editor_choice == 1){
                                    ?>
                                    <input type="checkbox" name="editor_choice[]" value="1" checked="true">
                                    <?php
                            }if($editor_choice == 0){
                                ?>
                                <input type="checkbox" name="editor_choice[]" value="1">
                                <?php
                            }
                       ?>
                        </div>
                    </div>
                    <div class="form-check">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                    <?php 
                            if($status == 'publish'){
                                ?>
                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft">
                        <label class="form-check-label" for="draft">
                            Draft
                        </label>
                      
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="publish" value="publish" checked="true">
                        <label class="form-check-label" for="publish">
                           Publish
                        </label>
                                    <?php
                    }else if($status == 'draft'){
                                ?>
                    <input class="form-check-input" type="radio" name="status" id="draft" value="draft" checked="true">
                        <label class="form-check-label" for="draft">
                            Draft
                        </label>
                      
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="publish" value="publish">
                        <label class="form-check-label" for="publish">
                           Publish
                        </label>
                                <?php } ?>
                    </div>
                    </div>

                    <div class="form-group row justify-content-center text-center">
                        <div>
                            <input type="submit" name="editBlock" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>
