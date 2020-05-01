<?php
/*
Plugin Name: (プラグインの名前)
Plugin URI: (プラグインの説明と更新を示すページの URI)
Description: (プラグインの短い説明)
Version: (プラグインのバージョン番号。例: 1.0)
Author: (プラグイン作者の名前)
Author URI: (プラグイン作者の URI)
License: (ライセンス名の「スラッグ」 例: GPL2)
Text Domain: wporg
Domain Path: /languages
License:     GPL2

    Copyright 作成年 プラグイン作者名 (email : プラグイン作者のメールアドレス)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * 動作環境のバージョンチェック
 */
${plugin_prefix}_minimalRequiredPhpVersion = '5.4';

function {plugin_prefix}_noticePhpVersionWrong()
{
    global ${plugin_prefix}_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
        'エラー：PHPのバージョンを確認してください。<br/>' .
        '動作環境<strong>' . ${plugin_prefix}_minimalRequiredPhpVersion . '</strong>以上<br/>' .
        'このサーバーのバージョン<strong>' . phpversion() . '</strong>' .
        '</div>';
}

function {plugin_prefix}_PhpVersionCheck()
{
    global ${plugin_prefix}_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), ${plugin_prefix}_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', '{plugin_prefix}_noticePhpVersionWrong');
        return false;
    }
    return true;
}


// /**
//  * ローカライズ i18n
//  * @doc http://codex.wordpress.org/I18n_for_WordPress_Developers
//  * @return void
//  */
// function WpPluginTemplate_i18n_init() {
//     load_plugin_textdomain('my-cool-plugin', false, dirname(__FILE__) . '/languages/');
// }
// add_action('plugins_loadedi','WpPluginTemplate_i18n_init');

// 処理呼び出し
if ({plugin_prefix}_PhpVersionCheck()) {
    include_once('{plugin_prefix}-init.php');
    {plugin_prefix}Init(__FILE__);
}
