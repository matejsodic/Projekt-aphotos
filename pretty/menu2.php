 

 <header id="banner2">
    <div class="inner">
     <a href="index.php?menu=1"><h1>Image src</h1></a>
     <div class="nav2">
     <?php 
     print '
      <ul>
    <li><a href="index.php?menu=1"'; if($_GET['menu'] == 1) { print ' class="button special"';} print '><img src="slike/home.png" height="22" width="22"></a></li>
    <li><a href="index.php?menu=1/#aboutuz">About us</a></li>
    <li><a href="index.php?menu=3"'; if($_GET['menu'] == 3) { print ' class="button special"';} print '>Contact</a></li>';
    if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
      print '
    <li><a href="index.php?menu=4"'; if($_GET['menu'] == 4) { print ' class="button special"';} print '>Sign Up</a></li>
    <li><a href="index.php?menu=5"'; if($_GET['menu'] == 5) { print ' class="button special"';} print '>Login</a></li>';}
    else if ($_SESSION['user']['valid'] == 'true') {
      print '
    <li><a href="index.php?menu=100"'; if($_GET['menu'] >= 100 && $_GET['menu'] <= 105) { print ' class="button special"';} print '>Administration</a></li>
    <li><a href="logout.php">Logout</a></li>';}
  print '
  </ul>';
  ?>

    </div>
  </div>
</header>