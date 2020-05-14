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
      body {
        background-image: url(media/cinema-invoice.jpg); 
      }
      page[size="A4"] {
        background: white;
        width: 60%;
        height: 29.7cm;
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
        #preShow($_SESSION); # take the comment out if you want to see the session
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
                $total =  "$".number_format(($STAamount + $STPamount + $STCamount + $FCAamount + $FCPamount + $FCCamount),2); 
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
           (array)$total      
        );        
        
        $myfile = fopen("bookings.txt","a"); 
        flock($myfile, LOCK_SH);  
        fputcsv($myfile, $cells);
        flock($myfile,LOCK_UN);
        fclose($myfile);
        ?>
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
      <div class = col-sm-6>
        <h4>BILLED TO</h4>
      </div>
      <div class = col-sm-6>
        <h4 style ="text-align: right">Movie Infor</h4>
      </div>
      <div class = col-sm-6>
        <?php 
        echo "Customer Name: $cells[1]";
        echo "<br>";
        echo "Email: $cells[2]";
        echo "<br>";
        echo "Phone Number: $cells[3]"; ?>
      </div>
      <div class = col-sm-6>
        <?php 
        echo "<p style = 'text-align:right'>Movie: $cells[4]</p>";

        echo "<p style = 'text-align:right'>Seating: $cells[5]</p>"; 
        ?>
      </div>
    </div>
    <br>
    <div class="container">         
      <table class="table">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
          </tr>
          <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
          </tr>
          <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</page>
</body>
</html>