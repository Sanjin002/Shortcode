<?php require __DIR__ . '/../settings.php'; ?>
<div id="setting-error-settings-updated" class="updated settings-error notice is-dismissible"><strong>Setting
        have been saved.</strong></div>
<div class="wrap">
    <h2>Studio Web Art</h2>
    <form method="post" action="">
        <label for="shortcode">Content of shortcode</label>
        <textarea name="shortcode" class="large-text"><?= $shortcode ?></textarea>
        <input type="submit" name="submit_shortcode" class="button-primary" value="Save">
    </form>
    <h3>SHORTCODES:</h3>
    <p>The plugin comes with one shortcode wich allows to:</p>

    <li>[studiowebart-2021]: display a box labeled Studio Web Art or whatever is later typed into the text area above. </li>
</div>