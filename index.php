<?php
//include_once 'core/connect.php'; 
    //include_once 'core/initialize-all-pages.php';
    session_start(); 
      include_once 'core/connect.php'; 
        include_once 'core/users-and-all-functions.php'; 
		include_once 'core/news_function.php';
// SQL query to interact with info from our database

        

        //And we display the results
       

    // Establish the output variable
?>

</html><!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from mgm-reviews.com/personalbank/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2015 15:34:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TEIN NDC</title>
        <!-- core CSS -->

        <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="owl-carousel/owl.transitions.css">
      
    <!-- Default Theme -->
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">


        <link href="res/css/bootstrap.min.css" rel="stylesheet">
        <link href="res/css/font-awesome.min.css" rel="stylesheet">
        <link href="res/css/animate.min.css" rel="stylesheet">
        <link href="res/css/owl.carousel.css" rel="stylesheet">
        <link href="res/css/owl.transitions.css" rel="stylesheet">
        <link href="res/css/prettyPhoto.css" rel="stylesheet">
        <link href="res/css/main.css" rel="stylesheet">
        <link href="res/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="http://mgm-reviews.com/personalbank/res/js/html5shiv.js"></script>
        <script src="http://mgm-reviews.com/personalbank/res/js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.html">
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
              href="res/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
              href="res/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
              href="res/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed"
              href="res/images/ico/apple-touch-icon-57-precomposed.png">

        <link rel="shortcut icon" href="res/images/logo/ndc1.jpg"/>
    </head>
    <!--/head-->

    <body id="home" class="homepage">

        <header id="header">
            
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
                   <div id='head_black'></div>
                    <div id='head_red'></div>
                    <div id='head_white'></div>
                    <div id='head_green'></div>
                <div class="container">
                        
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#home"><img
                                src="res/images/logo/ndc1.png" alt="logo"><span class="logo_text1">N</span><span class="logo_text2">D</span><span class="logo_text3">C</span> - TEIN CHAPTERS</a>
                    </div>

                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="scroll active"><a href="#home">Home</a></li>
                            <li class="scroll"><a href="#utilities1">News</a></li>
                            <li class="scroll"><a href="#animated-number">Statistics</a></li>
                            <li class="scroll"><a href="#about1">About us</a></li>
                            <li class="scroll"><a href="#cta3">Register</a></li>
                             <li class="dropdown">   
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">NDC TEIN Chapters<b class="caret"></b></a>
                        	<ul class="dropdown-menu">
                            <li><a href="chapters/ug-poly.php">University Of Ghana Chapter</a></li>
                            <li><a href="chapters/knust-poly.php">KNUST Chapter</a></li>
                            <li><a href="chapters/knust-poly.php">Winneba Chapter</a></li>
                            <li><a href="chapters/k-poly.php">K-Poly Chapter</a></li>
                            <li><a href="chapters/a-poly.php">Accra-Poly Chapter</a></li>
                            <li><a href="chapters/h-poly.php">Ho-Poly Chapter</a></li>   
                       		</ul>
                   		    </li> 
                            <li class="scroll"><a href="admin/login-page.php">Admin login</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!--/.container-->
            </nav>
            <!--/nav-->
        </header>
        <!--/header-->






       
        <section id="main-slider">
          
            <div id="owl-demo" class="owl-carousel owl-theme">
                
                <div class="item" style="background-image: url(res/images/slider/bg3.png);">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="carousel-content">
                                        <h2><span>TEIN NDC</span> EYE ZU EYE ZA!</h2>

                                        <p>
										Just create a free account and start managing your chapter.
										We give you access to a web portal that lets you do everything from saving, sending, buying and getting loans.										
										Its easy, convenient  and you always know your money is in a good place. 										  
											</p>
                                        <a class="btn btn-primary btn-lg" href="#">Create Free Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!--/.item-->
       
                <div class="item" style="background-image: url(res/images/slider/bg1.jpg);">
                    <div class="slider-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="carousel-content">
                                        <h2>Always  with<span> YOU</span></h2>

                                        <p>
										    We shall go wherever you go, giving you access to bank whenever you need it.
											We also don't just give you a payment solution, we give you security, account statistics and insight.
											<span>Try us!</span>
											</p>
                                        <a class="btn btn-primary btn-lg" href="#">Download App</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
             
             <div class="item" style="background-image: url(res/images/cta2/cta2-bg.jpg);">
            

             </div>
                <!--/.item-->
           </div>
       <!--/.owl-carousel-->
          
        </section>
              <!--/#main-slider-->

        <section id="cta" class="wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>TEIN NDC Focusing ........</h2>
                        <p>
                            Millions of customers around the world use us for one simple reason: we are flexible.
                        </p>
                            <div id="utilities1"></div>
                        <p>
                            At TEIN we focus on lending a hand. We believe in getting things done more easily.
                            We give you access to your money when you need it. Transfer money at very low rates in a secure
                            way.
                            Pay your bills conveniently and get instant overdrafts when things get hot.
                        </p>
                    </div>

                   <!-- <div class="col-sm-3 text-left">
                        <h2>oti well we need this</h2>
                        <p class="text-left">oti well we need this</p>

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">+254</span>
                            <input type="text" class="form-control" placeholder="Phone Number">
                            <span class="input-group-addon" id="basic-addon1" style="cursor: pointer;">Send</span>
                        </div>

                    </div>-->
                </div>
            </div>
        </section>
        <!--/#cta-->


        <section id="utilities">
            <div class="container">
                <div class="section-header">
                    <p>&nbsp;</p>
                    <h2 class="section-title text-center wow fadeInDown">NEWS</h2>
                    <p class="text-center wow fadeInDown">
                        <b>EYE ZU! EYE ZA!</b> TEIN NDC for 2016, you are paying for items online. You will realize we are fast, secure and just awesome.
                        <br> We have more cool features below:- just to make your life easier.
                    </p>
                </div>



               


                <div class="row"> <!--
                    <div class="col-sm-6 wow fadeInLeft">
                        <img class="img-responsive" src="res/images/m-banking.png" alt="">
                    </div> -->
                     <?php
                       $new_view= new news_views;
                       $new_view->newsview();
                        ?>
                        
                    </div>
                     <p size="30px"><b><marquee><a href="ndc_news/see_news.php">READ MORE NEWS</a></marquee></b></p>
                   <div id="cta3"></div>
        </section>

        <section id="cta2">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>REGISTER </span>  YOUR TEIN <span class="logo_text1">N</span><span class="logo_text2">D</span><span class="logo_text3">C</span> CHAPTER.</h2>

                    <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        2016, win, NDC, Cheapter, Get Account Insight, Pay Dues, get around the world!
                    </p>
                        <div id="about1"></div>
                    <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <a class="btn btn-primary btn-lg" href="register-chapter/register-step-1.php">Create TEIN Chapter Account</a> 
                        </p>

                </div>
            </div>
        </section>


       

        <section id="about">
            <div class="container">

                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">About TIEN <span class="logo_text1">N</span><span class="logo_text2">D</span><span class="logo_text3">C</span></h2>

                    <p class="text-center wow fadeInDown">
                        Millions of Tertiary Students around the country form the TEIN community for one simple reason: building a better Ghana. TEIN NDC focus on reaching out to all tertiary student</br>
                        We believe in better Ghana agender of <b>President John Mahama.</b> <b>EYE ZU! EYE ZA! </b>.

                    </p>
                </div>

                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft">
                        <h3 class="column-title">Message From General Secetary</h3>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="http://player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeInRight">
                        <h3 class="column-title">Statement</h3>

                        <p>
                            The TEIN NDC was established in June 2015 to fill the ever growing
                            demand for secure and flexible personal banking.
                        </p>

                        <p>
                            The company is based on strong banking principles. 
                            We focus on giving our clients loans that make life more easier 
                            and below the market interest rates.  
                        </p> 
                        
                        <p>
                            The personal bank also deals in money transfer and  worldwide online payments systems.
                            Online money transfers serve as electronic alternatives to traditional paper methods
                            like checks and money orders. 
                            We operate as an acquirer, performing payment processing for online vendors, 
                            auction sites and other commercial users, for which we charge a small fee.
                        </p>


                        <!--<div class="row">
                            <div class="col-sm-6">
                                <ul class="nostyle">
                                    <li><i class="fa fa-check-square"></i> Savings</li>
                                    <li><i class="fa fa-check-square"></i> Loans</li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <ul class="nostyle">
                                    <li><i class="fa fa-check-square"></i> Payment Services</li>
                                    <li><i class="fa fa-check-square"></i> Personal Banking</li>
                                </ul>
                            </div>
                        </div> -->
                           
                    </div>
                </div>            
            </div>

        </section>
        <!--/#about-->

        <section id="animated-number">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">TEIN STATISTICS</h2>

                    <p class="text-center wow fadeInDown">
                        TEIN Online membership system statistics sammary.</br> The vibrant Tertiary Education Institutions Network
                        in Ghana.                 
                    </p>
                </div>

                <div class="row text-center">
                    <div class="col-sm-3 col-xs-6">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                            <div class="animated-number" data-digit="2750"  data-duration="1000">
                            <?php 
							$count= new dashboard;
							$count->count_members();
							?>
                            
                            </div>
                            <strong>REGISTERED MEMBERS</strong>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                            <div class="animated-number" data-digit="1500" data-duration="1000">
                            <?php 
							$count= new dashboard;
							$count->count_dues_paid();
							?>
                            
                            </div>
                            <strong>DUES PAYED</strong>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                            <div class="animated-number" data-digit="12" data-duration="1000">
                            <?php 
							$count= new dashboard;
							$count->count_chapters();
							?>
                            
                            </div>
                            <strong>TEIN CHAPTERS REGISTERED </strong>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                            <div class="animated-number" data-digit="787" data-duration="1000">0</div>
                            <strong>OTHERS</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/#animated-number-->


       
        <!--/#meet-team-->


        
        <!--/#bottom-->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2015 TEIN  NDC CHAPTERS                                                                
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>                            
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
       
        <!--/#footer-->

        
         <!-- jQuery 1.7+ -->
        <script src="res/jsn/jquery-1.9.1.min.js"></script>
        <!-- Include js plugin -->
        <script src="owl-carousel/owl.carousel.js"></script>
        

        <script src="res/js/jquery.js"></script>
        <script src="res/js/bootstrap.min.js"></script>
        <script src="res/js/owl.carousel.min.js"></script>
        <script src="res/js/mousescroll.js"></script>
        <script src="res/js/smoothscroll.js"></script>
        <script src="res/js/jquery.prettyPhoto.js"></script>
        <script src="res/js/jquery.isotope.min.js"></script>
        <script src="res/js/jquery.inview.min.js"></script>
        <script src="res/js/wow.min.js"></script>
        <script src="res/js/main.js"></script>
    </body>

<!-- Dveloped by TEIN NDC Web Team   -->
</html>

