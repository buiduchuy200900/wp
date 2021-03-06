<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Invoice</title>
    <style>
      html {
        scroll-behavior: smooth;
      }
      body {
        background-image: url(media/cinema-invoice.jpg); 
      }
      page[size="A4"] {
        background: white;
        width: 60%;
        height: 130%;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        border: 1cm solid #000;
        float: center;
      }
      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      @media only screen and (max-width:620px) {
        .body {
          width:100%;
        }
      }
    </style>
</head>
<body>
    <?php
        session_start();
        include 'tools.php';
        #Check if the session empty or not 
        if(!isset($_SESSION)){
          header("Location: index.php");
        }        
        
        # The price of seats
                switch($_SESSION["movie"]["day"]){
                    case 'WED' :           
                      $priceSTA = 14.00;
                      $priceSTP = 12.50;
                      $priceSTC = 11.00;
                      $priceFCA = 24.00;
                      $priceFCP = 22.50;
                      $priceFCC = 21.00;
                      break;
                    case 'SAT' :
                    case 'SUN' :
                      $priceSTA = 19.80;
                      $priceSTP = 17.50;
                      $priceSTC = 15.30;
                      $priceFCA = 30.00;
                      $priceFCP = 27.00;
                      $priceFCC = 24.00; 
                      break;                                 
                    case 'FRI' :
                    case 'THU' :
                        switch ($_SESSION["movie"]["hour"]){
                            case 'T12' :
                              $priceSTA = 14.00;
                              $priceSTP = 12.50;
                              $priceSTC = 11.00;
                              $priceFCA = 24.00;
                              $priceFCP = 22.50;
                              $priceFCC = 21.00;
                              break;
                            default  :
                              $priceSTA = 19.80;
                              $priceSTP = 17.50;
                              $priceSTC = 15.30;
                              $priceFCA = 30.00;
                              $priceFCP = 27.00;
                              $priceFCC = 24.00; 
                              break;                                             
                        }
                }   
        # Seats Quantity  
                $STAQty = $_SESSION["seats"]["STA"];
                $STPQty = $_SESSION["seats"]["STP"];
                $STCQty =  $_SESSION["seats"]["STC"];
                $FCAQty = $_SESSION["seats"]["FCA"];
                $FCPQty = $_SESSION["seats"]["FCP"];
                $FCCQty = $_SESSION["seats"]["FCC"];
        # Amount 
                $STAamount = $priceSTA * $STAQty;
                $STPamount = $priceSTP * $STPQty;
                $STCamount = $priceSTC * $STCQty;
                $FCAamount = $priceFCA * $FCAQty;
                $FCPamount = $priceFCP * $FCPQty;
                $FCCamount = $priceFCC * $FCCQty;
        
        # Total     
                $subtotal =  $STAamount + $STPamount + $STCamount + $FCAamount + $FCPamount + $FCCamount;
                $subtotaldecimal ="$".number_format($subtotal,2); 
        # Add order to tab spreadsheet
        date_default_timezone_set("Asia/Bangkok");
        $now = date('d/m h:i');  
        $cells = array_merge(
          [$now],
           (array)$_SESSION["cust"]["name"],
           (array)$_SESSION["cust"]["email"],
           (array)$_SESSION["cust"]["mobile"],
           (array)$_SESSION["movie"],
           (array)$_SESSION["seats"],
           (array)$subtotaldecimal
        );        
        $myfile = fopen("bookings.csv","a"); 
        flock($myfile, LOCK_SH);  
        fputcsv($myfile, $cells);
        flock($myfile,LOCK_UN);
        fclose($myfile);
        # Check the movie tile
        if($_SESSION["movie"]["id"]=="ACT"){
          $_SESSION["movietitle"] = "END GAME";   
        };
        if($_SESSION["movie"]["id"]=="RMC"){
          $_SESSION["movietitle"] = "TOP END WEDDING"; 
        };
        if($_SESSION["movie"]["id"]=="ANM"){
          $_SESSION["movietitle"] = "DUMBO"; 
        }
        if($_SESSION["movie"]["id"]=="AHF"){
          $_SESSION["movietitle"] = "THE HAPPY PRICE"; 
        }
        ?>
