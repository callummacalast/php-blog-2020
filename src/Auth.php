<?php
class Auth
{
  function checkLogin($username, $password) {
    
    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();
    
    $userObj = new User($dbc);
    $userObj->findBy('username', $username);

    if(property_exists($userObj, 'id')) {
      if ($userObj->password == md5($password . ENCRYPTION_SALT . $user->password_hash)){

        return true;
      }
    }
  }

  function changeUserPassword($userObj, $newPassword) {
    $tmp = date('YmdHis') . 'secret_string123';
    $hash = md5($tmp);
    $hashedPassword = md5 ($newPassword . ENCRYPTION_SALT . $hash);

    $userObj->password = $hashedPassword;
    $userObj->password_hash = $hash;

    return $userObj;
  }
}