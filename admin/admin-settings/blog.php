<?php
/*
* Blog Section
*/
$sections[] = array(
    'title' => esc_html__('Blog', 'osaka'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-pencil',
    'fields' => array(

        $fields = 

            array(
                'id' => 'read_more',
                'type' => 'text',
                'title' => esc_html__('Read More Text', 'osaka'),
                'default' => esc_html__('Read more...', 'osaka' )
            ),

            array(
                'id' => 'excerpt_length',
                'type' => 'text',
                'title' => esc_html__('Excerpt Length', 'osaka'),
                'default' => 65
            ),

        )
); //global