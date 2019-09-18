<?php
/*
* Dequeue Scripts
*/
$sections[] = array(
	'id'       			=> 'global-login',
    'icon' 				=> 'el-icon-cogs',
    'icon_class' 		=> 'icon-large',
    'subsection'       	=> false,
    'customizer_width' 	=> '450px',
    'title' 			=> esc_html__('Dequeue Scripts', 'osaka'),
    'fields' 			=> array(


				array(
		            'id' => 'osaka_dequeue_scripts',
		            'type' => 'multi_text',
		            'title' => __('Script ID', 'osaka'),
		            'description'  => 'Seperated with Comma and Space "carousel, example-2"'
		        ),  




	        )
	); //Dequeue Scripts