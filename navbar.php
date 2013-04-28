<div>
<?php
if(login()){
?>
<ul>
	<li><a href='index.php'>Kezdőlap</a></li>
	<li><a href='messages.php'>Üzenetek</a></li>
	<li><a href='logout.php'>Kijelentkezés</a></li>
</ul> 

<?php
}else{
?>
<ul>
	<li><a href='index.php'>Kezdőlap</a></li>
	<li><a href='login.php'>Bejelentkezés</a></li>
	<li><a href='register.php'>Regisztráció</a></li>
</ul>
<?php 
	} 
?>
</div>