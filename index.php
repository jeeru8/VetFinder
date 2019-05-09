<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="components/reset.css">
    <link rel="stylesheet" type="text/css" href="components/site.css">
    <link rel="stylesheet" type="text/css" href="components/container.css">
    <link rel="stylesheet" type="text/css" href="components/grid.css">
    <link rel="stylesheet" type="text/css" href="components/header.css">
    <link rel="stylesheet" type="text/css" href="components/image.css">
    <link rel="stylesheet" type="text/css" href="components/menu.css">
    <link rel="stylesheet" type="text/css" href="components/divider.css">
    <link rel="stylesheet" type="text/css" href="components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="components/segment.css">
    <link rel="stylesheet" type="text/css" href="components/button.css">
    <link rel="stylesheet" type="text/css" href="components/card.css">
    <link rel="stylesheet" type="text/css" href="components/label.css">
    <link rel="stylesheet" type="text/css" href="components/reveal.css">
    <link rel="stylesheet" type="text/css" href="components/rating.css">
    <link rel="stylesheet" type="text/css" href="components/popup.css">
    <link rel="stylesheet" type="text/css" href="components/dimmer.css">
    <link rel="stylesheet" type="text/css" href="components/list.css">
    <link rel="stylesheet" type="text/css" href="components/icon.css">
    <link rel="stylesheet" type="text/css" href="components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="components/transition.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="assets/library/jquery.min.js"></script>
    <script src="components/popup.js"></script>
    <script src="components/dimmer.js"></script>
    <script src="components/rating.js"></script>
    <script src="components/visibility.js"></script>
    <script src="components/sidebar.js"></script>
    <script src="components/transition.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/navbar_mod.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<div class="ui large top fixed menu">
  <div class="ui container">
    <a class="toc item"><i class="sidebar icon"></i></a>
    <div class="left menu">
      <a class="active item" href="#">Home</a>
        <a class="item" href="services.php">Services</a>
    </div>
    <div class="right menu" style="padding-top:5px;padding-bottom:5px;padding-right:30px;">
        <div class="ui large buttons">
            <a class="ui green button" href="signup.php">Signup</a>
            <div class="or"></div>
            <a class="ui blue button" href="login.php">Log in</a>
        </div>
    </div>
  </div>
</div>

<!-- Sidebar -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item" href="#">Home</a>
    <a class="item" href="services.php">Services</a>
    <a class="item" href="signup.php">Signup</a>
    <a class="item" href="login.php">Login</a>
</div>
<hr>
<hr>
<h1 class="alert alert-success" align="center">Welcome to VetFinder System</h1>

<div class="row">

  <div class="col-md-12">  
  
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="photos/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="photos/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="photos/3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
</div>

</div>

<div class="pusher" style="margin-top:3em;">
    <div class="ui vertical stripe segment" style="background-color: rgb(82,187,182);">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="eight wide column">
                    <h3 class="ui header">Pet Clinic & Vet Information Platform</h3>
                    <p>Start looking for vet clinics and veterinarians around your place.</p>
                </div>
                <div class="eight wide right floated column">
                    <img src="img/hero.gif" style="width:290px;height:380px;margin-left:4em;">
                </div>
            </div>
        </div>
    </div>

    

    <div class="ui vertical stripe segment" id="thirdpanel" style="background-color: white;">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="eight wide column">
                    <h3 class="ui header">High Class Service</h3>
                    <p>To ensure high-quality service, we make sure you only find vet clinics composed of highly skilled and professional people.</p>
                </div>
                <div class="eight wide right floated column">
                    <div class="ui segment">
                            <div class="ui green ribbon label">Walk-in</div>
                            <div class="ui red dividing header">
                                <div class="content">
                                    Vets In Practice Inc.
                                    <div class="sub header">63 Maysilo Cir, Mandaluyong, 1550 Metro Manila</div>
                                </div>
                            </div>
                            <div class="ui ordered list">
                                <div class="item" id="doctor">
                                    <img class="ui avatar image" src="img/avatar7.jpg">
                                    <div class="content">
                                        <div class="header">Dr. Arthur Magsilang</div>
                                        University of Prince Edward Island
                                    </div>
                                </div>
                                <div class="item" id="doctor">
                                    <img class="ui avatar image" src="img/avatar8.jpg">
                                    <div class="content">
                                        <div class="header">Dr. Laiza Salazar-Chua</div>
                                        De La Salle Araneta University
                                    </div>
                                </div>
                                <div class="item" id="doctor">
                                    <img class="ui avatar image" src="img/avatar16.jpg">
                                    <div class="content">
                                        <div class="header">Dr. Samantha Lazaro</div>
                                        Southwestern University PHINMA
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="ui vertical center aligned segment" id="fourthpanel" style="background-color: rgb(93,137,226);padding-bottom:0px;border-bottom:0px;">
        <div class="ui text container">
            <h2 class="ui inverted header" style="padding-top:5em;">All Our Friends Are Unique</h2>
            <h3 class="ui inverted header" style="line-height:2em;margin-bottom:0px;">There's no single type of care that will fit all pets in this world. Our talented vets are flexible and compassionate so that they will offer services that will suit the needs of your pet.</h3>
            <img src="img/sammy-husky.gif" style="width:600px;height:400px;">
        </div>
      </div>

    <div class="ui vertical center aligned segment" id="fifthpanel" style="background-color: rgb(79,131,179);padding-bottom:0px;padding-top:0px;">
        <div class="ui text container">
            <h2 class="ui inverted header" style="padding-top:5em;">Not just Cats and Dogs</h2>
            <h3 class="ui inverted header" style="line-height:2em;margin-bottom:0px;">It's not always rainy, you know? Oh, did we also say our vets are flexible? Yes, they can even accommodate roosters, lizards, hyenas, seals, whatever pet you have.</h3>
            <img src="img/rooster.gif" style="width:600px;height:400px;">
        </div>
    </div>

    <div class="ui vertical center aligned segment" id="fifthpanel" style="background-color: rgb(231,90,124);padding-bottom:0px;">
        <div class="ui text container">
            <h2 class="ui inverted header" style="padding-top:5em;">Get Started Now!</h2>
            <h3 class="ui inverted header" style="line-height:2em;margin-bottom:0px;">Your pet would definitely enjoy our service.</h3>
            <img src="img/corgi1.gif">
        </div>
    </div>

<div class="ui inverted vertical footer segment">
  <div class="ui container">
    <div class="ui stackable inverted divided equal height stackable grid">
      <div class="four wide column">
        <h4 class="ui inverted header">Sections</h4>
        <div class="ui inverted link list">
          <a href="#" class="item">Home</a>
        </div>
      </div>
      <div class="nine wide column">
        <h4 class="ui inverted header">Company Title</h4>
        <p>Some Motto right here.</p>
      </div>
    </div>
  </div>
</div>


</div>
</body>
</html>
