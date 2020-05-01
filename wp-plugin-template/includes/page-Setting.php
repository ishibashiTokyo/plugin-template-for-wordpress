<?php
if (!defined('ABSPATH')) die('Silence is golden.');
?>

<h1>設定ページ</h1>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br/></div>

    <h2>テキスト設定</h2>

    <form action="" method="post">
        <?php
        // nonce発行
        wp_nonce_field(parent::$nonce_key);
        $opt = get_option(parent::$option_name);
        $twitter_value = isset($opt['twitter']) ? $opt['twitter'] : null;
        $facebook_value = isset($opt['facebook']) ? $opt['facebook'] : null;
        $google_value = isset($opt['google']) ? $opt['google'] : null;
        ?>

        <table class="widefat">
            <thead>
            <tr>
                <th>項目</th>
                <th>設定値</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>項目</th>
                <th>設定値</th>
            </tr>
            </tfoot>
            <tbody>
            <tr>
                <td>Twitter<?php echo parent::$option_name; ?></td>
                <td><label><input type="checkbox" name="post_settings[twitter]"
                                  value="1"<?php echo ($twitter_value === '1') ? ' checked="checked"' : ''; ?>></label>
                </td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td><label><input type="checkbox" name="post_settings[facebook]"
                                  value="1"<?php echo ($facebook_value === '1') ? ' checked="checked"' : ''; ?>></label>
                </td>
            </tr>
            <tr>
                <td>Google</td>
                <td><label><input type="checkbox" name="post_settings[google]"
                                  value="1"<?php echo ($google_value === '1') ? ' checked="checked"' : ''; ?>></label>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存"/></p>
    </form>
</div><!-- /.wrap -->

<div id="plugin-bottom">
    <img src="<?php echo plugins_url('/images/logo.png', dirname(__FILE__)); ?>">
    <p>Version. <?php echo parent::version(); ?></p>
</div>