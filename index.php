<?php
session_start();
include 'partials/db_conn.php';
include 'partials/dbconn_.php';
?>

<!DOCTYPE html>
<html lang="zxx">
<!-- HEAD -->

<head>
    <!-- TITLE -->
    <title>DEAL IT</title>
    <meta charset="utf-8">
    <meta name="keywords" content="You, can, add, all, the, necessary, keywords, related, to, your, website, here">
    <meta name="description" content="You can write about your website description here">
    <meta name="author" content="hpthemes23">
    <meta name="viewport" content="width=content-width, initial-scale=1">
    <!-- CSS -->
    <!-- FAVICON -->
    <link href="website/images/favicon.ico" rel="icon">
    <!-- GOOGLE FONT CSS -->
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- OWL CAROUSEL CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- ANIMATE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <!-- MAIN STYLESHEET CSS -->
    <link href="website/css/main_style.css" rel="stylesheet">
    <!-- END OF CSS -->
    <style>    
        #fabtheme-navbar .nav-link .fabtheme-nav-link{
            color: white !important;
        }
        #fabtheme-navbar .nav > li > a:hover {
            color: rgb(118, 201, 248) !important;
        }
    </style>
    <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
                }

                function closeForm() {
                document.getElementById("myForm").style.display = "none";
                }
                function submitChat(){
	if(form1.uname.value == '' || form1.msg.value == '' ){
		alert("Name or message not typed");
	}
	else{
		form1.uname.readyState = true,
		form1.uname.style.border = 'none';

		var uname = encodeURIComponent(form1.uname.value);
		var msg = encodeURIComponent(form1.msg.value);
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;  
			}
	}

	xmlhttp.open('GET','add.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();
	}
}
$(document).ready(function(e){
	$.ajaxSetup({cache:false});

	setInterval(function(){
		$('#chatlogs').load('logs.php');
	},1000);
});


    </script>
</head>
<!-- END OF HEAD -->

