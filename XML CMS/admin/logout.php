<?php
session_start();
if(isset($_COOKIE[session_name()]))
{
session_start(); // To be able to use session_destroy
session_destroy(); // To delete the old session file
unset($_COOKIE[session_name()]);
}

header("Location:login.php");
?>
