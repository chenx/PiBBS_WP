<?php
header("Expires: 0");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once("../theme/themes.php");
require_once("../plugin/wp_login.php");

$wp_custom_header = '<script type="text/javascript" src="../js/ajax/libs/jquery/1.4/jquery.min.js"></script>' 
  . getThemeCss();
$root_path = "..";

get_header(); // WordPress header.
?>

<?php
if (isMobile() && $_USE_IMAIL && isset($_SESSION['ID'])) {
    $unread_imail = getUnReadEmails($_SESSION['ID']);
    if ($unread_imail != "") {
        print "<br/><div style='width: 100%; text-align: center;'>$unread_imail</div>";
    }
}
?>

<!-- include the custom page template of current theme -->
<!-- For theme: albar -->
<style type="text/css" media="screen">
/* For the underline under menu item. */
.current-menu-item a {
    border-bottom: 2px solid #4965A0;
}
</style>

<style type="text/css">
html, body, table {
    vertical-align: middle !important;
}
</style>


<?php
if (isset($div_main_id) && $div_main_id != "") {
    print "<div id=\"$div_main_id\">";
} else { ?>
<div id="main_panel">
<div id="main_panel_main">
<?php } ?>



<?php
if (is_user_logged_in()){
    wp_hello();
    //echo "<p>Welcome, registered user!</p>";
    //echo "<blockquote><p>Welcome, registered user!</p></blockquote>";
    //wp_showUserInfo();
}
else {
    echo "<p>Welcome, visitor! ";
    echo "<a href='" . wp_login_url( "bbs" ) . "'><span style='color: red;'>Login</span></a> | ";
    echo "<a href='../../wp-login.php?action=register'><span style='color: red;'>Register</span></a></p>";
}

// showUserInfo() is conflict with PiBBS function.
function wp_showUserInfo() { 
    global $current_user;
    if ( isset($current_user) ) {
        echo "Login: " . $current_user->user_login . "<br/>";
        echo "ID: " . $current_user->ID . "<br/>";
        echo "Firstname: " . $current_user->user_firstname . '<br/>';
        echo "Lastname: " . $current_user->user_lastname . '<br/>';
        echo "Email: " . $current_user->user_email . "<br/>";
        echo "Caps[\"administrator\"]: " . $current_user->caps["administrator"] . "<br/>";
        echo "<br/>";
        echo "var_dump(\$current_user):<br/>";
        echo "<br/>";
        var_dump($current_user);
        echo $current_user->user_login;
    }
}

function wp_hello() {
    global $current_user;
    if ( isset($current_user) ) {
        echo "<p>Welcome, " . $current_user->user_login . "!</p>";
    }
}

?>

