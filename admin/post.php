<?php 
include('database/db_connect.php');

if(isset($_POST['editCategory'])){
    if(!empty($_POST['category_name'])){
        $id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $sql = "UPDATE blog_categories SET name = ? where id = ?";
        $stmt = mysqli_prepare($con, $sql);
          
        mysqli_stmt_bind_param($stmt, "ss", $category_name, $id);
            
        $insert = mysqli_stmt_execute($stmt);
        if($insert){
            echo '<script>alert("Upload Successfully")
            window.location = "edit_category.php?id='.$id.'";
            </script>';
        }else{
            echo '<script>alert("Upload Failed")
            window.location = "edit_category.php?id='.$id.'";
            
            </script>';
        }
    }
}
if(isset($_POST['addCategory'])){
    if(!empty($_POST['category_name'])){
        $category_name = $_POST['category_name'];
        $sql = "INSERT INTO blog_categories (name) VALUES (?)"; 
        $stmt = mysqli_prepare($con, $sql);
          
        mysqli_stmt_bind_param($stmt, "s", $category_name);
            
        $insert = mysqli_stmt_execute($stmt);
        if($insert){
            echo '<script>alert("Upload Successfully")
            window.location = "add_category.php";
            </script>';
        }else{
            echo '<script>alert("Upload Failed")
            window.location = "add_category.php";
            </script>';
        }
    }
}
if(isset($_POST['addBlock'])){
if(!empty($_FILES["photo"]["name"]) && !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['tags']) && !empty($_POST['content']) && !empty($_POST['status'])){
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $content = $_POST['content'];
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $video = mysqli_real_escape_string($con, $_POST['video']);
    if(isset($_POST['editor_choice'])){
        $editor_choice = 1;
    }else{
        $editor_choice = 0;
    }
    $posted = mysqli_real_escape_string($con, $_POST['status']);
    $targetDir = "uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
    $date = date("Y/m/d");

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
            $sql = "INSERT INTO blogs (title, category, tags, content, author, video, posted, editor_choice, photo, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
            $stmt = mysqli_prepare($con, $sql);
          
            mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $category, $tags, $content, $author, $video, $posted, $editor_choice, $fileName, $date);
            
            $insert = mysqli_stmt_execute($stmt);

            
            if($insert){
                echo '<script>alert("Upload Successfully")
                window.location = "blog_view.php";
                </script>';
                
            }else{
                echo '<script>alert("Upload Failed")
                window.location = "blog_view.php";
                </script>';
                
                
            } 
        }else{
            echo '<script>alert("Sorry, there was an error uploading your file")
            window.location = "blog_view.php";
            </script>';
            
            
        }
    }else{
        echo '<script>alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.")
        window.location = "blog_view.php";
        </script>';
        
        
    }
        }else{
            echo '<script>alert("Please Enter All details.")
            window.location = "blog_view.php";
            </script>';
            
        }
    }


if(isset($_POST['editBlock'])){
if(!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['tags']) && !empty($_POST['content']) && !empty($_POST['status'])){
    $id=$_POST['blogid'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $content = $_POST['content'];
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $video = mysqli_real_escape_string($con, $_POST['video']);
    if(isset($_POST['editor_choice'])){
        $editor_choice = 1;
    }else{
        $editor_choice = 0;
    }
    $posted = mysqli_real_escape_string($con, $_POST['status']);

            $sql = "UPDATE blogs SET title =?, category=?, tags=?, content=?, author=?, video=?, posted=?, editor_choice=? where id = ?";
            $stmt = mysqli_prepare($con, $sql);
          
            mysqli_stmt_bind_param($stmt, "sssssssss", $title, $category, $tags, $content, $author, $video, $posted, $editor_choice, $id);
            
            $insert = mysqli_stmt_execute($stmt);

            
            if($insert){
                echo '<script>alert("Upload Successfully")
                window.location = "edit.php?id='.$id.'";
                </script>';
                
            }else{
                echo '<script>alert("Upload Failed")
                window.location = "edit.php?id='.$id.'";
                </script>';

    }
        }else{
            echo '<script>alert("Please Enter All details.")
            window.location = "edit.php?id='.$id.'";
            </script>';
            
        }
    }

if(isset($_REQUEST['action'])){
        
        $id = $_POST['id'];
        $table_name = $_POST['table'];
        $sql = "DELETE FROM $table_name WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
          
        mysqli_stmt_bind_param($stmt, "s",$id);
            
        if(mysqli_stmt_execute($stmt)){
            echo "success";
        }else{
            echo "failure";
        }


    }

    
if(isset($_REQUEST['update'])){
        
    $id = $_POST['id'];
    $col_name = $_POST['field'];
    $data_to_update = $_POST['update_data'];
    $sql = "UPDATE blogs set $col_name = ? where id = ?";
    $stmt = mysqli_prepare($con, $sql);
      
    mysqli_stmt_bind_param($stmt, "ss", $data_to_update, $id);
        
    if(mysqli_stmt_execute($stmt)){
        echo "success";
    }else{
        echo "failure";
    }


}
?>
