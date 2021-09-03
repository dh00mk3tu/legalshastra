<?php
function getbannertext($table,$position){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'Hello World!!';
		}
      	//if there are rows available display all the results
		foreach ($result as $titles => $bannertext) {
      	# code...
			if ($position==1) {
					# code...
				echo ''.$bannertext['bannertext1'].'';
			}
			elseif ($position==2) {
					# code...
				echo ''.$bannertext['bannertext2'].'';
			}
			elseif ($position==3) {
					# code...
				echo ''.$bannertext['bannertext3'].'';
			}
			elseif ($position==4) {
					# code...
				echo ''.$bannertext['bannertext4'].'';
			}
		}
	}

	mysqli_close($con);
}
function getjavascripts($table){
	require("database/db_connect.php");
		$sql="SELECT * FROM $table ";
		if ($result=mysqli_query($con,$sql))
		{
			  //count number of rows in query result
			$rowcount=mysqli_num_rows($result);
			  //if no rows returned show no script alert
			if ($rowcount==0) {
				  # code...
				echo 'No script';
			}
			  //if there are rows available display all the results
			foreach ($result as $jsscripts => $js) {
			  # code...
				echo ''.$js['javascript'].'';
			}
		}
	
		mysqli_close($con);
	}
function getcategoryblogs($table,$id){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table WHERE category='$id' ORDER BY id DESC LIMIT 10";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'No Blogs To Fetch';
		}
      	//if there are rows available display all the results
		foreach ($result as $categories => $cdata) {
      	# code...
			echo '<div class="col-md-6 card">
							<a href="single.php?id='.$cdata['id'].'">
								<img src="admin/uploads/'.$cdata['photo'].'" class="card-img-top img-fluid" alt="fantastic cms" style="width:480px;height:300px">
							</a>
							<div class="card-body">
								<ul class="blog-icons my-4">
									<li>
										<a href="#">
											<i class="far fa-calendar-alt"></i> '.$cdata['date'].'</a>
									</li>
								
									<li>
										<a href="#">
											<i class="fas fa-tags"></i> '.$cdata['tags'].'</a>
									</li>

								</ul>
								<h5 class="card-title ">
									<a href="single.php?id='.$cdata['id'].'">'.$cdata['title'].'</a>
								</h5>
								<a href="single.php?id='.$cdata['id'].'" class="btn btn-primary read-m">Read More</a>
							</div>
						</div>';
		}
	}

	mysqli_close($con);
}
function getsharingscript($table){
	require("database/db_connect.php");
		$sql="SELECT * FROM $table ";
		if ($result=mysqli_query($con,$sql))
		{
			  //count number of rows in query result
			$rowcount=mysqli_num_rows($result);
			  //if no rows returned show no script alert
			if ($rowcount==0) {
				  # code...
				echo 'No script';
			}
			
			  //if there are rows available display all the results
			foreach ($result as $sharingscript => $sharing) {

				
				echo ''.$sharing['sharing_script'].'';
			}
		}
	
		mysqli_close($con);
	}

function getpopularposts($table){
	require("database/db_connect.php");
	#get most viewed 3 pages from pagehits
	$one = 1;
	$sql = "SELECT * FROM blogs WHERE editor_choice = $one limit 3";
    if ($result=mysqli_query($con,$sql)){
		foreach ($result as $bloggrid => $griditem) {
		    	echo '<div class="blog-grids row mb-3">
							<div class="col-md-5 blog-grid-left">
								<a href="single.php?id='.$griditem['id'].'">
									<img src="admin/uploads/'.$griditem['photo'].'" class="img-fluid footer-blog-image" alt="fantastic cms">
								</a>
							</div>
							<div class="col-md-7 blog-grid-right">

								<h5>
									<a href="single.php?id='.$griditem['id'].'" >'.$griditem['title'].' </a>
								</h5>
								<div class="sub-meta">
									<span>
										<i class="far fa-clock"></i> '.$griditem['date'].'</span>
								</div>
							</div>
							
						</div>';
				}
      
		
	}

	mysqli_close($con);

}
function getcontacts($table,$num){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'No Description!!';
		}
      	//if there are rows available display all the results
		foreach ($result as $titles => $contacts) {
      	# code...num
			if ($num==1) {
				# code...
				echo ''.$contacts['address'].'';
			}
			elseif ($num==2) {
				# code...
				echo ''.$contacts['email'].'';
			}
			elseif ($num==3) {
				# code...
				echo ''.$contacts['phone'].'';
			}
			elseif ($num==4) {
				# code...
				echo ''.$contacts['googlemap'].'';
			}
		
		}
	}

	mysqli_close($con);
}

