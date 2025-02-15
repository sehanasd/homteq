<?php
include ("db.php"); //include db.php file to connect to DB


$pagename="A smart buy for a smart home"; //create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;

//create a $SQL variable and populate it with a SQL statement that retrieves product details

$SQL="SELECT prodId,prodName,prodPicNameLarge,prodDescripLong,prodPrice,prodQuantity FROM product where prodId = ".$prodid;

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

echo "<img src=images/".$arrayp['prodPicNameLarge']." height=400 width=400>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripLong'];
echo "<p>< &pound;".$arrayp['prodPrice'];
echo "<p>Number in stock: ".$arrayp['prodQuantity'];
echo "</td>";
echo "</tr>";

}

echo "</table>";
echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
echo "</p>";

include ("footfile.html");
echo "</body>";

?>