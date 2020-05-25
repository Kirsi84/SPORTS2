<?php

// include function files for this application
require_once('bookmark_fns.php');
session_start();

//create short variable names
if (!isset($_POST['username']))  {
  //if not isset -> set with dummy value 
  $_POST['username'] = " "; 
}
$username = $_POST['username'];
if (!isset($_POST['passwd']))  {
  //if not isset -> set with dummy value 
  $_POST['passwd'] = " "; 
}
$passwd = $_POST['passwd'];

if ($username && $passwd) {
// they have just tried logging in
  try  {
    
    //echo "kohta1 KIR";
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Virhe:');
    echo 'Et päässyt kirjautumaan sisään.<br>
          Yritä kirjautua uudelleen.';
    do_html_url('login.php', 'Kirjaudu');
    do_html_footer();
    exit;
  }
}


header("Location: /index.php"); //KIR

// do_html_header('Home');
// check_valid_user();
// // get the bookmarks this user has saved
// if ($url_array = get_user_urls($_SESSION['valid_user'])) {
//   display_user_urls($url_array);
// }

// // give menu of options
// display_user_menu();

// do_html_footer();
?>
