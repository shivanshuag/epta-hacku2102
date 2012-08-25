<?php if(logged_in()): ?>
<ul class="nav pull-right">
  <li><a>Signed in as</a></li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="profile">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
      <!-- Placeholder for FB icon -->
    </ul>
  </li>
</ul>
<?php else: ?>
<ul class="nav pull-right">
  <li><a href="login.php">Login</a></li>
</ul>
<?php endif; ?>