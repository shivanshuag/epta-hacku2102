<?php
if(!isset($_SESSION)){
    session_start();
}
function logged_in(){
    return isset($_SESSION['username']);
}
function set_session($user) {
    $_SESSION['uid']=$user['uid'];
    $_SESSION['username']=$user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role']=$user['role'];
}

function destroy_session() {
  session_destroy();
}
?>