<body id="fabtheme-body" class="body">
    <!-- NAVIGATION BAR -->
    <nav id="fabtheme-navbar home" class="navbar navbar-expand-lg navbar-expand-xl navbar-dark fixed-top"
        style="background-color: rgb(0,0,36); opacity: 0.95;">
        <a class="navbar-brand" href="#">
			<!-- WEBSITE LOGO -->
			<div class="logo">
				<img class="img" src="./website/images/logo.png" width="100" height="120">
				<p>DEAL IT</p>
			</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#expands"
            aria-controls="expands" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav" id="expands">
            <ul class="navbar-nav text-center ml-auto">
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#home" style="font-size: x-large; margin-left: -85px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#about" style="font-size: x-large;">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#products" style="font-size: x-large;">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#reviews" style="font-size: x-large;">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#blog" style="font-size: x-large;">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fabtheme-nav-link" href="#contact" style="font-size: x-large;">Contact</a>
                </li>
            </ul>
            <form class="search form-inline my-2 my-lg-0" action="http://localhost/wt/index.php#products" method="get">
                <div class="button">
                    <input type="search" name="search" center placeholder="Search..." style="padding-left: 22px;">
                    <a href="search.php"><button type="submit" name="searchbar" class="fa fa-search bttn" style="background-color: transparent; border-color: white; background-image: none;"> </button></a>
                </div>
			</form>
            <?php 
			if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)) {
			echo '<div class="ls">
			<p style="font-size: larger; margin-top: 20px;"><i class="fas fa-user-check fa-inverse"> <b>  '. $_SESSION["username"].'</b></i></p>
			<div id="logout">
				<a href="logout.php" style="margin-left: 30px;">
					<button style="margin-bottom: 0px;" class="btn center fabtheme-headings center">Log Out</button>
				</a>
			</div>
			</div>'; } 
			else {
				echo '<div class="ls">
			     <div id="login">
				<a href="login.php">
					<button class="btn center fabtheme-headings center">Log In</button>
				</a>
			</div>
			<div id="signin">
				<a href="register.php">
					<button class="btn center fabtheme-headings center">Sign Up</button>
				</a>
			</div>
			</div>';
			} ?>
            <a href="sellform.php" style="margin-left: 165px; text-decoration: none;">
                <button style="border-radius: 50%;height: 70px;width: 80px;font-size: x-large;" class="sellbtn"><p class="sell">SELL</p></button>
            </a>
        </div>
    </nav>

    <header id="home" class="fabtheme-parallax-1 img-fluid fabtheme-thetop">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-start">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pl-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-left wow fadeInLeft fabtheme-headings"
                        data-wow-duration="2s">
                        <h2>THOUGHT OF THE DAY</h2>
                        <p style="font-size: x-large;" class="pt-2 mb-0"><sup><i class="fas fa-quote-left"></i></sup> Don’t Let Yesterday Take Up Too Much Of Today <sup><i class="fas fa-quote-right"></i></sup>
                        </p>
                        <p class="pt-1 my-0">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p>
                        <h5 class="my-0">Sahaana Iyer</h5>
                        <!-- <small>CEO, xyz company</small> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END OF HEADER -->
    <!-- ABOUT -->
    <section id="about" class="fabtheme-link-show">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center mt-5 justify-content-end">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pr-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-right wow fadeInRight fabtheme-about"
                        data-wow-duration="2s">
                        <h2>ABOUT</h2>
                        <p class="py-2">Have you ever faced difficulty in contacting your juniors or seniors for buying or selling your previous semester resources ?? Did you ever wonder how useful it would be if you could have access to buy and sell the products on a common platform where everyone could view and purchase the items ? <br>Ta-da! Here it is !! One such platform that will release you of the tension on how you would sell your products or how you could contact others who wanna sell theirs...</p>
                        <a href="#team" class="btn fabtheme-button">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br><br>
    <!-- END OF ABOUT -->
    
    <!-- Products -->
    <section id="products" class="fabtheme-link-show">
        <div class="container text-center mt-5" style="background-color: black; opacity: 90%; width: 1200px;">
             <div class="tab-content" id="pills-tabContent">
               <div class="fade show active" id="all" role="tabpanel" aria-labelledby="all-tab"><br>
                    <div class="inl">
                    <h1 style="text-align: right; width: 60%;">Available Products</h1>
                    <form action="http://localhost/wt/index.php#products" method="post" class="sort">
                        <select class="filter" name="filter" value="filter">
                            <option selected>Filter..</option>
                            <option name="old" value="old">Old to New</option>
                            <option name="new" value="new">New to Old</option>
                        </select>
                        <button type="submit" name="send" id="send" class="fa fa-paper-plane fa-3x fa-inverse" value="&#xf043" style="font-size: large; width: 10%; height: 10%; border-color: black; background-color: black; margin-top: 7px;"></button></form>
                    </div>
                    <div class="mb-5">
                        <form action="http://localhost/wt/index.php#products" method="post" class="filteration">
                            <div id="myBtnContainer">
                                <button class="btn" type="submit" name="all" id="all"> Show All</button>
                                <button class="btn" type="submit" name="ed" id="ed"> Engineering Drawing</button>
                                <button class="btn" type="submit" name="rb" id="rb"> Reference Books</button>
                                <button class="btn" type="submit" name="bs" id="bs"> Boiler Suit</button>
                                <button class="btn" type="submit" name="others" id="others"> Others</button>
                            </div><br>
                        </form>
                        <div class="masonry masonry-brick wow fadeInLeft fabtheme-card-rows" data-wow-duration="3s">
                        <?php
                        if (isset($_GET["searchbar"])) {
                            // echo "<script> alert('entered search loop') </script>";        
                            $query = $_GET['search'];
                            $sql = "select * from sellform where match (category, title, description) against ('$query')";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                $title = $row['title'];
                                $category = $row['category'];
                                $descr = $row['description'];

                                echo '
                                    <div class="card fabtheme-zoom rounded-0">
                                        <a href="#"><img src="' . $row["image"] .'" class="card-img mx-auto" style="width: "100px"; height: "400px";" alt="All2"></a>
                                            <div class="price" style="background-color: black;">
                                             '. $row["category"] .'"<br>"'. $row["title"] .' "<br>"'. $row["description"] .' "<br> Price : Rs. "'. $row["price"].'"/-"
                                            </div>
                                    </div>';
                            }
                        }
                        else if (isset($_POST["send"])) {
                            // echo "<script> alert('entered if loop') </script>";
                            $form = $_POST["filter"];
                            switch ($form) {
                                case "old" : 
                                    $res = mysqli_query($conn, "select * from sellform order by date");
					            	while ($row = mysqli_fetch_array($res)) { ?>
                                        <div class="card fabtheme-zoom rounded-0">
                                <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                        height="400" alt="All2"></a>
                                <div class="price" style="background-color: black;">
                                    <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                </div>
                            </div>
                         <?php   } 
                                 break;
                            
                                case "new" : 
                                    $res = mysqli_query($conn, "select * from sellform order by date desc");
					            	while ($row = mysqli_fetch_array($res)) { ?>
                                        <div class="card fabtheme-zoom rounded-0">
                                <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                        height="400" alt="All2"></a>
                                <div class="price" style="background-color: black;">
                                    <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                </div>
                            </div>
                        <?php    }
                                break;
                            }
                        }
                        else if (isset($_POST["all"])) {
                            // echo "<script> alert('entered all loop') </script>";
                            $res = mysqli_query($conn, "select * from sellform");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                            height="400" alt="All2"></a>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                    </div>
                                </div>
                                <?php  } 
                        }
                        else if (isset($_POST["ed"])) {
                            // echo "<script> alert('entered ed loop') </script>";
                            $res = mysqli_query($conn, "select * from sellform where category='ed' or category='engg drawing'");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                            height="400" alt="All2"></a>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                    </div>
                                </div>
                                <?php  }
                        }
                        else if (isset($_POST["rb"])) {
                            // echo "<script> alert('entered rb loop') </script>";
                            $res = mysqli_query($conn, "select * from sellform where category='rb' or category='reference books' or category='refrencebooks'");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                            height="400" alt="All2"></a>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                    </div>
                                </div>
                                <?php  }
                        }
                        else if (isset($_POST["bs"])) {
                            // echo "<script> alert('entered bs loop') </script>";
                            $res = mysqli_query($conn, "select * from sellform where category='bs' or category='boiler suit' or category='boilersuit'");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                            height="400" alt="All2"></a>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                    </div>
                                </div>
                                <?php  }
                        }
                        else if (isset($_POST["others"])) {
                            // echo "<script> alert('entered others loop') </script>";
                            $res = mysqli_query($conn, "select * from sellform where category<>'boilersuit' and category<>'bs' and category<>'boiler suit' and category<>'ed' and category!='engg drawing' and category!='rb' and  category!='reference books' and category!='refrencebooks'");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img mx-auto" width="200"
                                            height="400" alt="All2"></a>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";?>
                                    </div>
                                </div>
                                <?php  }
                        }
                        else { 
                            // echo "<script> alert('entered else loop') </script>";
    					    $res = mysqli_query($conn, "select * from sellform");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="card fabtheme-zoom rounded-0">
                                    <div id="contain">
                                        <a href="#"><img src="<?php echo $row['image']; ?>" class="card-img image mx-auto" width="200" height="400" alt="All2"></a>
                                        <div class="overlay"></div>
                                <?php   if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)) {   ?>
			
                                            <form action="index.php" method="post" id="imageform">
                                            <?php
                                                if ($_SESSION["username"] == $row["email"]) { 
                                                    $_SESSION["email"] = $row["email"]; 
                                                    $_SESSION["title"] = $row["title"];
                                                    $_SESSION["description"] = $row["description"];
                                                    $_SESSION["price"] = $row["price"];     ?>
                                                   <button class="but" type="submit" name="drop1" id="drop1"> DELETE POST  </button>
                                        <?php   }
                                                else {  
                                                     $mailid = $row["email"];      ?>
                                                     <button class="but" type="submit" name="drop2" id="drop2" onclick="openForm()"> CONTACT OWNER  </button>
                                        <?php  } 
                                            // $_SESSION["title"] = $row["title"];
                                            // $_SESSION["description"] = $row["description"];
                                            // $_SESSION["email"] = $row["email"];
                                            // $_SESSION["price"] = $row["price"];
                                        ?>
                                            </form>
                                 <?php  }   ?>
                                    </div>
                                    <div class="price" style="background-color: black;">
                                        <?php echo $row["category"]; echo "<br>"; echo $row["title"]; echo "<br>"; echo $row["description"]; echo "<br>"; echo "Price : Rs. ".$row["price"]."/-";
                                            // $_SESSION["title"] = $row["title"];
                                            // $_SESSION["description"] = $row["description"];
                                            // $_SESSION["email"] = $row["email"];
                                            // $_SESSION["price"] = $row["price"];
                                        ?>
                                    </div>
                                </div>
                                <?php  } 
                                } ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section><br><br><br><br><br>
    <!-- END OF WORK -->

    <section id="chatchat" data-aos="fade-up" data-aos-delay="100"> 
         <div class="msgbox chat-popup" id="myForm">
            <form name="form1" id="chatform" action="/action_page.php">
                <label for="name">Name:&nbsp;<input type="text" id="chatname" name="uname"></label><br><br>
                    <textarea name="msg" class="chattext" placeholder="Type your message here"></textarea><br><br>
                    <div id="sendbtn"><a href="http://localhost/wt/index.php#products" class="anchorchat" onclick="submitChat()">Send</a></div><br><br>
                    <div id="block">
                        <label style="color: black;"><b>Your chats will appear here:-</b></label><br><br>
                        <div id="chatlogs" style="color: black;">Loading...<div>
                    </div>
            </form>
        </div>
        <!-- <button class="open-button" onclick="openForm()">Chat</button>

            <div class="chat-popup" id="myForm11">
            <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn11">Send</button>
                <button type="button" class="btn11 cancel11" onclick="closeForm()">Close</button>
            </form>
            </div> -->
        <!-- <script>
            function openForm() {
                    document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                    }

        </script>  -->
     </section>

    <section id="team" class="fabtheme-link-show">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center mt-5 justify-content-start">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pl-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-left wow fadeInLeft fabtheme-team-1"
                        data-wow-duration="2s">
                        <h2>TEAM</h2>
                        <p style="font-size: x-large" class="card-text py-2">Meet our team...</p>
                        <div class="fabtheme-owl-2 owl-carousel teammembers">
                            <div class="teamcard fabtheme-team-2 cont center">
                                <img class="card-img mx-auto rounded-0 imgg" src="./website/images/3.jpeg" alt="Sahaana">
                                <div class="container"><br>
								  <h4>Sahaana Iyer</h4>
								  <p class="titleteam" style="color: rgb(118, 201, 248);">Contact : +91 9742246787</p>
								  <p style="font-size: medium">8609.sahaana.tecomp@gmail.com</p>
								  <span class="center">
								    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
									class="fab fa-twitter fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-facebook-f fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-instagram fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-whatsapp fa-lg" style="color: white"></i></a>
                                    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-linkedin fa-lg" style="color: white"></i></a>
								  </span>
								  <p><button style="background-color: rgb(118, 201, 248); color: rgb(0,0,36);" class="button center portfolio"><a style="text-decoration: none; color: rgb(0,0,36); text-align: center; margin-left: 93px;" href="https://sahaanaiyer.github.io/">Portfolio</a></button></p>
								</div>
                            </div>

                            <div class="teamcard fabtheme-team-2 cont center">
                                <img class="card-img mx-auto rounded-0 imgg" src="./website/images/1.jpeg" alt="Sheetal">
                                <div class="container"><br>
								  <h4>Sheetal Sharma</h4>
								  <p class="titleteam" style="color: rgb(118, 201, 248);">Contact : +91 8945424322</p>
								  <p style="font-size: medium">8639.sheetal.tecomp@gmail.com</p>
								  <span class="center">
								    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
									class="fab fa-twitter fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-facebook-f fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-instagram fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-whatsapp fa-lg" style="color: white"></i></a>
                                    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-linkedin fa-lg" style="color: white"></i></a>
								  </span>
								  <p><button style="background-color: rgb(118, 201, 248); color: rgb(0,0,36);" class="button portfolio"><a style="text-decoration: none; color: rgb(0,0,36);  margin-left: 93px;" href="https://sharmasheetal.github.io/">Portfolio</a></button></p>
								</div>
                            </div>

                           <div class="teamcard fabtheme-team-2 cont center">
                                <img class="card-img mx-auto rounded-0 imgg" src="./website/images/2a.jfif" width="100%" height="1600px" alt="Praditi">
                                <div class="container"><br>
								  <h4>Praditi Rede</h4>
								  <p class="titleteam" style="color: rgb(118, 201, 248);">Contact : +91 9844324677</p>
								  <p style="font-size: medium">8632.praditi.tecomp@gmail.com</p>
								  <span class="center">
								    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
									class="fab fa-twitter fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-facebook-f fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
											class="fab fa-instagram fa-lg" style="color: white"></i></a>
									<a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-whatsapp fa-lg" style="color: white"></i></a>
                                    <a href="javascript:void(0);" class="fabtheme-link-1" style="padding: 5px"><i
                                            class="fab fa-linkedin fa-lg" style="color: white"></i></a>
								  </span>
								  <p><button style="background-color: rgb(118, 201, 248); color: rgb(0,0,36);" class="button portfolio"><a style="text-decoration: none; color: rgb(0,0,36);  margin-left: 93px;" href="https://praditirede.github.io/webCV/">Portfolio</a></button></p>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- REVIEWS -->
    <section id="reviews" class="fabtheme-parallax-3 img-fluid">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-end">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pr-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-right wow fadeInRight fabtheme-reviews-1"
                        data-wow-duration="3s">
                        <h2>REVIEWS</h2>
                        <div class="fabtheme-owl-1 owl-carousel d-flex">
                            <div class="fabtheme-reviews-2">
                                <p class="py-2 fabtheme-reviews-3">
                                    <sup><i class="fas fa-quote-left fa-inverse"></i></sup>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                    <sup><i class="fas fa-quote-right fa-inverse"></i></sup>
                                </p>
                                <p class="pt-1 my-0">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p>
                                <h5 class="my-0" style="color: black;">John Doe</h5>
                                <small style="color: black;">SE Computers</small>
                            </div>
                            <div class="fabtheme-reviews-2">
                                <p class="py-2 fabtheme-reviews-3">
                                    <sup><i class="fas fa-quote-left fa-inverse"></i></sup>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                    <sup><i class="fas fa-quote-right fa-inverse"></i></sup>
                                </p>
                                <p class="pt-1 my-0">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p>
                                <h5 style="color: black;" class="my-0">Gauri Chacko</h5>
                                <small style="color: black;">SE Electronics</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF REVIEWS -->
    <!-- BLOG -->
    <section id="blog" class="fabtheme-link-show">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center mt-5 justify-content-start">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pl-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-left wow fadeInLeft fabtheme-team-1"
                        data-wow-duration="2s">
                        <h2>Latest News</h2>
                        <div class="card-body pt-5 pr-0">
                            <h4 class="card-title font-weight-bold">Covid lies go viral thanks to unchecked social
                                media.</h4>
                            <p class="card-text pt-3">If someone had fallen asleep a decade ago and only just woken
                                up today, they could hardly avoid the conclusion that the world had gone mad. Why, they
                                may ask, are conspiracy theorists and white supremacists taking to the streets to
                                protest against public health guidelines designed to protect them from a deadly
                                pandemic? And why are some politicians going out of their way to trash expert opinion
                                and, in the process, lending credence to wild conspiracy theories?</p>
                        </div>
                        <a href="https://www.chathamhouse.org/publications/the-world-today/2020-10/covid-lies-go-viral-thanks-unchecked-social-media" class="btn fabtheme-button">Read More</a>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        </div>
        </div>
    </section><br><br><br><br>
    <!-- END OF BLOG -->

    <!-- CONTACT -->
    <section id="contact" class="fabtheme-link-show">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center mt-5 justify-content-end">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-9 pr-0">
                    <div class="p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5 text-right wow fadeInRight fabtheme-contact"
                        data-wow-duration="3s">
                        <h2>Contact</h2>
                        <form id="form" class="contact-form" method="post" action="http://localhost/wt/index.php#contact">
                            <div class="row pt-2">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <a href="javascript:void(0);" class="fabtheme-link-2">
                                        <i class="fas fa-envelope-open"></i>
                                        <p>dealit@gmail.com</p>
                                    </a>
                                    <i class="fas fa-phone-alt"></i>
                                    <p>022 65217895 </p>
                                    <i class="fas fa-map-marker"></i>
                                    <p>Building Number, Street Name, Neighborhood, City, Postal Code or Zip Code,
                                        Additional Number</p>
                                    <i class="fas fa-clock"></i>
                                    <p>Monday-Friday: 9:00 AM to 5:00 PM, <br>Saturday and Sunday: Holidays</p>
                                    <div class="col-12 py-2 pr-0">
                                        <a href="javascript:void(0);" class="fabtheme-link-2"><i
                                                class="fab fa-instagram fa-lg mr-2"></i></a>
                                        <a href="javascript:void(0);" class="fabtheme-link-2"><i
                                                class="fab fa-facebook-f fa-lg mr-2"></i></a>
                                        <a href="javascript:void(0);" class="fabtheme-link-2"><i
                                                class="fab fa-twitter fa-lg mr-2"></i></a>
                                        <a href="javascript:void(0);" class="fabtheme-link-2"><i
                                                class="fab fa-whatsapp fa-lg mr-2"></i></a>
                                        <a href="javascript:void(0);" class="fabtheme-link-2"><i
                                                class="fab fa-reddit-alien fa-lg"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group fabtheme-field">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="fname" class="form-control"
                                            placeholder="Firstname" required="required">
                                    </div>
                                    <div class="form-group fabtheme-field">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="lname" class="form-control"
                                            placeholder="Lastname" required="required">
                                    </div>
                                    <div class="form-group fabtheme-field">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Email" required="required">
                                    </div>
                                    <div class="form-group fabtheme-field">
                                        <label for="form_message">Message</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                            placeholder="Message" rows="4"></textarea>
                                    </div>
                                    <div class="form-group fabtheme-field">
                                        <input type="submit" name="msg" class="btn fabtheme-button" value="Send Message">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF CONTACT -->
    
    <!-- FOOTER -->
    <section id="fabtheme-footer">
        <div class="container-fluid h-100 p-3 p-sm-4 p-md-4 p-lg-5 p-xl-5">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                    <p>
                        <a href="#home" class="fabtheme-link-3">Home</a>
                    </p>
                    <p>
                        <a href="#about" class="fabtheme-link-3">About</a>
                    </p>
                    <p>
                        <a href="#products" class="fabtheme-link-3">Products</a>
                    </p>
                    <p>
                        <a href="#reviews" class="fabtheme-link-3">Reviews</a>
                    </p>
                    <p>
                        <a href="#blog" class="fabtheme-link-3">Blog</a>
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                    <p>
                        <a href="#team" class="fabtheme-link-3">Team</a>
                    </p>
                    <p>
                        <a href="#contact" class="fabtheme-link-3">Contact Us</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="fabtheme-link-3">Terms of Services</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="fabtheme-link-3">Privacy Policy</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="fabtheme-link-3">Site Map</a>
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                    <h5 style="color: rgb(118, 201, 248); margin-left: -40px;"> QUICK LINKS </h5><br>
                    <a href="javascript:void(0);" class="fabtheme-link-3"><i class="fab fa-instagram fa-lg mr-2 fa-inverse"></i></a>
                    <a href="javascript:void(0);" class="fabtheme-link-3"><i class="fab fa-facebook-f fa-lg mr-2 fa-inverse"></i></a>
                    <a href="javascript:void(0);" class="fabtheme-link-3"><i class="fab fa-twitter fa-lg mr-2 fa-inverse"></i></a>
                    <a href="javascript:void(0);" class="fabtheme-link-3"><i class="fab fa-whatsapp fa-lg mr-2 fa-inverse"></i></a>
                    <a href="javascript:void(0);" class="fabtheme-link-3"><i class="fab fa-linkedin fa-lg mr-2 fa-inverse"></i></a>
                    <br><br><br><br>
                    <h5 style="color: rgb(118, 201, 248); margin-left: -40px;"> CONNECT WITH US </h5><br>
                    Sheetal Sharma : +91 9488475648
                    <br><br>
                    Email : dealit@gmail.com
                </div>
                <div class="col-12 text-center pt-3 pt-sm-4 pt-md-4 pt-lg-5 pt-xl-5">
                    <h6>DEAL IT © 2020. <br>All Rights Reserved.</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF FOOTER -->
    <!-- SCROLL TOP -->
    <div class="fabtheme-scrolltop">
        <div class="fabtheme-scroll">
            <i class="fas fa-angle-up"></i>
        </div>
    </div>
    <!-- END OF SCROLL TOP -->
    <!-- JQUERY JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- WAYPOINTS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <!-- UI JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- COUNTERUP JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <!-- POPPER JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- OWL CAROUSEL JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- WOW JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <!-- MAIN JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
        
    <script src="website/js/script.js"></script>
    <!-- END OF JQUERY JS -->
