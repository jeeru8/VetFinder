<?php
    $session_name = 'OVCP';
    $secure = FALSE;
    $httponly = true;
    ini_set('session.use_only_cookies', true);
    //ini_set('session.use_strict_mode', true);
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],$cookieParams["path"],$cookieParams["domain"],$secure,$httponly);
?>