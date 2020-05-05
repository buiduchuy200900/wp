
 function change_nav_synopsis(Which_nav_synopsis){
    document.getElementById("nav_synopsis").href  = Which_nav_synopsis   
 }
 
 function showsynopsis(Which_synopsis){ 
    var synopsis=document.getElementById(Which_synopsis) 
    var endgame = document.getElementById("EG_SynopsisACT")
    var TEW = document.getElementById("TEW_SynopsisRMC")
    var DB = document.getElementById("DUMBO_SynopsisANM")
    var THP = document.getElementById("THP_SynopsisAHF")
    
    console.log(endgame.style.display);
    if (endgame.style.display != "none") { 
        endgame.style.display = "none" 
        synopsis.style.display = "block" 
        location.href="#"+Which_synopsis
    }  
    else if (TEW.style.display == "block"){
        TEW.style.display = "none"
        synopsis.style.display = "block"
        location.href="#"+Which_synopsis
    }
    else if (DB.style.display == "block"){
        DB.style.display = "none"
        synopsis.style.display = "block"
        location.href= "#"+ Which_synopsis
    }
    else if (THP.style.display == "block"){
        THP.style.display = "none"
        synopsis.style.display = "block"
        location.href = "#" + Which_synopsis
    }   
 }
 
 function showbookingform(){
     location.href="#Booking_Area"
         
 }
 function pickmovie(Which_title){
     var movietitle = document.getElementById("movietitle")
     movietitle.innerHTML= Which_title
 }
 
 function pickdaytime(Which_Day_Time){
      document.getElementById("daytime").innerHTML = Which_Day_Time
 }
 
 function setmin(){
     var currentdate= new Date();
     var month = (currentdate.getMonth() +1);
     if (month <10){
         month="0"+ month.toString()
     }
     else{
         month=month.toString()
     }
 
     var year = (currentdate.getFullYear()).toString();
     document.getElementById("cust-expiry").min = year+"-"+month
     console.log("hello")
     
 }
 
 function counttotal(){
     document.getElementById("123").innerHTML = priceSTA.toString()
 }
 
 
 
 function caculateTotal(){
     switch (document.getElementById("movie-day").value){
         case 'MON' :
         case 'TUE' :
         case 'WED' :           
             var priceSTA = 14.00;
             var priceSTP = 12.50;
             var priceSTC = 11.00;
             var priceFCA = 24.00;
             var priceFCP = 22.50;
             var priceFCC = 21.00;
             break;
         case 'SAT' :
         case 'SUN' :
             var priceSTA = 19.80;
             var priceSTP = 17.50;
             var priceSTC = 15.30;
             var priceFCA = 30.00;
             var priceFCP = 27.00;
             var priceFCC = 24.00; 
             break;                                 
         case 'FRI' :
         case 'THU' :
             switch (document.getElementById("movie-hour").value){
                 case 'T12' :
                     var priceSTA = 14.00;
                     var priceSTP = 12.50;
                     var priceSTC = 11.00;
                     var priceFCA = 24.00;
                     var priceFCP = 22.50
                     var priceFCC = 21.00;
                     break;
                 default  :
                     var priceSTA = 19.80;
                     var priceSTP = 17.50;
                     var priceSTC = 15.30;
                     var priceFCA = 30.00;
                     var priceFCP = 27.00;
                     var priceFCC = 24.00; 
                     break;                 
             }
     }
     var STDAdult = document.getElementById("seats-STA").value
     var STDConcess = document.getElementById("seats-STP").value
     var STDChildren = document.getElementById("seats-STC").value 
     var FCAdult = document.getElementById("seats-FCA").value
     var FCConcess = document.getElementById("seats-FCP").value
     var FCChildren = document.getElementById("seats-FCC").value
     var total = Number(STDAdult)*priceSTA + Number(STDConcess)*priceSTP+ Number(STDChildren)*priceSTC + Number(FCAdult)*priceFCA + Number(FCConcess)*priceFCP + Number(FCChildren)*priceFCC
     document.getElementById("total").innerHTML = "$"+ total.toFixed(2).toString() 
     
 }
 
 
 var STDAdult = document.getElementById("seats-STA").value
 var STDConcess = document.getElementById("seats-STP").value
 var total = Number(STDAdult)*14.00 + Number(STDConcess)*12.50
 document.getElementById("total").innerHTML = total
 
 
 function update_hiddenfield(Movie_ID,Movie_Day,Movie_Hour){
     var hidden_ID = document.getElementById("movie-id")
     var hidden_Day = document.getElementById("movie-day")
     var hidden_Hour = document.getElementById("movie-hour")
     hidden_ID.value= Movie_ID
     hidden_Day.value = Movie_Day
     hidden_Hour.value = Movie_Hour
 }