<?php
	$yourName = "Bill Barber";

	$number1 = 17;
	$number2 = 32;
	$total = $number1 + $number2;


?>

</!DOCTYPE html>
<html>
<head>
	<title>PHP Basics</title>
    <style>
        body {
            color: white;
            background-color: black;
        }
        h1, h2 {text-align: center;}
    </style>
</head>
<body>
	<h1>PHP Basics</h1>
	<?php echo "<h2>$yourName</h2>"; ?>
    <p>A Javascript array built and output with PHP: [<span id="phpArray"></span>]</p>
	<script>
        <?php echo "var array= ['PHP', ' HTML', ' JavaScript'];
		document.getElementById('phpArray').innerHTML = array;"; ?>
	</script>

    <?php echo "<p>The sum of ".$number1." + ".$number2." is ".$total."</p>"; ?>


</body>
</html>

