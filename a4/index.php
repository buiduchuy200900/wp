<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='style.css' type='text/css' />
  <title>Assignment 4</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="../style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='../wireframe.js'></script>
  <script defer src="tools.js"></script>
    <style>
    .error {color: #FF0000;}
    </style>
    <?php 
    include 'tools.php';
    session_start();
    $errorFound = 0;    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      # Check if movie,day,hour is chosen or not 
      if(empty($_POST["movie"]["day"])){
        $errorFound ++;
      }
      if(empty($_POST["movie"]["hour"])){
        $errorFound ++;
      }
      if(empty($_POST["movie"]["id"])){
        $errorFound ++;
      }
      # Check if the name is right or wrong
      if (empty($_POST["cust"]["name"])) {
        $nameErr = "Name is required";
        $errorFound ++;
      } else {
        $name = test_input($_POST["cust"]["name"]);
          if (!preg_match("/^[a-zA-Z\-.' ]{1,100}$/", $name)){
          $nameErr = "Only letter,spaces and punctuation chars are allowed ";
          $errorFound ++;
        }
      }
      # Check if type email is correct
      if (empty($_POST["cust"]["email"])) {
        $emailErr = "Email is required";
        $errorFound++;
      } else {
        $email = test_input($_POST["cust"]["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $emailErr = "Invalid email format";
           $errorFound++;
        }
      }
      # Check if cust mobile is Australian number
      if (empty($_POST["cust"]["mobile"])) {
        $mobileErr = "Mobile is required";
        $errorFound ++;
      } else {
        $mobile = test_input($_POST["cust"]["mobile"]);
          if (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $mobile)){
          $mobileErr = "Only Australian number";
          $errorFound ++;
        }
      }
      # Check if cust card between 14-19
      if (empty($_POST["cust"]["card"])) {
        $cardErr = "Card is required";
        $errorFound ++;
      } else {
        $card = test_input($_POST["cust"]["card"]);
          if (!preg_match("/^( ?\d){14,19}$/", $card)){
          $cardErr = "Digits number must between 14-19";
          $errorFound ++;
        }
      }
      #Check if the expiry within a month 
      if(empty($_POST["cust"]["expiry"])){
        $expiryErr = "Expiry is required";
        $errorFound ++;
      } else {
          $array = (explode('-',$_POST["cust"]["expiry"]));
          $year = date("Y");
          $month = date("m") +1;
          if($array[0] < $year){
            $expiryErr = "Expiry date cannot be within a month of the purchase date";
            $errorFound ++;
          }
          elseif($array[0] == $year){
            if ($array[1]< $month){
              $expiryErr = "Expiry date cannot be within a month of the purchase date";
              $errorFound ++;
            }
          }
        }
      #if the customer is not choosing any seats, stay at the index page.
      if($_POST["hidden"]["total"] ==  "0.00") 
        $errorFound ++;
      # if all ok , go to receipt.php
      if ($errorFound == 0){
        foreach($_POST as $key => $value){    
          foreach($value as $key1 => $value1){           
            $_SESSION[$key][$key1] = $_POST[$key][$key1];                
          }
        };
        header("Location: receipt.php");    
      }
    }

  ?> 
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <!--Navigation Bar-->
  <header>
    <a href="index.php"><img src="media/logo.png" class="center"></a>
  </header>
  <nav class="navbar navbar-expand-sm navbar-dark sticky-top">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#About_Us">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Prices">Prices</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Now Showing
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#Now_Showing">Now Showing</a>
          <a class="dropdown-item" id="nav_synopsis" href="#EG_SynopsisACT">Synopsis Area</a>
          <a class="dropdown-item" href="#Booking_Area">Booking Area</a>
        </div>
      </li>
    </ul>
  </nav>

  <main>

    <!--About us section-->
    <article>
      <div class="parallax"></div>
      <section id="About_Us">
        <div style="height:600px">
          <h1>ABOUT US</h1>
          <div class="container">
            <div class="row">
              <div class="col">
                <img src="media/Standard_seat.png" class="center">
                <h3>Standard Seat</h3>
                <ul>
                  <li>
                    <p>Comfortable</p>
                  </li>
                  <li>
                    <p>Good Elastic Material</p>
                  </li>
                  <li>
                    <p>Anti Back Fatigue</p>
                  </li>
                </ul>
              </div>
              <div class="col">
                <img src="media/First_class.png" class="center">
                <h3>First Class Seat</h3>
                <ul>
                  <li>
                    <p>Reclinable</p>
                  </li>
                  <li>
                    <p>More Personal Space</p>
                  </li>
                  <li>
                    <p>Serving Wine, Coffee and Beer</p>
                  </li>
                </ul>
              </div>
              <div class="col">
                <img src="media/3D_speaker.png" class="center">
                <h3>Sound System</h3>
                <ul>
                  <li>
                    <p>Upgraded with 3D Dolby Vision projection and Dolby Atmos sound</p>
                  </li>
                  <li>
                    <p>Enable sound to move anywhere in the theater</p>
                  </li>
                  <li>
                    <p>Your cinematic experience would be truer to life</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>

    <!--Prices section-->
    <article>
      <section id="Prices">
        <h1>PRICES</h1>
        <div class="container mt-5 mr-2">
          <table>
            <tr>
              <th>Seat Type</th>
              <th>Seat Code</th>
              <th>All day Monday and Wednesday AND 12pm on Weekdays</th>
              <th>All other times</th>
            </tr>
            <tr>
              <td>Standard Adult</td>
              <td>STA</td>
              <td>14.00</td>
              <td>19.80</td>
            </tr>
            <tr>
              <td>Standard Concession</td>
              <td>STP</td>
              <td>12.50</td>
              <td>17.50</td>
            </tr>
            <tr>
              <td>Standard Child</td>
              <td>STC</td>
              <td>11.00</td>
              <td>15.30</td>
            </tr>
            <tr>
              <td>First Class Adult</td>
              <td>FCA</td>
              <td>24.00</td>
              <td>30.00</td>
            </tr>
            <tr>
              <td>First Class Concession</td>
              <td>FCP</td>
              <td>22.50</td>
              <td>27.00</td>
            </tr>
            <tr>
              <td>First Class Child</td>
              <td>FCC</td>
              <td>21.00</td>
              <td>24.00</td>
            </tr>
          </table>
        </div>
        <!--Now showing section-->
      </section>
    </article>
    <!--Endgame panel-->
    <article>
      <section id="Now_Showing">
        <h1>NOW SHOWING</h1>
        <div class="container mt-5">
          <div class="row">
            <div class="col" onclick="showsynopsis('EG_SynopsisACT');change_nav_synopsis('#EG_SynopsisACT')" >
              <div class="card" style="border:solid 7px red  ">
                <div class="row">
                  <div class="col-md-5 ">
                    <img src="media/endgame.jpg" alt="endgame" width="223" height="364">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"> END GAME &nbsp&nbsp&nbsp&nbsp PG-13</h5>
                      <p class="card-text" style="margin-top: 50px">Wednesday-9pm</p>
                      <p class="card-text">Thursday-9pm</p>
                      <p class="card-text">Friday-9pm</p>
                      <p class="card-text">Saturday - 6pm</p>
                      <p class="card-text">Sunday - 6pm</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--Endtopwedding panel -->
            </div>
            <div class="col" onclick="showsynopsis('TEW_SynopsisRMC');change_nav_synopsis('#TEW_SynopsisRMC')" >
              <div class="card" style="border:solid 7px black ">
                <div class="row">
                  <div class="col-md-5 ">
                    <img src="media/topendwedding.jpg" alt="endgame" width="223" height="364">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"> TOP END WEDDING &nbsp&nbsp&nbsp&nbsp NR</h5>
                      <p class="card-text" style="margin-top: 50px">Monday - 6pm</p>
                      <p class="card-text">Tuesday - 6pm</p>
                      <p class="card-text">Saturday - 3pm</p>
                      <p class="card-text">Sunday - 3pm</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Dumbo panel-->
          <div class="row mt-5">
            <div class="col" onclick="showsynopsis('DUMBO_SynopsisANM');change_nav_synopsis('#DUMBO_SynopsisANM')">
              <div class="card" style="border:solid 7px blue ">
                <div class="row">
                  <div class="col-md-5 ">
                    <img src="media/dumbo.jpg" alt="endgame" width="223" height="364">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"> DUMBO &nbsp&nbsp&nbsp&nbsp PG</h5>
                      <p class="card-text">Monday - 12pm</p>
                      <p class="card-text">Tuesday - 12pm</p>
                      <p class="card-text">Wednesday - 6pm</p>
                      <p class="card-text">Thursday - 6pm</p>
                      <p class="card-text">Friday - 6pm</p>
                      <p class="card-text">Saturday - 12pm</p>
                      <p class="card-text">Sunday - 12pm</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--Thehappyprince panel-->
            </div>
            <div class="col" onclick="showsynopsis('THP_SynopsisAHF');change_nav_synopsis('#THP_SynopsisAHF')" ;>
              <div class="card" style="border:solid 7px orange ">
                <div class="row">
                  <div class="col-md-5 ">
                    <img src="media/thehappyprince.jpg" alt="endgame" width="223" height="364">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title"> THE HAPPY PRINCE &nbsp&nbsp&nbsp&nbsp R</h5>
                      <p class="card-text" style="margin-top: 50px">Wednesday - 12pm</p>
                      <p class="card-text">Thursday - 12pm</p>
                      <p class="card-text">Friday - 12pm</p>
                      <p class="card-text">Saturday - 9pm</p>
                      <p class="card-text">Sunday - 9pm</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>
    <!--END GAME SYNOPSIS section-->
    <section id="EG_SynopsisACT">
      <h1 >SYNOPSIS AREA</h1>
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class=col>
            <div class="card" style="border: solid">
              <div class=row>
                <div class="col-md-4">
                  <div class="card-body" style="text-align: center;">
                    <h5 class="card-title"> END GAME </h5>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card-body">
                    <h5 class="card-title">PG-13</h5>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-6" style="margin: 0px;">
                  <div class="card-body" style="border:solid 2px; margin:10px">
                    <h6 class="card-title">Plot description</h5>
                      <p class="card-text">After the devastating events of Avengers: Infinity War
                        (2018), the universe
                        is in ruins. With the help of remaining allies, the Avengers assemble once more in order to
                        reverse Thanos' actions and restore balance to the universe.
                        <br>
                        After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to
                        the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must
                        assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no
                        matter what consequences may be in store, and no matter who they face...</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <iframe width="500" height="315" src="https://www.youtube.com/embed/hA6hldpSTF8" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-3">
                  <div class="card-body" style="text-align:center;">
                    <h5 class="card-title">Make a Booking:</h5>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('END GAME');pickdaytime('WEDNESDAY-9PM');update_hiddenfield('ACT','WED','T21');caculateTotal()">Wednesday-9pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('END GAME');pickdaytime('THURSDAY-9PM');update_hiddenfield('ACT','THU','T21');caculateTotal()">Thursday
                      - 9pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('END GAME');pickdaytime('FRIDAY-9PM');update_hiddenfield('ACT','FRI','T21');caculateTotal()">Friday
                      - 9pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('END GAME');pickdaytime('SATURDAY-6PM');update_hiddenfield('ACT','SAT','T18');caculateTotal()">Saturday
                      - 6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('END GAME');pickdaytime('SUNDAY-6PM');update_hiddenfield('ACT','SUN','T18');caculateTotal()">Sunday
                      - 6pm</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!--TOP END WEDDING SYNOPSIS-->
    <section id="TEW_SynopsisRMC">
      <h1 style="color: red">SYNOPSIS AREA </h1>
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class=col>
            <div class="card" style="border: solid">
              <div class=row>
                <div class="col-md-4">
                  <div class="card-body" style="text-align: center;">
                    <h5 class="card-title"> TOP END WEDDING </h5>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card-body">
                    <h5 class="card-title">NR</h5>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-6" style="margin: 0px;">
                  <div class="card-body" style="border:solid 2px; margin:10px">
                    <h6 class="card-title">Plot description</h5>
                      <p class="card-text">                   
                        Top End Wedding begins in 1976 on the Tiwi Islands. Aboriginal lawyer Lauren from Sydney is
                        engaged to fellow lawyer and Englishman Ned. Lauren returns to Darwin to organise a surprise
                        wedding for her Aboriginal mother and white father.

                        But her mother Daffy has mysteriously disappeared, leaving a cryptic note and her mobile phone,
                        while father Trevor is making a habit of spending time alone.

                        Lauren and Ned have only 10 days to follow her faint trail and find her somewhere in the remote
                        far north of Australia and to pull off their wedding amid the chaos.

                        Top End Wedding is a charming and funny cross-cultural romantic comedy which deals with love and
                        family and second chances.
                      </p>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <iframe width="500" height="315" src="https://www.youtube.com/embed/uoDBvGF9pPU" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-3">
                  <div class="card-body" style="text-align:center;">
                    <h5 class="card-title">Make a Booking:</h5>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('TOP END WEDDING');pickdaytime('MONDAY-6PM');update_hiddenfield('RMC','MON','T18');caculateTotal()">Monday-6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('TOP END WEDDING');pickdaytime('TUESDAY-6PM');update_hiddenfield('RMC','TUE','T18');caculateTotal()">Tuesday
                      - 6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('TOP END WEDDING');pickdaytime('SATURDAY-3PM');update_hiddenfield('RMC','SAT','T15');caculateTotal()">Saturday
                      - 3pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('TOP END WEDDING');pickdaytime('SUNDAY-3PM');update_hiddenfield('RMC','SUN','T15');caculateTotal()">Sunday
                      - 3pm</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--DUMBO SYNOPSIS-->
    <section id="DUMBO_SynopsisANM">
      <h1 style="color: rgb(61, 6, 6);">SYNOPSIS AREA </h1>
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class=col>
            <div class="card" style="border: solid">
              <div class=row>
                <div class="col-md-4">
                  <div class="card-body" style="text-align: center;">
                    <h5 class="card-title"> DUMBO</h5>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card-body">
                    <h5 class="card-title">PG</h5>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-6" style="margin: 0px;">
                  <div class="card-body" style="border:solid 2px; margin:10px">
                    <h6 class="card-title">Plot description</h5>
                      <p class="card-text">
                        Circus owner Max Medici (Danny DeVito) enlists former star Holt Farrier (Colin Farrell) and his
                        children Milly (Nico Parker)
                        and Joe (Finley Hobbins) to care for a newborn elephant whose oversized ears make him a
                        laughingstock in an already struggling circus
                        . But when they discover that Dumbo can fly, the circus makes an incredible comeback, attracting
                        persuasive entrepreneur V.A. Vandevere (Michael Keaton),
                        who recruits the peculiar pachyderm for his newest, larger-than-life entertainment venture,
                        Dreamland. Dumbo soars to new heights alongside a charming and spectacular aerial artist,
                        Colette Marchant (Eva Green), until Holt learns that beneath its shiny veneer, Dreamland is full
                        of dark secrets.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <iframe width="500" height="315" src="https://www.youtube.com/embed/7NiYVoqBt-8" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-3">
                  <div class="card-body" style="text-align:center;">
                    <h5 class="card-title">Make a Booking:</h5>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('MONDAY-12PM');update_hiddenfield('ANM','MON','T12');caculateTotal()">Monday-12pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('TUESDAY-12PM');update_hiddenfield('ANM','TUE','T12');caculateTotal()">Tuesday
                      - 12pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('WEDNESDAY-6PM');update_hiddenfield('ANM','WED','T18');caculateTotal()">Wednesday
                      - 6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('THURSDAY-6PM');update_hiddenfield('ANM','THU','T18');caculateTotal()">Thursday-6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('FRIDAY-6PM');update_hiddenfield('ANM','FRI','T18');caculateTotal()">Friday
                      - 6pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('SATURDAY-12PM');update_hiddenfield('ANM','SAT','T12');caculateTotal()">Saturday-12pm</button>
                    <button type="button" class="btn btn-primary" style="margin-top:5px"
                      onclick="showbookingform();pickmovie('DUMBO');pickdaytime('SUNDAY-12PM');update_hiddenfield('ANM','SUN','T12');caculateTotal();">Sunday
                      - 12pm</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--THE HAPPY PRINCE SYNOPSIS-->
    <section id="THP_SynopsisAHF">
      <h1 style="color: red;">SYNOPSIS AREA</h1>
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class=col>
            <div class="card" style="border: solid">
              <div class=row>
                <div class="col-md-4">
                  <div class="card-body" style="text-align: center;">
                    <h5 class="card-title"> THE HAPPY PRINCE </h5>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card-body">
                    <h5 class="card-title">R</h5>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-6" style="margin: 0px;">
                  <div class="card-body" style="border:solid 2px; margin:10px">
                    <h6 class="card-title">Plot description</h5>
                      <p class="card-text">In a cheap Parisian hotel room Oscar Wilde lies on his death bed and the past
                        floods back, transporting him to other times and places. Was he once the most famous man in
                        London? The artist crucified
                        by a society that once worshiped him? The lover imprisoned and freed, yet still running towards
                        ruin in the final chapter
                        of his life? Under the microscope of death he reviews the failed attempt to reconcile with his
                        long suffering wife Constance,
                        the ensuing reprisal of his fatal love affair with Lord Alfred Douglas and the warmth and
                        devotion of Robbie Ross who tried
                        and failed to save him from himself. From Dieppe to Naples to Paris freedom is elusive and Oscar
                        is a penniless vagabond,
                        always moving on, shunned by his old acquaintances, but revered by a strange group of outlaws
                        and urchins to whom
                        he tells the old stories - his incomparable wit still sharp.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <iframe width="500" height="315" src="https://www.youtube.com/embed/4HmN9r1Fcr8" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class=row>
                <div class="col-md-3">
                  <div class="card-body" style="text-align:center;">
                    <h5 class="card-title">Make a Booking:</h5>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('THE HAPPY PRICE');pickdaytime('WEDNEDSAY-12PM');update_hiddenfield('AHF','WED','T12');caculateTotal()">Wednesday-12pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('THE HAPPY PRICE');pickdaytime('THURSDAY-12PM');update_hiddenfield('AHF','THU','T12');caculateTotal()">Thursday-12pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('THE HAPPY PRICE');pickdaytime('FRIDAY-12PM');update_hiddenfield('AHF','FRI','T12');caculateTotal()">Friday-12pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('THE HAPPY PRICE');pickdaytime('SATURDAY-9PM');update_hiddenfield('AHF','SAT','T21');caculateTotal()">Saturday
                      - 9pm</button>
                    <button type="button" class="btn btn-primary"
                      onclick="showbookingform();pickmovie('THE HAPPY PRICE');pickdaytime('SUNDAY-9PM');update_hiddenfield('AHF','SUN','T21');caculateTotal()">Sunday
                      - 9pm</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--Booking Form section-->
    <section id="Booking_Area">
      <h1 style="text-align: center;">BOOKING FORM</h1>
      <form action="index.php" method="post">
        <div class="container mt-5">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="row">
                  <div class="col-md-4">
                    <h3 id="movietitle"></h3>
                  </div>
                  <div class="col-md-4">
                    <h3 id="daytime"></h3>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">Standard</div>
                      <div class="card-body">
                        <!-- BOOKING Data-->
                        <div class="form-group">
                          <label for="seats-STA" style="margin-right:140px;"> Adults</label>
                          <select name="seats[STA]" id="seats-STA" onblur="caculateTotal()" required > 
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="seats-STA" style="margin-right:100px">Concession</label>
                          <select name="seats[STP]" id="seats-STP" onblur="caculateTotal()" required>
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="seats-STC" style="margin-right:123px">Children</label>
                          <select name="seats[STC]" id="seats-STC" onblur="caculateTotal()" required>
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="card mt-5">
                      <div class="card-header">First Class</div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="seats-FCA" style="margin-right:140px;"> Adults</label>
                          <select name="seats[FCA]" id="seats-FCA" onblur="caculateTotal()" required>
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="seats-FCP" style="margin-right:100px">Concession</label>
                          <select name="seats[FCP]" id="seats-FCP" onblur="caculateTotal()" required>
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="seats-FCC" style="margin-right:123px">Children</label>
                          <select name="seats[FCC]" id="seats-FCC" onblur="caculateTotal()" required>
                            <option value="0">Please select</option>
                            <option value="0"></option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                          </select>
                        </div>

                      </div>
                    </div>
                    <div class="form-group mt-5 ml-5">
                      <label for="">Total </label>
                      <output name="total" id="total"></output>
                      <input name="hidden[total]" id="hidden-total" style="display:none">
                    </div>
                  </div>
                  <!--HIDDEN DATA-->
                  <div class="col-md-1">
                    <div class="form-group" style="display:none">
                      <label for="movie-id">Movie ID</label>
                      <input type="hidden" name="movie[id]" id="movie-id">
                    </div>
                    <div class="form-group" style="display:none">
                      <lable for="movie-day">Moive Day</lable>
                      <input type="hidden" name="movie[day]" id="movie-day">
                    </div>
                    <div class="form-group" style="display:none">
                      <lable for="movie-hour">Moive Hour</lable>
                      <input type="hidden" name="movie[hour]" id="movie-hour">
                    </div>
                  </div>
                  <!--PERSONAL DATA-->
                  <div class="col-md-5">
                    <div class="card">
                      <div class="card-header">Personal Data</div>
                      <div class="card-body">
                        <div class="col" style="margin-top: 30px">
                          <div class="form-group">
                            <label for="cust-name" style="margin-right:42px">Name</label>
                            <input type="text" name="cust[name]" id="cust-name" value="<?php echo $_POST["cust"]["name"]?>">
                            <div class="error">* <?php echo $nameErr;?></div>
                          </div>
                          <div class="form-group">
                            <label for="cust-email" style="margin-right:45px">Email</label>
                            <input type="email" name="cust[email]" id="cust-email" value="<?php echo $_POST["cust"]["email"]?>">
                            <div class="error">* <?php echo $emailErr;?></div>
                          </div>
                          <div class="form-group">
                            <label for="cust-mobile" style="margin-right:35px">Mobile</label>
                            <input type="tel" name="cust[mobile]" id="cust-mobile" value="<?php echo $_POST["cust"]["mobile"]?>">
                            <div class="error">* <?php echo $mobileErr;?></div>

                          </div>
                          <div class="form-group">
                            <label for="cust-card">Credit Card</label>
                            <input type="text" name="cust[card]" id="cust-card" value="<?php echo $_POST["cust"]["card"]?>">
                            <div class="error">* <?php echo $cardErr;?></div>
                          </div>
                          <div class="form-group">
                            <label for="cust-expiry" style="margin-right:35px">Expiry</label>
                            <input type="month" name="cust[expiry]" id="cust-expiry" value="<?php echo $_POST["cust"]["expiry"]?>">
                            <div class="error">* <?php echo $expiryErr;?></div>
                          </div>
                          <div style="float:right">
                            <button style="width:100px" type="submit" id="order">Order</button>
                           
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
      </form>


    </section>

  </main>

  <footer>
    <div>&copy;
      <script>
        document.write(new Date().getFullYear());
      </script>
      <p>GROUP 6</p>
      <p>Bui Duc Huy - s3817842</p>
      <p>Nguyen Quoc Huy- s3818764</p>
      <p>Last date modified: 15/5/2020</p>
      <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.</div>
    <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer>
  <?php
          preShow($_POST);
          preShow($_SESSION);
          printmycode();
      ?>

</body>

</html>