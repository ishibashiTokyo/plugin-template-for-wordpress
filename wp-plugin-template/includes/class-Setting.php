<?php
if (!defined('ABSPATH')) die('Silence is golden.');

if (!class_exists('{plugin_prefix}Setting')) {
    class {plugin_prefix}Setting
    {
        public static $nonce_key = 'nonce_value';
        public static $option_name = '{plugin_prefix}_options';

        public static function version()
        {
            return '0.1';
        }

        public static function Activate()
        {
            self::addUserSetting();
        }

        public static function Deactivate()
        {
            self::removeUserSetting();
        }

        public function Update(array $opt_value = array())
        {
            if (empty($opt_value)) return false;
            /**
             * @todo バリデーション処理をここで行う。
             */
            self::updateUserSetting($opt_value);
        }

        /**
         * オプションの初期化
         * @return bool
         */
        private static function addUserSetting()
        {
            $opt_data = get_site_option(self::$option_name);

            if (!$opt_data) {
                // 設定の初期値
                $opt = array(
                    'twitter' => '1',
                    'facebook' => '1',
                    'google' => '1'
                );
                /*
                    optionテーブルにoption_nameカラムにキーとしてself::$option_name、
                    option_valueカラムに値として$optをシリアライズ処理し格納。
                    取り出す際はget_site_option();を使用する。
                */
                return update_option(self::$option_name, $opt);
            }
        }

        /**
         * オプションの更新
         * @param array $options 各種設定の連想配列
         * @return bool
         */
        private static function updateUserSetting(array $opt_value = array())
        {
            if (empty($opt)) return false;

            $opt = array(
                'twitter' => $opt_value['twitter'],
                'facebook' => $opt_value['facebook'],
                'google' => $opt_value['google']
            );
            return update_option(self::$option_name, $opt);
        }

        /**
         * オプションの削除
         */
        private static function removeUserSetting()
        {
            delete_option(self::$option_name);
        }
    }
}
