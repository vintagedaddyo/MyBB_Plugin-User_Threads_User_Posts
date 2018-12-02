<?php
/*
 * MyBB: User Threads User Posts
 *
 * File: user_threads_user_posts.php
 *
 * Author: Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.0
 *
 */
 
if(!defined("IN_MYBB"))
{
    die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

// Plugin add hooks

   $plugins->add_hook('global_start', 'user_threads_user_posts_start');
	
// Plugin information

function user_threads_user_posts_info()
{
    global $lang;

    $lang->load("user_threads_user_posts");

    $lang->user_threads_user_posts_desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' . '<input type="hidden" name="cmd" value="_s-xclick">' . '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' . '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' . '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' . '</form>' . $lang->user_threads_user_posts_desc;
    return Array(
        'name' => $lang->user_threads_user_posts_name,
        'description' => $lang->user_threads_user_posts_desc,
        'website' => $lang->user_threads_user_posts_web,
        'author' => $lang->user_threads_user_posts_auth,
        'authorsite' => $lang->user_threads_user_posts_authsite,
        'version' => $lang->user_threads_user_posts_ver,
        'compatibility' => $lang->user_threads_user_posts_compat
    );
}

// Plugin activation
 
function user_threads_user_posts_activate()
{ 
    require_once MYBB_ROOT . "inc/adminfunctions_templates.php";
    
    find_replace_templatesets("header_welcomeblock_member_search", "#".preg_quote('{$lang->welcome_todaysposts}</a></li>')."#i", '{$lang->welcome_todaysposts}</a></li><li><a href="search.php?action=finduserthreads&uid={$mybb->user[\'uid\']}"><img src="images/user.png" height="16px" width="16px" border="0" style="vertical-align:middle;"> {$lang->user_threads_user_posts_threads}</a></li>&amp;<li><a href="search.php?action=finduser&uid={$mybb->user[\'uid\']}">{$lang->user_threads_user_posts_posts}</a></li>');
}

// Plugin deactivation
 
function user_threads_user_posts_deactivate()
{   
    require_once MYBB_ROOT . "inc/adminfunctions_templates.php";
    
    find_replace_templatesets("header_welcomeblock_member_search", "#".preg_quote('<li><a href="search.php?action=finduserthreads&uid={$mybb->user[\'uid\']}"><img src="images/user.png" height="16px" width="16px" border="0" style="vertical-align:middle;"> {$lang->user_threads_user_posts_threads}</a></li>&amp;<li><a href="search.php?action=finduser&uid={$mybb->user[\'uid\']}">{$lang->user_threads_user_posts_posts}</a></li>')."#i", '', 0);
}

function user_threads_user_posts_start()
{ 
    global $mybb, $db, $lang;
    
    $lang->load("user_threads_user_posts");        
}

?>
