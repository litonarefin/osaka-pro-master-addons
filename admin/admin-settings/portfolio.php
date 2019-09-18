<?php
/*
* Portfolio Section
*/
$sections[] = array(
    'title' => esc_html__('Portfolio', 'osaka'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-briefcase',
    'fields' => array(

        $fields = array(
                'id'       => 'portfolio_layout',
                'type'     => 'select',
                'title'    => esc_html__('Portfolio Layout', 'osaka'), 
                'subtitle' => esc_html__('Portfolio Layout Types', 'osaka'),
                'desc'     => esc_html__('Select Portfolio Layout Type.', 'osaka'),
                'options'  => array(
                    'one'       => esc_html__('Layout One', 'osaka'),
                    'two'       => esc_html__('Layout Two', 'osaka')
                ),
                'default'  => 'one',
            ),


            array(
                'id' => 'details_text',
                'type' => 'text',
                'title' => esc_html__('Details Text', 'osaka'),
                'default' => esc_html__('Details', 'osaka' )
            ),


            array(
                'id' => 'view_all_text',
                'type' => 'text',
                'title' => esc_html__('View All Text', 'osaka'),
                'default' => esc_html__( 'View All', 'osaka')
            ),


            array(
                'id' => 'view_all_link',
                'type' => 'text',
                'title' => esc_html__('View All Link', 'osaka'),
                'default' => "#"
            ),

            array(
                'id'       => 'related_works',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Related Works?', 'osaka' ),
                'desc'     => esc_html__( 'Show/Hide Related Works', 'osaka' ),
                'options'  => array(
                    'yes'       => esc_html__( 'Yes' , 'osaka' ) ,
                    'no'        => esc_html__( 'No', 'osaka' )
                ),
                'default'  => 'yes'
            ),

            array(
                'id' => 'related_heading',
                'type' => 'text',
                'title' => esc_html__('Related Heading', 'osaka'),
                'default' => esc_html__('Related Projects', 'osaka' ),
                'required' => array('related_works', '=', 'yes')
            ),

            array(
                'id'       => 'related_popup',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Details Link/Popup', 'osaka' ),
                'desc'     => esc_html__( 'Link/Popup Related Works', 'osaka' ),
                'options'  => array(
                    'link'         => esc_html__( 'Link' , 'osaka' ) ,
                    'popup'        => esc_html__( 'Popup', 'osaka' )
                ),
                'default'  => 'popup',
                'required' => array('related_works', '=', 'yes')
            ),



        )
); //global