<!-- Invoice form -->
<page size="A4">
  <img class ="center" src = "media/logo.png">
  <div class = "container">
    <div class = "row">
      <div class = col-sm-6>
        <h1>INVOICE</h1>
        <br>
        <div class = "row">
          <div class = "col-sm-6">
            <h5>Company:</h5>
            <p>Cinemax</p>
          </div>
          <div class = "col-sm-6">
            <h5>ABN Number:</h5>
            <p>00 123 456 789</p>
          </div>
        </div>
      </div>
      <div class = col-sm-6>
        <img class = "center" src = "media/clapper.png"; style = "height: 150px; width: 150px">
      </div>
    </div>
  </div>
  <br>
  <div class = "container">
    <div class = "row">
      <div class = "col-md-6 col-lg-8">
        <h4>BILLED TO</h4>
        <p> Customer name: <?php echo $cells[1];?> </p>
        <p> Email: <?php echo $cells[2];?> </p>
        <p> Phone Number: <?php echo $cells[3];?> </p>
      </div>
      <div class = "col-md-6 col-lg-4">
        <h4 >Movie Infor</h4>
        <p >Movie: <?php echo $_SESSION["movietitle"];?></p>
        <p >Day-Hour:<?php echo $_SESSION["movie"]["day"]. " - " . $_SESSION["movie"]["hour"];?></p>    
      </div>
    </div>
  </div>
    <br>
    <div class="container">
      <div class="table-responsive"> 
      <table class="table">
        <thead>
          <tr>
            <th>Seating</th>
            <th>Seat Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>STA</td>
            <td><?php echo $STAQty; ?> </td>
            <td><?php echo "$".number_format($STAamount,2); ?> </td>
            <td></td>
          </tr>
          <tr>
            <td>STP</td>
            <td><?php echo $STPQty; ?> </td>
            <td><?php echo "$".number_format($STPamount,2); ?> </td>       
          </tr>
          <tr>
            <td>STC</td>
            <td><?php echo $STCQty; ?> </td>
            <td><?php echo "$".number_format($STCamount,2); ?> </td>
          </tr>
          <tr>
            <td>FCA</td>
            <td><?php echo $FCAQty; ?> </td>
            <td><?php echo "$".number_format($FCAamount,2); ?> </td>
          </tr>
          <tr>
            <td>FCP</td>
            <td><?php echo $FCPQty; ?> </td>
            <td><?php echo "$".number_format($FCPamount,2); ?> </td>
          </tr>
          <tr>
            <td>FCC</td>
            <td><?php echo $FCCQty; ?> </td>
            <td><?php echo "$".number_format($FCCamount,2); ?> </td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <div id = "total">     
        <?php
        $VAT = "$".number_format(($subtotal *10/100),2);
        $total = "$".number_format((($subtotal *10/100) + $subtotal),2);
        echo "<h5 style = 'text-align: right; margin-right: 14px'>VAT:$VAT</h5> ";
        echo "<h5 style = 'text-align: right; margin-right: 14px'>Sub Total: $subtotaldecimal</h5>";
        echo "<h5 style = 'text-align: right; margin-right: 14px'>Total: $total</h5>";
        ?>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-4">
          <div class="text-center">
            <a href = "index.php" ><button  type="button" class="btn btn-outline-danger">Return</button></a>
          </div>
        </div>
        <div class="col-4">
          <div class="text-center">
            <a href = "ticket.php" ><button  type="button" class="btn btn-outline-danger">Confirm</button></a>
          </div>
        </div>
    </div>
    <!-- preShow($_SESSION);  take the comment out if you want to see the session -->
</page>
