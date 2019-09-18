<?php
/*
* 404 Section
*/
$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => esc_html__('404 Settings', 'osaka'),
    'fields' => array(
        array(
                'id'=>'settings_404_title',
                'type' => 'text',
                'title' => esc_html__('404 Title', 'osaka'),
                'default'=> esc_html__( '404', 'osaka'),
            ),
        array(
                'id'=>'settings_404_heading',
                'type' => 'text',
                'title' => esc_html__('404 Main Heading Title', 'osaka'),
                'default'=>esc_html__('Page Not Found', 'osaka'),
            ),

        )
); //404