<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Tie-Dye</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

<link rel="stylesheet" type="text/css" href='css/main.css'>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Brawler" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php include("navbar.php");
include("devilselbowartconnectionremote.php");
//include("connectdevilselbowart.php");
include("snipcart.js");

?>
</head>

<body>

<?php 
$query = "SELECT items.item_id, items.description, items.sale_price, artists.first_name, artists.last_name, items.image FROM items
	
	LEFT JOIN artists
	ON items.artist_id=artists.artist_id
	WHERE items.category_id=1
	AND items.active=1
	ORDER BY items.item_id DESC";

$result= mysqli_query($link,$query);

$i=0;
echo "<div class='row'>";
foreach($result as $row) {
	
	?>
	<section class='container'>
	<section class='catalog'>
	<div class='row'>
	<figure class='col-sm-4'>

	<?php echo "<img src=\"{$row['image']}\" />";?>

	<p>Description: <?php echo $row['description'];?>	
	<br />
	Price: $ <?php echo $row['sale_price'];?>
	<br />
	Artist: <?php echo $row['first_name'] . " " . $row['last_name'];?>
	<br />
	</p>
	
	
	<!-- <button
    class="snipcart-add-item"
    data-item-id="<?php echo $row['item_id'];?>"
    data-item-name="<?php echo $row['description'];?>"
    data-item-price="<?php echo $row['sale_price']; ?>"
    data-item-weight="20"
    data-item-url="/shop.php"
    data-item-max-quantity="1"
    data-item-description="<?php echo $row['first_name'] . " " . $row['last_name'];?>">
        Purchase
</button> -->
	</figure>
	
<?php
$i++;
if ($i%3 == 0) echo "</div><div class='row'>";

} 
mysqli_close($link);

?>
</div>
</section>
</section>
</body>
<?php include("footer.php"); ?>
</html>