</body>
</html>

<?php
    if(isset($_POST["msg"])) {
        $to = "8609.sahaana.tecomp@gmail.com";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $from = $_POST['email'];
        $msg = $_POST['message'];
        $subject = "Email from DEAL IT Website";

        $headers .= "Content-type: text/html;\r\n";
        $headers .= "From: $from";

        if (mail($to, $subject, $msg, $headers)) {
            echo "<script> alert('Email has been sent! Thank you $fname') </script>";
        }
        else {
            echo "<script> alert('ERROR ! Could not send. Try again later..') </script>";
        }
    }

    if(isset($_POST["drop1"])) {
        $title = $_SESSION["title"];
        $description = $_SESSION["description"];
        $price = $_SESSION["price"];
        $email = $_SESSION["email"];
        // echo "<script> alert ('$title') </script>";
        $sql = "DELETE FROM sellform WHERE title='$title' and description='$description' and price='$price' and email='$email'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script> alert('Succesfully Deleted Post..'); </script>";
            exit;
        }
        else {
            echo "<script> alert('ERROR! Try Again Later!'); </script>";
            exit;
        }
    }
    else if (isset($_POST["drop2"])) {
        // $mailid = $_SESSION["email"];   
        $title = $_SESSION["title"];
        $description = $_SESSION["description"];
        $price = $_SESSION["price"];         
        $uname = $_SESSION["username"];
        // $table = "$uname"."_"."$email";
        
        echo "<script> alert('$title') </script>";
        echo "<script> alert('$email') </script>";
        
        echo "<script> alert('$price') </script>";
        
        $count_uname = strlen($uname);
        $count_email = strlen($mailid);
        if ($count_email >= $count_uname) 
            $table = "$mailid"."_"."$uname";
        else 
            $table = "$uname"."_"."$mailid";
        
        // echo "<script> alert('$mailid') </script>";
        // echo "<script> alert('$table') </script>";
        $sql = "CREATE TABLE IF NOT EXISTS `$table` (ID INT(11) PRIMARY KEY NOT NULL, username VARCHAR(100), msg TEXT)";
        $result = mysqli_query($conn_, $sql);
        // header("location: chat.php");
        if ($result) {
            // echo "<script> alert('Succesfully Created Table'); </script>";
        //     // $_SESSION["email"] = $mailid;
        //     // $_SESSION["uname"] = $uname;
        //     // $_SESSION["table"] = $table;
        //     // echo "<script> alert('entered'); </script>";
        //     exit;
        }
        else { 
            echo "<script> alert('ERROR! Try Again Later!'); </script>";            
            exit;
        }
    }
?>