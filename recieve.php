<?php
$page_title = 'Beérkezett';
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
			if(isset($_GET['random']) && !empty($_GET['random'])) {
				$random = $_GET['random'];
				$query = mysql_query("SELECT from_id, message FROM msg WHERE group_random='$random' ");
				
				while($row = mysql_fetch_array($query) ){
					$from_id = $row['from_id'];
					$message = $row['message'];
					
					$query_user = mysql_query("SELECT username FROM users WHERE id='$from_id'");
					$row_user = mysql_fetch_array($query_user);
					$select_username = $row_user['username'];
					
					echo "<p><b>$select_username</b><br />$message</p>";
				}
		?>
			<form method="POST"><br />
				<?php
					if(isset($_POST['message']) && !empty($_POST['message'])) {
						$new_message = $_POST['message'];
					
						mysql_query("INSERT INTO msg VALUES('', '$random', '$from', '$new_message')");
						header('location: recieve.php?random='.$random);
					}
				
				?>
				<textarea name="message" rows="3" cols="50"></textarea><br />
				<input type="submit" name="submit" value="Küldés"/>
			</form>

		<?php
				
			} else {
					$query = mysql_query("SELECT random, from_user, to_user FROM msg_group WHERE from_user='$from' OR to_user='$from'");
					
					while($row = mysql_fetch_array($query)) {
					
						$random = $row['random'];
						$from_user = $row['from_user'];
						$to_user = $row['to_user'];
						
						if($from_user == $from) {
							$selected_id = $to_user;
						
						} else {
								$selected_id = $from_user;
							}
							
						$query_user = mysql_query("SELECT username FROM users WHERE id='$selected_id'");
						$row_user = mysql_fetch_array($query_user);
						$select_username = $row_user['username'];
						
						echo "<p><a href='recieve.php?random=$random'>$select_username</a></p>";
					}
				}
		?>
</div>

</div>
</body>
</html