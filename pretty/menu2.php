<?php
print '
<header id="banner2">
	<ul>
		<li><a href="index.php?menu=1"'; if($_GET['menu'] == 1) { print ' class="button special"';} print '><img src="slike/home.png" height="25" width="25"></a></li>
		<li><a href="index.php?menu=1/#aboutuz">About us</a></li>
		<li><a href="index.php?menu=3"'; if($_GET['menu'] == 3) { print ' class="button special"';} print '>Contact</a></li>
		<li><a href="index.php?menu=4"'; if($_GET['menu'] == 4) { print ' class="button special"';} print '>Sign Up</a></li>
		<li><a href="index.php?menu=5"'; if($_GET['menu'] == 5) { print ' class="button special"';} print '>Login</a></li>
		<li><a href="index.php?menu=100"'; if($_GET['menu'] >= 100 && $_GET['menu'] <= 105) { print ' class="button special"';} print '>Upload</a></li>
		<li><a href="logout.php">Logout</a></li>';
	print '
	</ul>
</nav>';
?>