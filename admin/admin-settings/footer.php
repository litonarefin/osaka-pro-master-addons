<?php
/*
* Footer Section
*/
$sections[] = array(
    'title' => esc_html__('Footer Section', 'osaka'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-edit',
    'fields' => array(

        array(
            'id' => 'copyright_text',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Text', 'osaka'),
            'default' => '<span>Copyright &copy;' . date('Y') . ' <a href="' . esc_url( 'https://demo.prowptheme.com/osaka', 'osaka' ) . '" target="_blank" rel="nofollow">' . esc_html__('osaka','osaka') . '</a>. ' . esc_html__( ' All rights reserved ','osaka') . '</span>'
        ),
        array(
            'id'=>'footer_links',
            'type' => 'multi_text',
            'title' => esc_html__('Footer Links', 'osaka'),
            'subtitle' => esc_html__('Seperate Text and Links with Semicolon. Example: Contact; https://jeweltheme.com/contact', 'osaka'),
            'desc' => esc_html__('Single Space between Semicolon and Links.', 'osaka'),
            'default'=>array(
                "Privacy Policy; #",
                "Contact; #"
             ),
        )        

    )
); //footer
