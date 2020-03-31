<?php

// include function files for this application
require_once('bookmark_fns.php');
session_start();

//KIR  20200329
$old_user = ""; 
if (isset($_SESSION['valid_user'])) { 
    $old_user = $_SESSION['valid_user'];
}

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);

// remove all session variables KIR 20200329
session_unset();

$result_dest = session_destroy();

// start output html
do_html_header('Uloskirjautuminen');

if (!empty($old_user)) {
  if ($result_dest)  {
    // if they were logged in and are now logged out
    echo 'Olet kirjautunut ulos järjestelmästä.<br>';
    do_html_url('login.php', 'Kirjaudu');
  } else {
   // they were logged in and could not be logged out
    echo 'Uloskirjautuminen ei onnistunut.<br>';
  }
} else {
  // if they weren't logged in but came to this page somehow
  echo 'Et ollut kirjautunut sisään, eikä uloskirjautumista näin ollen tehty.<br>';
  do_html_url('login.php', 'Kirjaudu');
}

do_html_footer();

?>
