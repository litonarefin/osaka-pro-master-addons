<?php
/*
* Register
*/
$sections[] = array(
	'id'       			=> 'global-register',
    'icon' 				=> 'el-icon-cogs',
    'icon_class' 		=> 'icon-large',
    'subsection'       	=> true,
    'customizer_width' 	=> '450px',
    'title' 			=> esc_html__('Register', 'osaka'),
    'fields' 			=> array(

	        array(
	                'id'=>'register_title',
	                'type' => 'text',
	                'title' => esc_html__('Title', 'osaka'),
	                'default'=> esc_html__( 'Register for Access', 'osaka'),
	            ),
	        array(
	                'id'=>'register_sub_title',
	                'type' => 'text',
	                'title' => esc_html__('Sub Title', 'osaka'),
	                'default'=> esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'osaka'),
	            ),

	        )
	); //404