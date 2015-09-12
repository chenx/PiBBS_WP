<?php

include_once("../../wp-load.php");

if (is_user_logged_in())
{
    if ( ! isset($_SESSION['username']) || $_SESSION['username'] == '') 
    {
        print "automatic wp_login";
        wp_login();
    }
}


function wp_login() {
    global $current_user;
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    //other data needed to navigate the site or to authenticate the user.
    //$_SESSION['role'] = getRole( $info['gid'] );
    $_SESSION['ID'] = $current_user->ID; // $info['ID'];
    $_SESSION['username'] = $current_user->user_login; // should get this from pibbs user table by ID.
    //$_SESSION['bbs_role'] = getBBSRole( $info['ID'] );
    //$_SESSION['bbs_PrivateMembership'] = getPrivateMembership($_SESSION['ID']);

    //log_login( $_SESSION['ID'], $_SESSION['ip'], date('Y-m-d H:i:s', time()) );

    //print "<br/>" . $_SESSION['username'] . "<br/>" . $_SESSION['ID'] . "<br/>" . $_SESSION['ip'] . "<br/>";
}

?>
