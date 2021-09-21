<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>PT. <?= $profile[0]['nama_pt']; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="/assets/img/a.png" rel="icon">
	<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
	<link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
	<!--   owl  -->
	<link rel="stylesheet" href="/assets/css/bs.css">
	<link rel="stylesheet" href="/assets/css/border.css">
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
	<!-- ======================================================= -->
	<style>
		.owl-prev {
			left: -30px;
		}

		.owl-next {
			right: -30px
		}

		.owl-prev,
		.owl-next {
			position: absolute;
			top: 30%;
		}

		.owl-prev span,
		.owl-next span {
			font-size: 60px;
			color: #787878;
		}

		.owl-theme .owl-nav [class*="owl-"]:hover {
			background-color: transparent;
		}
	</style>

	<!-- Template Main CSS File -->
	<link href="/assets/css/style.css" rel="stylesheet">

	<!--			flipster				-->
	<link rel="stylesheet" href="/assets/css/demo.css">
	<link rel="stylesheet" href="/assets/css/jquery.flipster.min.css">

	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/jquery.flipster.min.js"></script>


</head>

<body data-spy="scroll" data-target="#navbar-example">

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex">

			<div class="logo mr-auto">
				<h1 class="text-light"><a href="index.html"><span>PT.</span> <?= $profile[0]['nama_pt']; ?></a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class="active"><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#blog">News</a></li>
					<li><a href="/Login">Login</a></li>

				</ul>
			</nav><!-- .nav-menu -->

		</div>
	</header><!-- End Header -->


	<!--=================================================================================================================-->


	<!-- ======= Slider Section ======= -->
	<div id="home" class="slider-area">
		<div class="bend niceties preview-2">
			<div id="ensign-nivoslider" class="slides">
				<?php $no = 1; ?>
				<?php foreach ($home as $j) : ?>
					<img src="<?= base_url('uploads/home/thumb') . '/thumb_' . $j['foto']; ?>" alt="" title="#slider-direction-<?= $no++; ?>" />
				<?php endforeach; ?>
			</div>

			<?php $no = 1; ?>
			<?php foreach ($home as $j) : ?>
				<!-- direction 1 -->
				<div id="slider-direction-<?= $no++; ?>" class="slider-direction slider-one">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="slider-content">
									<!-- layer 1 -->
									<div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
										<h2 class="title1"><?= $j['jud']; ?></h2>
									</div>
									<!-- layer 2 -->
									<div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
										<h1 class="title2"><?= $j['des']; ?>

										</h1>
									</div>
									<!-- layer 3 -->

								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div><!-- End Slider -->

	<main id="main">

		<!-- ======= About Section ======= -->
		<div id="about" class="about-area area-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h2>About <?= $profile[0]['nama_pt']; ?></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single-well start-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="well-left">
							<div class="single-well">
								<a href="#">
									<img src="/assets/img/about/1.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
					<!-- single-well end-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="well-middle">
							<div class="single-well">
								<a href="#">
									<h4 class="sec-head">Profile</h4>
								</a>
								<p>
									<?= $profile[0]['profile_pt']; ?> </p>
								<ul>
									<li>
										<i class="fa fa-check"></i> Interior design Package
									</li>
									<li>
										<i class="fa fa-check"></i> Building House
									</li>
									<li>
										<i class="fa fa-check"></i> Reparing of Residentail Roof
									</li>
									<li>
										<i class="fa fa-check"></i> Renovaion of Commercial Office
									</li>
									<li>
										<i class="fa fa-check"></i> Make Quality Products
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End col-->
				</div>
			</div>
		</div><!-- End About Section -->

		<!-- ======= Skills Section ======= -->
		<div class="our-skill-area fix hidden-sm">
			<div class="test-overly"></div>
			<div class="skill-bg area-padding-2">
				<div class="container">
					<!-- section-heading end -->
					<div class="row">
						<!-- single-skill start -->
						<div class="col-xs-12 col-sm-3 col-md-3 text-center">
							<div class="single-skill">
								<div class="progress-circular">
									<input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
									<h3 class="progress-h4">Konsultan</h3>
								</div>
							</div>
						</div>
						<!-- single-skill end -->
						<!-- single-skill start -->
						<div class="col-xs-12 col-sm-3 col-md-3 text-center">
							<div class="single-skill">
								<div class="progress-circular">
									<input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
									<h3 class="progress-h4">Arsitektur</h3>
								</div>
							</div>
						</div>
						<!-- single-skill end -->
						<!-- single-skill start -->
						<div class="col-xs-12 col-sm-3 col-md-3 text-center">
							<div class="single-skill">
								<div class="progress-circular">
									<input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
									<h3 class="progress-h4">Design</h3>
								</div>
							</div>
						</div>
						<!-- single-skill end -->
						<!-- single-skill start -->
						<div class="col-xs-12 col-sm-3 col-md-3 text-center">
							<div class="single-skill">
								<div class="progress-circular">
									<input type="text" class="knob" value="0" data-rel="80" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
									<h3 class="progress-h4">Sketch Up</h3>
								</div>
							</div>
						</div>
						<!-- single-skill end -->
					</div>
				</div>
			</div>
		</div><!-- End Skills Section -->



		<!-- ======= Services Section ======= -->
		<div id="services" class="services-area area-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline services-head text-center">
							<h2>Our Services</h2>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<!-- Start Left services -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="/konsultan">
										<i class="fa fa-comments-o"></i>
									</a>
									<h4>Konsultan Properti</h4>
									<p>
										Kami siap membantu dalam hal konsultasi terkait desain arsitektur dan properti.
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="/kompetensi">
										<i class="fa fa-users"></i>
									</a>
									<h4>Kompetensi</h4>
									<p>
										Kami bersaing menghasilkan produk yang terbaik demi memuaskan konsumen.
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<!-- end col-md-4 -->
						<div class=" about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="/arsitektur">
										<i class="fa fa-university"></i>
									</a>
									<h4>Arsitektur</h4>
									<p>
										kami membuat desain properti seperti rumah, kantor, hotel, gudang, dan lain sebagainya.
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<!-- end col-md-4 -->
						<div class=" about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="/mitra">
										<i class="fa fa-handshake-o"></i>
									</a>
									<h4>Mitra</h4>
									<p>
										Kami juga bekerja sama dengan berbagai mitra.
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
					<!-- End Left services -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<!-- end col-md-4 -->
						<div class=" about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="perencanaan">
										<i class="fa fa-bar-chart"></i>
									</a>
									<h4>Perencanaan pekerjaan</h4>
									<p>
										Perencanaan setiap pekerjaan properti harus dilakukan untuk menghasilkan sesuatu yang maksimal.
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
					<!-- End Left services -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<!-- end col-md-4 -->
						<div class=" about-move">
							<div class="services-details">
								<div class="single-services">
									<a class="services-icon" href="/pelayanan">
										<i class="fa fa-clock-o"></i>
									</a>
									<h4>pelayanan 24/7</h4>
									<p>
										Kami bersedia melayani anda kapanpun .
									</p>
								</div>
							</div>
							<!-- end about-details -->
						</div>
					</div>
				</div>
			</div>
		</div><!-- End Services Section -->


		<!-- ======= Rviews Section ======= -->
		<div class="reviews-area">
			<div class="row no-gutters">
				<div class="container mt-5 mb-5">
					<div class="owl-carousel testimonial-carousel">
						<div class="row">
							<?php $no = 1; ?>
							<?php foreach ($videos as $j) : ?>

								<div class="column">
									<iframe width="250" height="125" src="<?= $j['link']; ?>"> </iframe>
								</div>

							<?php endforeach; ?>
						</div>
					</div>



				</div>
			</div>
		</div><!-- End Rviews Section -->

		<!-- ======= Portfolio Section ======= -->
		<div id="portfolio" class="portfolio-area area-padding fix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h2>Our Portofolio</h2>
						</div>
					</div>
				</div>
				<div class="row awesome-project-content">
					<article id="demo-default" class="demo">

						<div id="coverflow">
							<ul class="flip-items">
								<?php $no = 1; ?>
								<?php foreach ($portofolio as $j) : ?>
									<li data-flip-title="Red">
										<img src="<?= base_url('uploads/port/thumb') . '/thumb_' . $j['foto']; ?>" width="400px" class="img-thumbnail">
									</li>

								<?php endforeach; ?>
							</ul>
						</div>
					</article>
				</div>
			</div>
		</div><!-- End Portfolio Section -->

		<!-- ======= Pricing Section ======= -->
		<!-- <div id="pricing" class="pricing-area area-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h2>Pricing Table</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="pri_table_list">
							<h3>basic <br /> <span>$80 / month</span></h3>
							<ol>
								<li class="check">Online system</li>
								<li class="check cross">Full access</li>
								<li class="check">Free apps</li>
								<li class="check">Multiple slider</li>
								<li class="check cross">Free domin</li>
								<li class="check cross">Support unlimited</li>
								<li class="check">Payment online</li>
								<li class="check cross">Cash back</li>
							</ol>
							<button>sign up now</button>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="pri_table_list active">
							<span class="saleon">top sale</span>
							<h3>standard <br /> <span>$110 / month</span></h3>
							<ol>
								<li class="check">Online system</li>
								<li class="check">Full access</li>
								<li class="check">Free apps</li>
								<li class="check">Multiple slider</li>
								<li class="check cross">Free domin</li>
								<li class="check">Support unlimited</li>
								<li class="check">Payment online</li>
								<li class="check cross">Cash back</li>
							</ol>
							<button>sign up now</button>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="pri_table_list">
							<h3>premium <br /> <span>$150 / month</span></h3>
							<ol>
								<li class="check">Online system</li>
								<li class="check">Full access</li>
								<li class="check">Free apps</li>
								<li class="check">Multiple slider</li>
								<li class="check">Free domin</li>
								<li class="check">Support unlimited</li>
								<li class="check">Payment online</li>
								<li class="check">Cash back</li>
							</ol>
							<button>sign up now</button>
						</div>
					</div>
				</div>
			</div>
		</div>End Pricing Section -->


		<!-- ======= Testimonials Section ======= -->
		<div class="testimonials-area">
			<div class="testi-inner area-padding">
				<div class="testi-overly"></div>
				<div class="container ">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<!-- Start testimonials Start -->
							<div class="testimonial-content text-center">
								<a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
								<!-- start testimonial carousel -->
								<div class="owl-carousel testimonial-carousel">
									<div class="single-testi">
										<div class="testi-text">
											<p>
												Kamu juga harus meningkatkan keahlian dengan banyak belajar hal-hal baru dan menguasai berbagai aplikasi yang akan menuntun kamu ke dalam produktivitas kerja yang semakin meningkat</p>
											<h6>Samuel</h6>
										</div>
									</div>
									<!-- End single item -->
									<div class="single-testi">
										<div class="testi-text">
											<p>
												Memperluas relasi, kamu tidak bisa bekerja sendirian sebagai seorang arsitek tetap saja kamu membutuhkan peran beberapa orang untuk melakukan proyek yang ada di lapangan

											</p>
											<h6>Jhon</h6>
										</div>
									</div>
									<!-- End single item -->
									<div class="single-testi">
										<div class="testi-text">
											<p>
												Memperbanyak portofolio, karena hal ini akan berpengaruh kepada pengalaman dan profesionalitas kamu sebagai seorang arsitek yang menangani banyak klien</p>
											<h6>Fleming</h6>
										</div>
									</div>
									<!-- End single item -->
								</div>
							</div>
							<!-- End testimonials end -->
						</div>
						<!-- End Right Feature -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonials Section -->

		<!-- ======= Blog Section ======= -->
		<div id="blog" class="blog-area">
			<div class="blog-inner area-padding">
				<div class="blog-overly"></div>
				<div class="container ">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="section-headline text-center">
								<h2>Latest News</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- Start Left Blog -->
						<?php $no = 1; ?>
						<?php foreach ($news as $j) : ?>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="single-blog">
									<div class="single-blog-img">
										<a href="blog.html">
											<img src="<?= base_url('uploads/news/thumb') . '/thumb_' . $j['foto']; ?>" alt="" style="height:200px;width:100%;">
										</a>
									</div>
									<div class="blog-meta">

										<span class="date-type">
											<i class="fa fa-calendar"></i><?= $j['tanggal']; ?>
										</span>
									</div>
									<div class="blog-text">
										<h4>
											<a href="<?= $j['link']; ?>"><?= $j['judul']; ?></a>
										</h4>
										<p><?= $j['desk']; ?> </p>
									</div>
									<span>
										<a href="<?= $j['link']; ?>" class="ready-btn">Read more</a>
									</span>
								</div>
								<!-- Start single blog -->
							</div>
						<?php endforeach; ?>
						<!-- End Left Blog-->
						<!-- Start Left Blog -->

						<!-- End Left Blog-->
						<!-- Start Right Blog-->

						<!-- End Right Blog-->
					</div>
				</div>
			</div>
		</div><!-- End Blog Section -->

		<!-- ======= Blog Section ======= -->
		<div id="blog" class="blog-area">
			<div class="blog-inner area-padding">
				<div class="blog-overly"></div>
				<div class="container ">
					<div class="suscribe-area">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="section-headline text-center">
												<h2>Struktur Organisasi</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- Start Left Blog -->
						<div class="col-md-4 col-sm-4 col-xs-12">

							<!-- Start single blog -->
						</div>
						<!-- End Left Blog-->
						<!-- Start Left Blog -->
						<br>

						<!-- End Left Blog-->
						<!-- Start Right Blog-->

						<!-- End Right Blog-->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="section-headline text-center">
									<br>
									<h4>Principal</h4>

								</div>
							</div>
							<div class="row">
								<div class="row">
									<!-- Start Left Blog -->
									<?php $no = 1; ?>
									<?php foreach ($pegawai as $p) : ?>
										<div class="col-md-3 col-sm-4 col-xs-12">
											<div class="single-blog">
												<div class="single-blog-img">
													<a href="blog.html">
														<img src="<?= base_url('uploads/pegawai/thumb') . '/thumb_' . $p['foto']; ?>" alt="" style="height:200px;width:80%;">
													</a>
												</div>
												<div class="blog-meta">

												</div>
												<div class="blog-text">
													<h6><?= $p['nama']; ?></h6>
													<h5>
														<?= $p['nama_jabatan']; ?>
													</h5>

												</div>

											</div>
											<!-- Start single blog -->
										</div>
									<?php endforeach; ?>
									<!-- End Left Blog-->
									<!-- Start Left Blog -->

									<!-- End Left Blog-->

									<!-- End Right Blog-->
								</div>


							</div>
						</div>
					</div>
				</div><!-- End Blog Section -->

				<!-- ======= Suscribe Section ======= -->
				<!-- End Suscribe Section -->

				<!-- ======= Contact Section =======
				<div id="contact" class="contact-area">
					<div class="contact-inner area-padding">
						<div class="contact-overly"></div>
						<div class="container ">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="section-headline text-center">
										<h2>Contact us</h2>
									</div>
								</div>
							</div>
							<div class="row">
							  Start contact icon column
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="contact-icon text-center">
										<div class="single-icon">
											<i class="fa fa-mobile"></i>
											<p>
												Call: (022) 7275016<br>

											</p>
										</div>
									</div>
								</div>
							  Start contact icon column
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="contact-icon text-center">
										<div class="single-icon">
											<i class="fa fa-envelope"></i>
											<p>
												Email: arsi_enarcon@yahoo.com<br>

											</p>
										</div>
									</div>
								</div>
							  Start contact icon column
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="contact-icon text-center">
										<div class="single-icon">
											<i class="fa fa-map-marker"></i>
											<p>
												Location: Jl. Saninten No. 6<br>
												<span> Bandung 40114</span>
											</p>
										</div>
									</div>
								</div>
							</div> -->

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h2>Contact Us</h2>
						</div>
					</div>
				</div>
				<div class="row">

					<!-- Start Google Map -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<!-- Start Map -->
						<iframe src="https://maps.google.com/maps?q=pt%20arsi%20enarcon&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
						<!-- End Map -->
					</div>
					<!-- End Google Map -->

					<!-- Start  contact -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form contact-form">
							<form action="forms/contact.php" method="post" role="form" class="php-email-form">
								<div class="form-group">
									<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="msg" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
									<div class="validate"></div>
								</div>
								<div class="mb-3">
									<div class="loading">Loading</div>
									<div class="error-message"></div>
									<div class="sent-message">Your message has been sent. Thank you!</div>
								</div>
								<div class="text-center"><button type="submit">Send Message</button></div>
							</form>
						</div>
					</div>
					<!-- End Left contact -->
				</div>
			</div>
		</div>
		</div><!-- End Contact Section -->

	</main><!-- End #main -->
	<!--=======================================================================================================================================================-->
	<!-- ======= Footer ======= -->
	<footer>
		<div class="footer-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<div class="footer-logo">
									<h2><span>PT</span> <?= $profile[0]['nama_pt']; ?></h2>
								</div>


								<div class="footer-icons">
									<ul>
										<li>
											<a href="#"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-pinterest"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- end single footer -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<h4>Location :</h4>
								<p>
									<?= $profile[0]['tempat']; ?>
								</p>
								<div class="footer-contacts">
									<p><span>Tel:</span> <?= $profile[0]['whatsapp']; ?></p>
									<p><span>Email:</span><?= $profile[0]['email']; ?></p>
									<p><span>Working Hours:</span> <?= $profile[0]['nama_pt']; ?></p>
								</div>
							</div>
						</div>
					</div>
					<!-- end single footer -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<h4>Contact</h4>
								<div class="row">
									<!-- Start contact icon column -->
									<div class="col-md-5 col-sm-4 col-xs-12">
										<div class="contact-icon text-center">
											<div class="single-icon">
												<i class="fa fa-mobile"></i>
												<p>
													<?= $profile[0]['no_telp']; ?><br>
												</p>
											</div>
										</div>
									</div>
									<!-- Start contact icon column -->
									<div class="col-md-5 col-sm-4 col-xs-12">
										<div class="contact-icon text-center">
											<div class="single-icon">
												<i class="fa fa-envelope"></i>
												<p>
													<?= $profile[0]['email']; ?><br>
												</p>
											</div>
										</div>
									</div>
									<!-- Start contact icon column -->
									<div class="col-md-5 col-sm-4 col-xs-12">
										<div class="contact-icon text-center">
											<div class="single-icon">
												<i class="fa fa-map-marker"></i>
												<p>
													<?= $profile[0]['tempat']; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-area-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="copyright text-center">
							<p>
								&copy; 2021 <strong>PT.<?= $profile[0]['nama_pt']; ?></strong>. All Rights Reserved
							</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</footer><!-- End  Footer -->

	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

	<!-- flipster -->
	<script>
		var coverflow = $("#coverflow").flipster();
	</script>

	<!-- Vendor JS Files -->
	<script src="/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="/assets/vendor/php-email-form/validate.js"></script>
	<script src="/assets/vendor/appear/jquery.appear.js"></script>
	<script src="/assets/vendor/knob/jquery.knob.js"></script>
	<script src="/assets/vendor/parallax/parallax.js"></script>
	<script src="/assets/vendor/wow/wow.min.js"></script>
	<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="/assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
	<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="/assets/vendor/venobox/venobox.min.js"></script>
	<!-- owl carousel  -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".owl-carousel").owlCarousel({
				autoplay: true,
				autoplayHoverPause: true,
				items: 3,
				dots: true,
				nav: true,
				loop: true,
			});
		});
	</script>


	<!-- Template Main JS File -->
	<script src="/assets/js/main.js"></script>
	<script>
		function myFunction(imgs) {
			var expandImg = document.getElementById("expandedImg");
			var imgText = document.getElementById("imgtext");
			expandImg.src = imgs.src;
			imgText.innerHTML = imgs.alt;
			expandImg.parentElement.style.display = "block";
		}
	</script>
</body>

</html>