<?php
$page_title = 'Regisztráció';
include('header.php');
include('connect.php');
include('functions.php');
?>
<div class="container">

	<div class="left_side">
		<?php include('navbar.php');?>
		
		<form method="POST">
			<?php
				if(isset($_POST['submit'])){
					$username = trim($_POST['username']);
					$password = md5(trim($_POST['password']));
					
					if(empty($username) || empty($password)) {
							$error = 'Fehasználónév / Jelszó hiányzik!';
					}	else {
							mysql_query("INSERT INTO users (username, password) VALUES('$username', '$password')");
							$error = 'Sikeres regisztráció!';
						}
					echo "<p>$error</p>";
				}
			?>
			<br />
			Felhasználónév:<br />
			<input type="text" name="username"><br />
			Jelszó:<br />
			<input type="password" name="password"><br />
			<input type="submit" name="submit" value="Regisztráció">
			
		</form>
	</div>

</div>
</body>
</html