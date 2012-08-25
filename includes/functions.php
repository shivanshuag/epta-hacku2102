<?php
//here are all the basic functions

/*function mysql_prep( $value ) {
    //function for single quote,double quote, backslash error escape 
        $magic_quotes_active = get_magic_quotes_gpc();
        $new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
        if( $new_enough_php ) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysql_real_escape_string can do the work
            if( $magic_quotes_active ) { $value = stripslashes( $value ); }
            $value = mysql_real_escape_string( $value );
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manually
            if( !$magic_quotes_active ) { $value = addslashes( $value ); }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }
    
function confirm_query($input){
    if(!$input){
        die("No query done. ".mysql_error());
    }
}    

function write_colleges(){
    global $connection;
    $query = "SELECT `id`,`college` FROM `colleges` ORDER BY `college` ASC";
    $results = mysql_query($query,$connection);
    while($row = mysql_fetch_assoc($results)){
        echo "<option value='".$row['id']."'>".$row['college']."</option>";
    }
}

function update_user_data($ar) {
    $query = 'UPDATE `users` SET 
             `name`  = "'.$ar['name'].'", 
             `email` = "'.$ar['email'].'",
             `hashed_password` = "'.$hashed_password.'", 
             `college_id` = '.$ar['college_id'].',
             `gender` = "'.$ar['gender'].'", 
             `phone` = '.$ar['phone'].',
             `secret_key` = "'.$secret_key.'",
              `create_time` = NOW(), 

              `create_date` = CURDATE() WHERE `email` = "'.$ar['email'].'"';
}


function status($v){
    switch($v){
        case 1:return 'Pending';break;
        case 2:return 'Accepted';break;
        case 3:return 'Rejected';break;
    }    
}

*/
function lastIndexOf($string,$item) {
    $index=strpos(strrev($string),strrev($item));
    if ($index){
        $index=strlen($string)-strlen($item)-$index;
        return $index;
    }
    else
        return -1;
}

function redirect_to( $location = NULL, $data = array() ) {
    if ($location != NULL) {
        $first_arg = TRUE;
        foreach($data as $key => $val) {
            if($first_arg) {
                $location .= "?$key=$value";
                $first_arg = FALSE;
            }
            else     $location .= "&$key=$value";
        }
        header("Location: {$location}");
        exit;
    }
}

function log_error($text) {    
    echo $text;
    $f = fopen("error/registration_error.txt","a");
    @fwrite($f, $text);
    fclose($f);
}

function generate_secret_key() {
    return "A".rand(11,21).time().rand(100,999);
}
?>
