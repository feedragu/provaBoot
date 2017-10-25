<?php
session_start();

session_unset();

session_start();

$_SESSION['loggedOut']=0;

echo "<a class='nav-link js-scroll-trigger' href='javascript:openModal();' >Login</a>";
?>