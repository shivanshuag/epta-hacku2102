<?php
if(logged_in()):
?>
<a href="profile">
  <div id="user-picture">
    <img src="http://cdn.chud.com/6/61/61ba6cf1_youngBruce.jpg" />
    <p> Bruce Wayne, Wayne Enterprises </p>
  </div>
</a>
<?php else: ?>
<div id="user-picture">
  <img src="images/antaragni.jpg" />
</div>
<?php endif; ?>