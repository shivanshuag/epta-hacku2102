<?php
if(!isset($_SESSION)){
    session_start();
}
function logged_in(){
    return isset($_SESSION['username']);
}
function set_session($user) {
    //$_SESSION['id']=$user['id'];
    $_SESSION['username']=$user['email'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['college_id']=$user['college_id'];
}

function destroy_session() {
  session_destroy();
}
?>
