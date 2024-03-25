<?php 
include ("db.php");
$pagename="A smart buy for a smart home";      
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
echo "<body>"; 
include ("headfile.html");     
echo "<h4>".$pagename."</h4>";   

$prodId = $_GET['u_prod_id'];
echo "<p>Selected product Id: ".$prodId;

$SQL="SELECT prodId, prodName, prodPicNameSmall, prodDescripLong, prodPrice, prodQuantity FROM Product WHERE prodId = $prodId";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p><h3>".$arrayp['prodDescripLong']."</h3>";
echo "<p><h3>$ " . $arrayp['prodPrice'] . "</h3></p>";
echo "<p><h3>Left in stock " . $arrayp['prodQuantity'] . "</h3></p>";
echo "<p>Number to be purchased: "; 
//create form made of one text field and one button for user to enter quantity 
//the value entered in the form will be posted to the basket.php to be processed 
echo "<form action=basket.php method=post>"; 
echo "<select name='quantity'>";
// Loop to create options from 1 to the stock level
for ($i = 1; $i <= $arrayp['prodQuantity']; $i++) {
    echo "<option name=quantity value='$i'>$i</option>";
}
echo "</select>";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>"; 
//pass the product id to the next page basket.php as a hidden value 
echo "<input type=hidden name=h_prodid value=".$prodId.">"; 
echo "</form>"; 
echo "</p>"; 
echo "</td>";
echo "</tr>";
}
echo "</table>";

//Call in stylesheet 
//display name of the page as window title 
//include header layout file  
//display name of the page on the web page 
//display random text 

include("footfile.html");     
echo "</body>"; 
?> 