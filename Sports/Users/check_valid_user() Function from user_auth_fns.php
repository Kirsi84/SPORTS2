function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user']))  {
      echo "Sisäänkirjautunut käyttäjä: ".$_SESSION['valid_user'].".<br>";
  } else {
     // they are not logged in
     do_html_heading('Virhe:');
     echo 'Et ole kirjautunut sisään.<br>';
     do_html_url('login.php', 'Kirjaudu');
     do_html_footer();
     exit;
  }
}