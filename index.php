<?php

include 'connection.php';

?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">


<head>
	<!-- Basic need -->
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<!--preloading-->

	<!--end of preloading-->
	<!--login form popup-->

	<!-- regex -->
	<!-- pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" -->
	<!-- pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" -->

	<!--end of login form popup-->
	<!--signup form popup-->
	<?php
	include 'loginform.php';
	?>
	
	<div class="login-wrapper" id="signup-content">
		<div class="login-content">
			<a href="#" class="close">x</a>
			<h3>sign up</h3>
			<form method="post" action="#">
				<div class="row">
					<label for="username-2">
						Username:
						<input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
					</label>
				</div>

				<div class="row">
					<label for="email-2">
						your email:
						<input type="password" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="password-2">
						Password:
						<input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="repassword-2">
						re-type Password:
						<input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
					</label>
				</div>
				<div class="row">
					<button type="submit">sign up</button>
				</div>
			</form>
		</div>
	</div>
	<!--end of signup form popup-->

	<!-- BEGIN | Header -->
	<?php

	include 'frontheader.php';

	?>
	<!-- END | Header -->

	<div class="slider movie-items">
		<div class="container">
			<div class="row">
				<div class="social-link">
					<p>Follow us: </p>
					<a href="#"><i class="ion-social-facebook"></i></a>
					<a href="#"><i class="ion-social-twitter"></i></a>
					<a href="#"><i class="ion-social-googleplus"></i></a>
					<a href="#"><i class="ion-social-youtube"></i></a>
				</div>
				<div class="slick-multiItemSlider">
					<?php
					$movies = "SELECT * FROM movies order by movieId DESC";
					$result = mysqli_query($connection, $movies);

					if (mysqli_num_rows($result) > 0) {
						while ($data = mysqli_fetch_assoc($result)) { ?>

							<div class="movie-item">
								<div class="mv-img">
									<a href="#"><img src="adminpanel/uploadedimgs/<?php echo $data['movieImage']; ?>" alt="" width="285" height="437"></a>
								</div>
								<div class="title-in">
									<div class="cate">
										<span class="blue"><a href="#"><?php echo $data['movieCat']; ?></a></span>
									</div>
									<h6><a href="moviesingle.php?movieid=<?php echo $data['movieId']; ?>"><?php echo $data['movieName']; ?></a></h6>

								</div>
							</div>
					<?php	}
					}

					?>


				</div>
			</div>
		</div>
	</div>
	<div class="movie-items">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-8">
					<div class="title-hd">
						<h2>in theater</h2>
						<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">
						<ul class="tab-links">
							<li class="active"><a href="#tab1">#Showing</a></li>
							<li><a href="#tab2"> #Coming soon</a></li>
							<li><a href="#tab3"> #Top rated </a></li>
							<li><a href="#tab4"> #Most reviewed</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
										<?php
										$upcoming = "SELECT * from nueplex.movies where movieStatus = 'Showing'";

										$upresult = mysqli_query($connection, $upcoming);

										while ($updata = mysqli_fetch_assoc($upresult)) { ?>
											<div class="slide-it">
												<div class="movie-item">
													<div class="mv-img">
														<img src="adminpanel/uploadedimgs/<?php echo $updata['movieImage']; ?>" alt="" width="185" height="284">
													</div>
													<div class="hvr-inner">
														<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
													</div>
													<div class="title-in">
														<h6><a href="#"><?php echo $updata['movieName']; ?></a></h6>
														<p><i class="ion-android-star"></i><span><?php echo $updata['movieRating']; ?></span> /10</p>
													</div>
												</div>
											</div>
										<?php	}


										?>


									</div>
								</div>
							</div>
							<div id="tab2" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<?php
										$upcoming = "SELECT * from nueplex.movies where movieStatus = 'Upcoming'";

										$upresult = mysqli_query($connection, $upcoming);

										while ($updata = mysqli_fetch_assoc($upresult)) { ?>
											<div class="slide-it">
												<div class="movie-item">
													<div class="mv-img">
														<img src="adminpanel/uploadedimgs/<?php echo $updata['movieImage']; ?>" alt="" width="185" height="284">
													</div>
													<div class="hvr-inner">
														<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
													</div>
													<div class="title-in">
														<h6><a href="#"><?php echo $updata['movieName']; ?></a></h6>
														<p><i class="ion-android-star"></i><span><?php echo $updata['movieRating']; ?></span> /10</p>
													</div>
												</div>
											</div>
										<?php	}


										?>


									</div>
								</div>
							</div>
							<div id="tab3" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab4" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="title-hd">
						<h2>on tv</h2>
						<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">
						<ul class="tab-links-2">
							<li><a href="#tab21">#Popular</a></li>
							<li class="active"><a href="#tab22"> #Coming soon</a></li>
							<li><a href="#tab23"> #Top rated </a></li>
							<li><a href="#tab24"> #Most reviewed</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab21" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab22" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab23" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab24" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The revenant</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">The walk</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Die hard</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="ads">
							<img src="images/uploads/ads1.png" alt="" width="336" height="296">
						</div>
						<!-- <div class="celebrities">
							<h4 class="sb-title">Spotlight Celebrities</h4>
							<div class="celeb-item">
								<a href="#"><img src="images/uploads/ava1.jpg" alt="" width="70" height="70"></a>
								<div class="celeb-author">
									<h6><a href="#">Samuel N. Jack</a></h6>
									<span>Actor</span>
								</div>
							</div>
							<div class="celeb-item">
								<a href="#"><img src="images/uploads/ava2.jpg" alt="" width="70" height="70"></a>
								<div class="celeb-author">
									<h6><a href="#">Benjamin Carroll</a></h6>
									<span>Actor</span>
								</div>
							</div>
							<div class="celeb-item">
								<a href="#"><img src="images/uploads/ava3.jpg" alt="" width="70" height="70"></a>
								<div class="celeb-author">
									<h6><a href="#">Beverly Griffin</a></h6>
									<span>Actor</span>
								</div>
							</div>
							<div class="celeb-item">
								<a href="#"><img src="images/uploads/ava4.jpg" alt="" width="70" height="70"></a>
								<div class="celeb-author">
									<h6><a href="#">Justin Weaver</a></h6>
									<span>Actor</span>
								</div>
							</div>
							<a href="#" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="trailers">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-12">
					<div class="title-hd">
						<h2>MOVIE TRAILERS</h2>
						<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="videos">
						<div class="slider-for-2 video-ft">
							<?php
							$trailer = "SELECT * from nueplex.movies";
							$trResult = mysqli_query($connection, $trailer);
							if (mysqli_num_rows($trResult) > 0) {
								while ($trailers = mysqli_fetch_assoc($trResult)) { ?>
									<div>
										<iframe class="item-video" src="#" data-src="<?php echo $trailers['movieTrailer']; ?>"></iframe>
									</div>
							<?php	}
							}
							?>
						</div>
						<div class="slider-nav-2 thumb-ft">
							<?php
							$trailer = "SELECT * from nueplex.movies";
							$trResult = mysqli_query($connection, $trailer);
							if (mysqli_num_rows($trResult) > 0) {
								while ($trailers = mysqli_fetch_assoc($trResult)) { ?>
									<div class="item">
										<div class="trailer-img">
											<img src="adminpanel/uploadedimgs/<?php echo $trailers['movieImage']; ?>" alt="photo by Barn Images" width="4096" height="2737">
										</div>
										<div class="trailer-infor">
											<h4 class="desc"><?php echo $trailers['movieName']; ?></h4>
										</div>
									</div>
							<?php	}
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- latest new v1 section-->
	<div class="latestnew">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-8">
					<div class="ads">
						<img src="images/uploads/ads2.png" alt="" width="728" height="106">
					</div>
					<div class="title-hd">
						<h2>Latest news</h2>
					</div>
					<div class="tabs">
						<ul class="tab-links-3">
							<li class="active"><a href="#tab31">#Movies </a></li>
							<li><a href="#tab32"> #TV Shows </a></li>
							<li><a href="#tab33"> # Celebs</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab31" class="tab active">
								<div class="row">
									<div class="blog-item-style-1">
										<img src="images/uploads/blog-it1.jpg" alt="" width="170" height="250">
										<div class="blog-it-infor">
											<h3><a href="#">Brie Larson to play first female white house candidate Victoria Woodull in Amazon film</a></h3>
											<span class="time">13 hours ago</span>
											<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
										</div>
									</div>
								</div>
							</div>
							<div id="tab32" class="tab">
								<div class="row">
									<div class="blog-item-style-1">
										<img src="images/uploads/blog-it2.jpg" alt="" width="170" height="250">
										<div class="blog-it-infor">
											<h3><a href="#">Tab 2</a></h3>
											<span class="time">13 hours ago</span>
											<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
										</div>
									</div>
								</div>
							</div>
							<div id="tab33" class="tab">
								<div class="row">
									<div class="blog-item-style-1">
										<img src="images/uploads/blog-it1.jpg" alt="" width="170" height="250">
										<div class="blog-it-infor">
											<h3><a href="#">Tab 3</a></h3>
											<span class="time">13 hours ago</span>
											<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="morenew">
						<div class="title-hd">
							<h3>More news on Blockbuster</h3>
							<a href="#" class="viewall">See all Movies news<i class="ion-ios-arrow-right"></i></a>
						</div>
						<div class="more-items">
							<div class="left">
								<div class="more-it">
									<h6><a href="#">Michael Shannon Frontrunner to play Cable in “Deadpool 2”</a></h6>
									<span class="time">13 hours ago</span>
								</div>
								<div class="more-it">
									<h6><a href="#">French cannibal horror “Raw” inspires L.A. theater to hand out “Barf Bags”</a></h6>

									<span class="time">13 hours ago</span>
								</div>
							</div>
							<div class="right">
								<div class="more-it">
									<h6><a href="#">Laura Dern in talks to join Justin Kelly’s biopic “JT Leroy”</a></h6>
									<span class="time">13 hours ago</span>
								</div>
								<div class="more-it">
									<h6><a href="#">China punishes more than 300 cinemas for box office cheating</a></h6>
									<span class="time">13 hours ago</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="sb-facebook sb-it">
							<h4 class="sb-title">Find us on Facebook</h4>
							<iframe src="#" data-src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftemplatespoint.net%2F%3Ffref%3Dts&tabs=timeline&width=300&height=315px&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="300" height="315" style="border:none;overflow:hidden"></iframe>
						</div>
						<div class="sb-twitter sb-it">
							<h4 class="sb-title">Tweet to us</h4>
							<div class="slick-tw">
								<div class="tweet item" id="">
									<!-- Put your twiter id here -->
								</div>
								<div class="tweet item" id="">
									<!-- Put your 2nd twiter account id here -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end of latest new v1 section-->
	<!-- footer section-->
	<footer class="ht-footer">
		<div class="container">
			<div class="flex-parent-ft">
				<div class="flex-child-ft item1">
					<a href="index-2.html"><img class="logo" src="images/logo1.png" alt=""></a>
					<p>5th Avenue st, manhattan<br>
						New York, NY 10001</p>
					<p>Call us: <a href="#">(+01) 202 342 6789</a></p>
				</div>
				<div class="flex-child-ft item2">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Blockbuster</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Forums</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Help Center</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item3">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item4">
					<h4>Account</h4>
					<ul>
						<li><a href="#">My Account</a></li>
						<li><a href="#">Watchlist</a></li>
						<li><a href="#">Collections</a></li>
						<li><a href="#">User Guide</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item5">
					<h4>Newsletter</h4>
					<p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
					<form action="#">
						<input type="text" placeholder="Enter your email...">
					</form>
					<a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="ft-copyright">
			<div class="ft-left">
				<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
			</div>
			<div class="backtotop">
				<p><a href="#" id="back-to-top">Back to top <i class="ion-ios-arrow-thin-up"></i></a></p>
			</div>
		</div>
	</footer>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>


</html>