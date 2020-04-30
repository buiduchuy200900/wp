function Exit(Which_synopsis) {
    var synopsis =document.getElementById(Which_synopsis)
     var booking_area=document.getElementById('Booking_Area')
    synopsis.style.display ="none"
    booking_area.style.display ="none"
    location.href="#Now_Showing"
 }
 
 
 function showsynopsis(Which_synopsis){
     var synopsis=document.getElementById(Which_synopsis)  
         synopsis.style.display = "block"
         location.href="#"+Which_synopsis;
 }
 
 function showbookingform(){
     var booking_area = document.getElementById('Booking_Area')
         booking_area.style.display = "block" 
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
     var STDAdult = document.getElementById("seats-STA").value
     var STDConcess = document.getElementById("seats-STP").value
     var total = Number(STDAdult)*14.00 + Number(STDConcess)*12.50
     document.getElementById("total").innerHTML = total
     console.log("hi")
 }