function getHotTopics(){
	require("database/db_connect.php");
			$one = 1;
			$sql = "SELECT * FROM blogs WHERE editor_choice = $one limit 8";
			if ($result=mysqli_query($con,$sql)){
				foreach ($result as $bloggrid => $griditem) {
					echo '<div class="col-md-6 blog-grid-top">
					<div class="card b-grid-top">
					<div class="blog_info_left_grid">
					<a href="single.php?id='.$griditem['id'].'">
					<img src="admin/uploads/'.$griditem['photo'].'" class="img-fluid" alt="fantastic cms" style="width:300px;height:300px; border:none;">
					</a>
					</div>
					<h3>
					<a href="single.php?id='.$griditem['id'].'">'.$griditem['title'].'</a>
					</h3>
					</div>
					<ul class="blog-icons">
					<li>
					<a href="#">
					<i class="far fa-clock"></i>'.$griditem['date'].'</a>
					</li>
					
					
					<li>
					<a href="#">
					<i class="fas fa-tags"></i>'.$griditem['tags'].'</a>
					</li>

					</ul>
					</div>';
				}
			}

}
function countcategories(){
	require("database/db_connect.php");
	$sql="SELECT * FROM blog_categories LIMIT 10";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'No Categories!!';
		}
      	//if there are rows available display all the results
		foreach ($result as $categoriescount => $categorydata) {
				#count how many times each category appears in blogs
			$categoryid=$categorydata['id'];
			$sql="SELECT * FROM blogs WHERE category='$categoryid'";
			if ($result=mysqli_query($con,$sql)) {
					# code...
				$rowcountcategory=mysqli_num_rows($result);
				$getcatcount=$rowcountcategory;
			}
					# code...show data
			echo '<a class="category-links" href="category.php?id='.$categoryid.'" ><li class="list-group-item d-flex justify-content-between align-items-center">
			'.$categorydata['name'].'
			<span class="badge badge-success badge-pill">'.$rowcountcategory.'</span>
			</li></a>';
		}
	}

	mysqli_close($con);
}
function getolderposts($table){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table WHERE posted='publish' ORDER BY id ASC LIMIT 4";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no posts alert
		if ($rowcount==0) {
      		# code...
			echo 'No Posts To Fetch';
		}
      	//if there are rows available display all the results
		foreach ($result as $olderposts => $op) {
      	# code...
			echo '<div class="blog-grids row mb-3">
			<div class="col-md-5 blog-grid-left">
			<a href="single.php?id='.$op['id'].'">
			<img src="admin/uploads/'.$op['photo'].'" class="img-fluid" alt="fantastic cms">
			</a>
			</div>
			<div class="col-md-7 blog-grid-right">

			<h5>
			<a href="single.php?id='.$op['id'].'">'.$op['title'].'</a>
			</h5>
			<div class="sub-meta">
			<span>
			<i class="far fa-clock"></i> '.$op['date'].'</span>
			</div>
			</div>

			</div>';
		}
	}

	mysqli_close($con);
}
function getlinks($table,$platform){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo '#';
		}
      	//if there are rows available display all the results
		foreach ($result as $link => $site) {
      	# code...
			if ($platform=="facebook") {
					# code...
				echo ''.$site['facebook'].'';
			}
			elseif ($platform=="linkedin") {
					# code...
				echo ''.$site['linkedin'].'';
			}
		
			elseif ($platform=="instagram") {
					# code...
				echo ''.$site['instagram'].'';
			}

		}
	}

	mysqli_close($con);
}

function getdescription($table){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	
		$rowcount=mysqli_num_rows($result);
      	
		if ($rowcount==0) {
      		
			echo 'No Description!!';
		}
      	//if there are rows available display all the results
		foreach ($result as $titles => $sdc) {
      	# code...
			echo ''.$sdc['short_description'].'';
		}
	}

	mysqli_close($con);
}
function getkeywords($table){
	require("database/db_connect.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'Nothing';
		}
      	//if there are rows available display all the results
		foreach ($result as $titles => $keywords) {
      	# code...
			echo ''.$keywords['keywords'].'';
		}
	}

	mysqli_close($con);
}
?>