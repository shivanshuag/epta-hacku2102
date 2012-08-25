<?php
/* function create_new_user($ar){ 
    global $connection;
    $secret_key = generate_secret_key();
    $hashed_password = sha1($ar['password']);
    $q = $connection->prepare("SELECT * FROM users WHERE email=:email");
    if($q->execute(array(':email' => $ar['name']))) {
        if($q->fetchColumn())
            return 'Registered';
    }
    //Email does not exist. Proceed with the registration
    $query = "INSERT INTO users (name, email, hashed_password, college_id, gender, phone, secret_key, timestamp) VALUES (:name, :email, :hashed_password, :college_id, :gender, :phone, :secret_key, :timestamp)";  
    $q = $connection->prepare($query);
    $params = array(
        ':name' => $ar['name'],
        ':email' => $ar['email'],
        ':hashed_password' => $hashed_password,
        ':college_id' => $ar['college_id'],
        ':gender' => $ar['gender'],
        ':phone' => $ar['phone'],
	    ':secret_key' => $secret_key,
        ':timestamp' => time(),
    );
    if($q->execute($params)){
        $user = $q->fetch(PDO::FETCH_ASSOC);
        $uid = $user['id'];
        //if($ar['teamleader_signup']==1){
          //  $query = 'INSERT INTO teamleader (user_id,college_id) VALUES (:uid, :college_id)';
           // $q = $connection->prepare($query);
            //$q->execute(array(':uid' => $uid, ':college_id' => $ar['college_id']));
        //}
        send_verify_mail($ar['email'], $secret_key);
        return TRUE;
    }
    return FALSE;
} */
	

function verify_credentials($input) {
    global $connection;
	
    $pass = sha1($input['password']);
    $query = "SELECT * FROM users WHERE username=:username AND hashed_password=:pass LIMIT 1";
    $q = $connection->prepare($query);
	if($q->execute(array(':username' => $input['username'], ':pass' => $pass))) {
		if($user = $q->fetch(PDO::FETCH_ASSOC)){
		//	if( $user['role'] == "teacher"){
		//		$class = $connection->prepare("SELECT class FROM teacher WHERE uid=:uid")->execute(array(':uid' => $user['uid']))-> fetchALl(PDO::FETCH_NUM);
		//		$subject = $connection->prepare("SELECT subject FROM teacher WHERE uid=:uid")->execute(array(':uid' => $user['uid']))-> fetchALl(PDO::FETCH_NUM);
		//	}	
			return $user;
		
		}		
    }
    return NULL;
}

/* function get_user($e) {
    global $connection;
	
    $query = "SELECT * FROM users WHERE email=:email LIMIT 1";
    $q = $connection->prepare($query);
    if($q->execute(array(':email' => $e))) {
        if($user = $q->fetch(PDO::FETCH_ASSOC))
            return $user;
    }
    return NULL;
}

function get_user_by_secret_key($secret) {
    global $connection;
    $query = "SELECT * FROM users WHERE secret_key=:secret_key LIMIT 1";
    $q = $connection->prepare($query);
    if($q->execute(array(':secret_key' => $secret))) {
        if($user = $q->fetch(PDO::FETCH_ASSOC))
            return $user;
    }
    return NULL;
} 

function verify_account($user) {
    global $connection;
    $query = "UPDATE users SET status=2 secret_key=:new_secret WHERE id=:id";
    $q = $connection->prepare($query);
    $r = $q->execute(array(':new_secret' => generate_secret_key(), ':id' => $user['id']));
    if($r)  return TRUE;
    return FALSE;
}
function update_password($fields) {
    global $connection;
    $encrypt_pass = sha1($fields['password_reset']);
    $query = "UPDATE users SET hashed_password=:pass secret_key=:new_secret WHERE email=:email AND secret_key=:secret";
    $q = $connection->prepare($query);
    $r = $q->execute(array(':pass' => $encrypt_pass, ':new_secret' => generate_secret_key(), ':email' => $fields['email_reset'], ':secret' => $fields['secret_key_reset']));
    if($r)  return TRUE;
    return FALSE;
} */

?>
