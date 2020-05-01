<?php
if (!defined('ABSPATH')) die('Silence is golden.');

function {plugin_prefix}Init($file)
{
    /*
        アクティベート、ディアクティベート処理で設定値をwpdbに記録する。
    */
    require_once dirname(__FILE__) . '/includes/class-Setting.php';
    register_activation_hook($file, array('{plugin_prefix}Setting', 'Activate'));
    register_deactivation_hook($file, array('{plugin_prefix}Setting', 'Deactivate'));

    /*
        管理画面にメニューを表示して、ページを作成する
        @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_menu_page
    */
    require_once dirname(__FILE__) . '/includes/class-ManagementScreen.php';
    add_action('admin_menu', array('{plugin_prefix}ManagementScreen', 'registerSettingPage'));
    // プラグイン画面内にCSSを読み込ませる
    add_action('admin_init', array('{plugin_prefix}ManagementScreen', 'registerPluginStyles'));
}