<?php
/*
* Global Section
*/
$sections[] = array(
    'title' => esc_html__('General', 'osaka'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-globe',
    'fields' => array(

        $fields = array(
                'id'       => 'logo_type',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Logo Type', 'osaka' ),
                'subtitle' => esc_html__( 'Select Logo Type Options e.g Text or Image', 'osaka' ),
                'desc'     => esc_html__( 'Default Design Layout Options "Image Logo".', 'osaka' ),
                'options'  => array(
                    'text'     => esc_html__( 'Text' , 'osaka' ) ,
                    'image'    => esc_html__( 'Image', 'osaka' )
                ),
                'default'  => 'image'
            ),
        array(
                'id' => 'logo_text',
                'type' => 'text',
                'title' => esc_html__('Logo Text', 'osaka'),
                'default' => "<span>Osaka</span>",
                'required' => array('logo_type', '=', 'text')
            ),
        array(
                'id' => 'logo_image',
                'type' => 'media',
                'title' => esc_html__('Logo Image', 'osaka'),
                'default' => array("url" => esc_url( get_template_directory_uri() . "/images/logo2.png" )),
                'desc'     => esc_html__( 'Select Logo Image if you want to set your Logo Image', 'osaka' ),
                'required' => array('logo_type', '=', 'image'),
                'preview' => true,
                "url" => true
            ),
        array(
                'id' => 'admin_logo',
                'type' => 'media',
                'title' => esc_html__('Admin Logo', 'osaka'),
                'default' => array("url" => esc_url( get_template_directory_uri() . "/images/logo2.png" )),
                'preview' => true,
                "url" => true
            ),
        

        )
); //global