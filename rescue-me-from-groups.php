<?php
/*
Plugin Name: Recume me from Groups
Author: Brajesh Singh
Version: 1.0
description: It heals the broken soul of site users and rescues them from auto joining the public groups while participating in the forum discussion
*/

add_action("check_admin_referer","bpdev_change_group_status_admin",10,2);
function bpdev_change_group_status_admin($action,$res){
	if($action=="bp_forums_new_topic")
	bpdev_change_group_status();
}

function bpdev_change_group_status(){
global $bp;
/* this is a bad hack, but there is no workaround in bp 1.2.3*/
	if($bp->groups->current_group->status=='public'){
	$bp->groups->current_group->status_bkp=$bp->groups->current_group->status;//save current status
	$bp->groups->current_group->status ="something";// change to arbitrary status(we are doing it to make the joining condition false)
}
	
}

add_action("groups_new_forum_topic","bpdev_revert_group_status");
/*when the topic is created, revert back the status*/
function bpdev_revert_group_status(){
global $bp;
if(!empty($bp->groups->current_group->status_bkp))
$bp->groups->current_group->status=$bp->groups->current_group->status_bkp;
//$bp->groups->current_group->status ="something";// ="something";

}
?>