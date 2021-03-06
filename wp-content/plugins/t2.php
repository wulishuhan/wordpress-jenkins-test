<?php
    /*
    Plugin Name: Dashboard Widget Example Plugin
    Plugin URI: http://example.com/wordpress-plugins/my-plugin
    Description: A plugin to create dashboard widgets in WordPress
    Version: 1.0
    Author: Brad Williams
    Author URI: http://wrox.com
    License: GPLv2
    */

    add_action( 'wp_dashboard_setup', 'boj_dashboard_example_widgets' );
    
    function boj_dashboard_example_widgets() {
        // 创建一个自定义的控制板小工具
        wp_add_dashboard_widget( 
            'dashboard_custom_feed',
            'My Plugin Information',
            'boj_dashboard_example_display' 
        );
    }

    function boj_dashboard_example_display() {
        echo '<p>Please contact support@example.ccom to report bugs.</p>';
    }
?>