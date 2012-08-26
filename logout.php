<?php
require("includes/include.php");
  if(logged_in())
    destroy_session();
  redirect_to('login.php');
?>