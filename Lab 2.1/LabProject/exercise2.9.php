<html>
<head>
	<title>Exercise 2.9</title>
</head>
<body>
	
		 <!-- if(isset($_POST['submit'])){ -->
			Hello, <?php print($_POST['name']); ?>
			<br>
			You are studying at <?php print($_POST['class']);?>, <?php print($_POST['university']); ?> 
			<br>
			Your hobbies are:
			<br>
			<?php
				$dem=0;
				// foreach ($_POST['hobby'] as $value) {
				// 	if($value.checked){
				// 		$dem++;
				// 		print("$dem: ".$value['name']);
				// 	}
				// }
				if(isset($_POST['sing'])){
					$dem++;
					
					print("&emsp;	$dem. sing");
					echo "<br>";
				}
				if(isset($_POST['dance'])){
					$dem++;
					
					print("	&emsp;	$dem. dance");
					echo "<br>";
				}
				if(isset($_POST['travel'])){
					$dem++;
					
					print("	&emsp;	$dem. travel");
					echo "<br>";
				} 
				if(isset($_POST['music'])){
					$dem++;
					
					print("&emsp;		$dem. music");
					echo "<br>";
				}
				if(isset($_POST['movie'])){
					$dem++;
					
					print("	&emsp;	$dem. movie");
					echo "<br>";
				}
				if(isset($_POST['others'])){
					$dem++;
					
					print("	&emsp;	$dem. others");
					echo "<br>";
				}
			?>
			<?php
			$email=$_POST['email'];
			$contact = $_POST['contact'];
			print ("<br>Your email address is $email");
			print ("<br>Contact preference is $contact");
			?>

		<!-- }; -->
	
	

</body>
</html>