<?php
/*
* Login
*/
$sections[] = array(
	'id'       			=> 'global-login',
    'icon' 				=> 'el-icon-cogs',
    'icon_class' 		=> 'icon-large',
    'subsection'       	=> true,
    'customizer_width' 	=> '450px',
    'title' 			=> esc_html__('Login', 'osaka'),
    'fields' 			=> array(

	        array(
	                'id'=>'login_title',
	                'type' => 'text',
	                'title' => esc_html__('Title', 'osaka'),
	                'default'=> esc_html__( 'Login for access', 'osaka'),
	            ),
	        array(
	                'id'=>'login_sub_title',
	                'type' => 'text',
	                'title' => esc_html__('Sub Title', 'osaka'),
	                'default'=> esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'osaka'),
	            ),

	        )
	); //404