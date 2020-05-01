<?php
if (!defined('ABSPATH')) die('Silence is golden.');

if (!class_exists('{plugin_prefix}ManagementScreen')) {
    class {plugin_prefix}ManagementScreen extends {plugin_prefix}Setting
    {
        public static function registerSettingPage()
        {
            /**
             * カスタムトップレベルメニュー追加
             */
            add_menu_page(
                '遷移先ページのタイトル',
                'メニュー名',
                // 表示権限
                'manage_options',
                // メニューのスラッグ名
                '{plugin_prefix}-topmenu',
                // リンク先ページを生成する関数
                array('{plugin_prefix}ManagementScreen', 'settingPage'),
                // iconのURL
                plugins_url('images/icon.png', dirname(__FILE__)),
                // メニューの表示位置 指定なしは最下層
                999.1
            );

            /**
             * カスタムトップレベルメニューにサブメニューを追加
             */
            // add_submenu_page(
            //     '{plugin_prefix}-topmenu',
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-submenu1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * ダッシュボードのサブメニュー
             */
            // add_dashboard_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-dashboard1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * 投稿のサブメニュー
             */
            // add_posts_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-posts1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * メディアのサブメニュー
             */
            // add_media_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-media1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * 固定ページのサブメニュー
             */
            // add_pages_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-pages1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * コメントのサブメニュー
             */
            // add_comments_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-comments1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * 外観のサブメニュー
             */
            // add_theme_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-theme1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * プラグインのサブメニュー
             */
            // add_plugins_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-plugins1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * ユーザのサブメニュー
             */
            // add_users_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-users1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * ツールのサブメニュー
             */
            // add_management_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-management1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );

            /**
             * 設定のサブメニュー
             */
            // add_options_page(
            //     'サブメニュー',
            //     'サブメニュー',
            //     'manage_options',
            //     '{plugin_prefix}-options1',
            //     array('{plugin_prefix}ManagementScreen', 'settingPage')
            // );
        }


        public function settingPage()
        {
            // $_POST['post_settings'])があったら保存
            if (isset($_POST['post_settings'])) {
                // nonce-check
                check_admin_referer(parent::$nonce_key);
                // 更新
                self::Update($_POST['post_settings']);
                echo '<div class="updated fade"><p><strong>更新完了。</strong></p></div>';
            }
            // ページ表示
            require_once dirname(__FILE__) . '/page-Setting.php';
        }

        public static function registerPluginStyles()
        {
            wp_register_style('{plugin_prefix}-style', plugins_url('/css/plugin.css', dirname(__FILE__)));
            wp_enqueue_style('{plugin_prefix}-style');
        }
    }
}
