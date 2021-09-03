<?php require("libs/fetch_data.php");?>
<?php //code to get the item using its id
include("database/db_connect.php");//database config file
$id=$_REQUEST['id']; $query="SELECT * from blogs where id='".$id."'"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
//pageview count query
$page=$row['title'];
$count="SELECT * FROM page_hits WHERE page='".$page."'";
$feedback = mysqli_query($con, $count);
$roo=mysqli_fetch_assoc($feedback);?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>LegalShastra</title>
    <link rel = "icon" href = "assets/images/title-ico.png" type = "image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link id="browser_favicon" rel="shortcut icon" href="">
	<meta charset="utf-8" name="description" content="<?php getdescription("titles");?>">
	<meta name="keywords" content="<?php getkeywords("titles");?>" />

	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
	
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="css/single.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
	<link href="css/style.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
	
	<?php getjavascripts("links"); ?>
	
	<!--additional javascripts will be placed here-->
	
</head>

<body>
	<!--Header-->
	<?php include("header.php");?> 
	<!--//header-->
	<!--update database on page views-->
	
	<div class="banner-inner">
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Blog</li>
	</ol>

	<!--//banner-->
	<section class="banner-bottom">
		<!--/blog-->
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="#">
									<img id="blogImage" src="admin/uploads/<?php echo $row['photo']; ?>" class="img-fluid" alt="image not available">
								</a>
								
							</div>
							
							<div class="blog-info-middle">
							    
								<ul>
									<li>
										<a href="#">
											<i class="far fa-calendar-alt"></i><?php echo $row['date']; ?></a>
										</li>
									
											<li>
												<a href="#">
													<i class="far fa-tags"></i> <?php echo $row['tags']; ?></a>
												</li>
												<li>
													<a href="#">
														<i class="far fa-eye fa-x2"></i> <?php echo $roo['count']; ?></a>
													</li>

												</ul>
											</div>
										</div>
                                        <span class="text-muted"><i>By <?php echo $row['author']; ?></i></span>
										<h3>
											<a href=""><?php echo $row['title']; ?></a>
										</h3>
										<!--sharing script-->
									
									
										<?php getsharingscript("links"); ?>
										<?php echo $row['content']; ?>
										<?php 
										if($row['video'] != ''){
												?>
										<iframe width="100%" height="315" src="<?php echo $row['video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												<?php
										}
										?>
										
											<hr>
											<div id="display_comment"></div>
										<form method="POST" id="comment_form" >
											<div class="form-group">
												<input type="email" name="comment_email" id="comment_email" class="form-control" placeholder='Enter your email' />
												<input type="hidden" name="blog_id" value="<?php echo $row['id'] ?>">
											</div>
											<div class="form-group">
												<textarea name="comment_content" id ="comment_content" class="form-control" placeholder="Enter comment" rows="5"></textarea>

											</div>
											<div class="form-group">
												<input type="submit" name="comment" id = "submit" class="btn btn-info" value="Submit">
											</div>
											<span id="comment_message"></span>
										</form>
										
											

									</div>
									<!--comments script will go here-->
									
								</div>
								<script>
								$(document).ready(function(){
									
									$('#comment_form').on('submit', function(event){
										event.preventDefault();
										var form_data = $(this).serialize();
										
										$.ajax({type: "POST",
										url: "comment.php",  
										data: form_data,
										success:function(data){  
											console.log(data);
										if(data == '"success"'){
											

											$('#comment_form')[0].reset();
											
											$('#comment_message').html('<p class="text-success">Comment Added Successfully</p>');
											load_comment("<?php echo $row['id'] ?>");

										}else{
											$('#comment_form')[0].reset();
											
											$('#comment_message').html('<p class="text-danger">All fields are required</p>');
										}
                
          }  
    })
									
									})
								})
								load_comment("<?php echo $row['id'] ?>");
								function load_comment(id){
									console.log(id);
									$.ajax({
										url:'fetch_comment.php',
										method:'POST',
										data:{id:id},
										success:function(data){
											$('#display_comment').html(data);
										}

									})
								}
							</script>
								<!--//left-->
								<!--right-->
								<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
									<div class="right-blog-info text-left">
										<h4><strong>Categories</strong></h4>
										<ul class="list-group single">
											<?php countcategories();?>
										</ul>
										<div class="tech-btm widget_social">
											<h4>Stay Connected</h4>
											<ul>

												<!--<li>-->
												<!--	<a class="twitter" href="<?php getlinks("links","twitter");?>">-->
												<!--		<i class="fab fa-twitter"></i>-->
												<!--		<span class="count"></span> Twitter</a>-->
												<!--	</li>-->
													<li>
														<a class="facebook" href="<?php getlinks("links","facebook");?>">
															<i class="fab fa-facebook-f"></i>
															<span class="count"></span> Facebook</a>
														</li>
														<li>
															<a class="dribble" href="<?php getlinks("links","linkedin");?>">
																<i class="fab fa-linkedin"></i>

																<span class="count"></span> Linkedin</a>
															</li>
															<li>
																<a class="pin" href="<?php getlinks("links","instagram");?>">
																	<i class="fab fa-instagram"></i>
																	<span class="count"></span> Instagram</a>
																</li>

															</ul>
														</div>
														<div class="tech-btm">
															<h4>Older Posts</h4>
															<?php getolderposts("blogs");?>
															<!--olderpostsendhere-->
														</div>
													</div>
												</aside>
												<!--//right-->
											</div>
										</div>
									</section>
									<!--//main-->
									<!--footer-->
									<?php include("footer.php");?>
									<!---->
									<!-- js -->
									
							
									<!--// end-smoth-scrolling -->

									


							</body>
						
							</html>