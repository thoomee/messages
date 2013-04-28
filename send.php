<?php
$page_title = 'Új üzenet küldése';
include('header.php');
include('connect.php');
include('functions.php');

$from = $_SESSION['user_id'];
?>

<div class="container">

	<div class="left_side">
		<?php include('navbar.php'); 
					include('message_navbar.php');
		?>
	</div>
	
	<div class="center">
	
<?php
	if(isset($_GET['user']) && !empty($_GET['user'])) {
?>
	<form method="POST"><br />
		<?php
			if(isset($_POST['message']) && !empty($_POST['message'])) {
				$from = $_SESSION['user_id'];
				$to = $_GET['user'];
				$random = rand();
				$message = $_POST['message'];
			
				$query = mysql_query("SELECT random FROM msg_group WHERE (from_user = '$from' AND to_user = '$to') OR (from_user = '$to' AND to_user = '$from')");
				
				if(mysql_num_rows($query) == 1) {
					echo 'beszélgetés már elkezdve, menny a Beérkezett menüpontra';
				
				} else {
						mysql_query("INSERT INTO msg_group VALUES('$from', '$to', '$random')");
						mysql_query("INSERT INTO msg VALUES('', '$random', '$from', '$message')");
						echo 'elkezdődött';
					}
			}
		
		?>
		<br />
		<textarea name="message" rows="3" cols="50"></textarea><br />
		<input type="submit" name="submit" value="Küldés"/>
	</form>
<?php
	} else {
			$user_list = mysql_query("SELECT id, username FROM users");
			while($row = mysql_fetch_array($user_list)) {
				$id = $row['id'];
				$username = $row['username'];
				
				if(!($_SESSION['user_id'] == $id)){
					echo "<p><a href='send.php?user=$id'>$username</a></p>";
				}
			}
		}

?>
</div>

</div>
</body>
</html