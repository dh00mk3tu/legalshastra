<?php require("libs/fetch_data.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LegalShastra</title>
     <link rel = "icon" href = "assets/images/title-ico.png" type = "image/x-icon">
    <meta charset="utf-8" name="description" content="<?php getdescription("titles");?>">
	<meta name="keywords" content="<?php getkeywords("titles");?>" />
    
    
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="css/style.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
</head>
<body>
    
    <?php include("header.php");?>
    <?php include("banner.php");?>

    <section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<!--grid blogs below-->
				
					<div class="row" style="margin:0px;">
					    	<h2 style="font-weight:700">Editor's Choice</h2>
					    </div>
					<div class="blog-girds-sec">
					    
						<div class="row">
							<?php getHotTopics("blogs");?>
							<!--bloggrids-->
						</div>
					</div>
				</div>
				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
				    <div class="row" style="margin:0px;">
					    	<h2 style="font-weight:700">Categories</h2>
					    </div>
					<div class="right-blog-info text-left blog-girds-sec">
						<!--<h4><strong></strong></h4>Categories-->
						<ul class="list-group single" >
							<?php countcategories();?>
						</ul>
				
	</section>

    <!-- about section start -->
<section style="padding-bottom:30px;">
		<div class="container">
			<div class="row justify-content-center" style="padding:20px;">
				<h3 class="tittle">About Us</h3>
				
			</div>
			<div class="row">
				<div class="col-md-6" style="text-align: justify; text-justify: inter-word;">
					<p style="font-size:18px; line-height:20px;">We are an inter-university student run network which is providing a platform to the youth to voice their opinions through blogs and have discussions over important political topics with students and professionals.
                    </p>
					<div class="d-flex" style="margin-top:20px;">
						<div class="about-icon" style="text-align:center;">
							<i class="fa fa-book-open" style="font-size:30px; padding:15px 15px; color:#0533b5;"></i>
						</div>
						<div class="text-heading" style="margin-left:15px;">
							<h4 style="font-size:20px;  color: #283d50 ; font-weight: 700; line-height: 20px;">Vision</h4>
							<p style="line-height:20px; font-size:14px;">To establish a safe space for people who are passionate about reading, writing and discussing politics, law and international affairs. We also want motivate our youth to participate in such events to increase their knowledge, legal awareness and help others do the same.
</p>
						</div>
					</div>

					<div class="d-flex" style="margin-top:20px;">
						<div class="about-icon" style="text-align:center;">
							<i class="fa fa-pen-fancy" style="font-size:30px; padding:15px 17px; color:#0533b5;"></i>
						</div>
						<div class="text-heading" style="margin-left:15px;">
							<h4 style="font-size:20px;  color: #283d50 ; font-weight: 700; line-height: 20px;">Mission</h4>
							<p style="line-height:20px; font-size:14px;">To create a multi-cultural, community based, student centric, youth motivated education and discussion environment. We want the students and youth leaders to share their journey, opinions, impart knowledge and career guidance through networking.
</p>
						</div>
					</div>

					<div class="d-flex" style="margin-top:20px;">
						<div class="about-icon" style="text-align:center;">
							<i class="fa fa-hammer" style="font-size:30px; padding:15px 17px; color:#0533b5;"></i>
						</div>
						<div class="text-heading" style="margin-left:15px;">
							<h4 style="font-size:20px;  color: #283d50 ; font-weight: 700; line-height: 20px;">Values</h4>
							<p style="line-height:20px; font-size:14px;">We focus on being trustworthy, dependable and responsible towards our audiance by providing you with best and unbiased legal perspective.</p>
						</div>
					</div>
				</div>

				<div class="col-md-6" id="aboutImage">
					<img src="assets/images/about-vector.png" style="width:100%">
				</div>
			</div>
		</div>
</section>

					<!--//middle-->
					<!---->

<section id="teamMember">
    <div class="container text-center mt-5 mb-2">
    <h1 class="mb-0">Meet Our Team</h1><span>The strength of the team is each individual member. The strength of each member is the team.</span>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box teamCard"><img class="img-responsive rounded-circle" src="assets/teamImages/disha1.jpg" width="90">
                <h5 class="mt-3 name">Dishani Guha</h5><span class="work d-block">LLB 3 Year</span>
                <div class="mt-4 about"><span>"Here is my secret, a very simple secret, it is only with the heart that one can see rightly, what is essential is invisible to the eye."</span></div>
                <div class="mt-4">
                     <h6 class=""><a class="v-profile" href="https://www.linkedin.com/in/dishani-guha-a2a771145">View Profile</a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box teamCard"><img class="img-responsive rounded-circle" src="assets/teamImages/yash1.jpg" width="90">
                <h5 class="mt-3 name">Yashashvi Gahlot</h5><span class="work d-block">LLB 3 Year</span>
                <div class="mt-4 about"><span>"I recently learnt that my mind is a powerful thing. When I fill it with positive thoughts, my life started to change."</span></div>
                <div class="mt-4">
                    <h6 class=""><a class="v-profile" href="">View Profile</a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box teamCard"><img class="img-responsive rounded-circle" src="assets/teamImages/abeer.jpg" width="90">
                <h5 class="mt-3 name">Abeer Gobind Shandilya</h5><span class="work d-block">LLB 3 Year</span>
                <div class="mt-4 about"><span>"My pen is my significant friend and a foe because my words are celine and I only speak facts."</span></div>
                <div class="mt-4">
                    <h6 class=""><a class="v-profile" href="https://www.linkedin.com/in/abeer-gobind-shandilya-5449711b2">View Profile</a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box teamCard"><img class="img-responsive rounded-circle" src="assets/teamImages/eesha.jpg" width="90">
                <h5 class="mt-3 name">Eesha Sinha</h5><span class="work d-block">MSc in Development & International Relations</span>
                <div class="mt-4 about"><span>"I was afraid to start all over again but I started to like my new story better so take more risks"</span></div>
                <div class="mt-4">
                    <h6 class=""><a class="v-profile" href="https://www.linkedin.com/in/eesha-sinha">View Profile</a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

            <?php include("footer.php");?>
</body>
</html>