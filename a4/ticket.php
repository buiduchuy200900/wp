<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='style.css' type='text/css' />
  <title>Ticket</title>

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
  </head>
  <body>
    <!-- Welcome text -->
    <div class="container mt-5">
        <div class="jumbotron">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 class="display-4">Here is your ticket </h1>
                    <hr style="border: 2px solid">
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start();
    ?>
    <!-- Ticket section -->
    <?php
     #Show only ticket that got values > 0
     foreach($_SESSION["seats"] as $key => $value){
      if ($_SESSION["seats"][$key]>0){
          $movieseat[$key]= $value;
      }
    } 
    ?>   
    <!-- Show the ticket -->
    <?php 
    foreach($movieseat as $seat => $seatQty) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <section id="ticket">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-header" style="border: solid;background-color:gold">
                <h2 style="text-align:center;color:red">THE CINEMAX TICKET</h2>
              </div>
              <div class="card-body"  style="border:solid;background-color:gold;">
                <div class="row">
                  <div class="col-4" style="border:2px gray solid">
                    <img src="media/logo.png" class="img-fluid">
                    <h1 style="text-align: center;font-family:serif;font-size:80px"><?php echo $seatQty ?></h1>
                    <h1 style="text-align: center;font-family:serif;"; class="mt-5"><em><?php echo $seat ?></em></h1>
                  </div>
                  <div class="col-8" style="border:2px gray solid">
                    <p style="color:slategrey"> Name </p>
                    <h4><?php echo $_SESSION["cust"]["name"] ?></h4>
                    <p style="color:slategrey"> Movie </p>
                    <h4><?php echo $_SESSION["movietitle"]?></h4>
                    <p style="color:slategrey"> Time</p>
                    <h4><?php echo $_SESSION["movie"]["day"] . " and ". $_SESSION["movie"]["hour"]?></h4>
                    <p style="color:slategrey"><?php echo $seat ?></p>
                    <h4><?php echo $seatQty ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </body>
    </html>
    <?php }
    ?>
  </body>