<?php
/**
 * Plugin Name: Studio Web Art
 * Plugin URI: https://traunkar.com/
 * Description: Assignment as a prerequisite for the interview
 * Version:1.0.0
 * Author: Sanjin Traunkar
 * Author URI:https://traunkar.com/
 */

if (!defined('ABSPATH')) {
    die;
}

class StudioWebArt
{
    public $pluginName;

    function __construct()
    {
        $this->pluginName = plugin_basename(__FILE__);
    }

    function content_of_shortcode()
    {
        include 'settings.php';
        if (isset($_POST['shortcode'])) {
            $shortcode = $_POST['shortcode'];
        }
        return '<a href="https://studiowebart.eu/" class="studiowebart" target="_blank">' . $shortcode . '</a>';
    }

    function register()
    {
        add_shortcode('studiowebart-2021', array($this, 'content_of_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'add_style')); // front css
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_filter("plugin_action_links_$this->pluginName", array($this, 'settings_link'));
    }


    function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=studiowebart_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }


    function add_settings_page()
    {
        add_menu_page('Studio Web Art', 'Studio Web Art', 'manage_options', 'studiowebart_plugin', array($this, 'settings_index'), 'dashicons-admin-site', null);
    }

    function settings_index()
    {
        require_once plugin_dir_path(__FILE__) . 'template/settings.view.php';
    }

    function activate()
    {
        flush_rewrite_rules();

    }

    function deactivate()
    {
        flush_rewrite_rules();
    }


    function add_style()
    {
        wp_enqueue_style('studiowebartstyle', plugins_url('/assets/main.css', __FILE__));
    }
}

if (class_exists('StudioWebArt')) {
    $studioWebArt = new StudioWebArt();
    $studioWebArt->register();
}
//activation and deactivation

register_activation_hook(__FILE__, array($studioWebArt, 'activate'));
register_deactivation_hook(__FILE__, array($studioWebArt, 'deactivate'));


