<?php
$page_title = 'Bejelentkezés';
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
							$check = mysql_query("SELECT id FROM users WHERE username = '$username' AND password = '$password'");
							
							if(mysql_num_rows($check) == 1) {
								
								$row = mysql_fetch_array($check);
								$id = $row['id'];
								$_SESSION['user_id'] = $id;
								
								header('location: index.php');
								
							} else {
									$error = 'Sikertelen';
							}
						}
					echo "<p>$error</p>";
				}
			?>
			<br />
			Felhasználónév:<br />
			<input type="text" name="username"><br />
			Jelszó:<br />
			<input type="password" name="password"><br />
			<input type="submit" name="submit" value="Bejelentkezés">
		
		</form>
	
	</div>

</div>
	
</body>
</html