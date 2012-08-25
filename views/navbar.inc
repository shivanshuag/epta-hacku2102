<ul class="nav">
  <li <?php if($path == '' || $path[0] == 'index.php') echo 'class="active"'; ?>><a href="./">Home</a></li>
  <li><a href="../synchronicity">Synchronicity</a></li>
  <li><a href="../junoon">Junoon</a></li>
  <li><a href="../mun">MUN</a></li>
  <li <?php if($path == 'faq') echo 'class="active"'; ?>><a href="faq">FAQ</a></li>
  <li <?php if($path == 'contact') echo 'class="active"'; ?>><a href="contact">Contacts</a></li>
  <li <?php if($path == 'about') echo 'class="active"'; ?>><a href="about">About</a></li>
</ul>