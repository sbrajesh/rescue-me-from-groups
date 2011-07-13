<?php
/*
Plugin Name: Recume me from Groups
Author: Brajesh Singh
Version: 1.1
description: It heals the broken soul of site users and rescues them from auto joining the public groups while participating in the forum discussion
 * IN BuddyPress 1.2.9, it is a built in thing, we just need to define BP_DISABLE_AUTO_GROUP_JOIN to false
 */

add_action("groups_setup_globals","rescue_from_autojoin");
function rescue_from_autojoin(){
    global $bp;
    $bp->groups->auto_join=false;
}
?>