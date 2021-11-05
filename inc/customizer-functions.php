<?php
/**
 * WP-PageNavi
 * CHANGING CLASS NAMES
 * https://wordpress.org/plugins/wp-pagenavi/
 */
// Simple Usage - 1 callback per filter
// add_filter('wp_pagenavi_class_pages', 'theme_pagination_pages_class');
// add_filter('wp_pagenavi_class_previouspostslink', 'theme_pagination_previouspostslink_class');
// add_filter('wp_pagenavi_class_nextpostslink', 'theme_pagination_nextpostslink_class');
// add_filter('wp_pagenavi_class_current', 'theme_pagination_current_class');
// add_filter('wp_pagenavi_class_page', 'theme_pagination_page_class');

// function theme_pagination_pages_class($class_name) {
// 	return 'page-link disabled';
//   }

// function theme_pagination_previouspostslink_class($class_name) {
//   return 'page-link';
// }

// function theme_pagination_current_class($class_name) {
//   return 'page-link current';
// }

// function theme_pagination_nextpostslink_class($class_name) {
// 	return 'page-link';
//   }

// function theme_pagination_page_class($class_name) {
//   return 'page-link';
// }

/**
 * Quicktags API
 * http://codex.wordpress.org.cn/Quicktags_API
 */
function appthemes_add_quicktags()
{
    if (wp_script_is('quicktags')) {
        ?>
    <script type="text/javascript">
    QTags.addButton( 'eg_h2', 'H2', '<h2>', '</h2>', 'h2', '', 1 );
    QTags.addButton( 'eg_h3', 'H3', '<h3>', '</h3>', 'h3', '', 2 );
    QTags.addButton( 'eg_h4', 'H4', '<h4>', '</h4>', 'h4', '', 3 );
		QTags.addButton( 'eg_php', 'php', '[php]', '[/php]', 'php', '', 201 );
		QTags.addButton( 'eg_bash', 'bash', '[bash]', '[/bash]', 'bash', '', 202 );
		QTags.addButton( 'eg_js', 'js', '[javascript]', '[/javascript]', 'js', '', 203 );
		QTags.addButton( 'eg_json', 'json', '[sourcecode language="plain"]', '[/sourcecode]', 'json', '', 204 );
		QTags.addButton( 'eg_css', 'css', '[css]', '[/css]', 'css', '', 205 );
		QTags.addButton( 'eg_sql', 'sql', '[sql]', '[/sql]', 'sql', '', 206 );
		QTags.addButton( 'eg_xml', 'xml', '[xml]', '[/xml]', 'xml', '', 207 );
		QTags.addButton( 'eg_html', 'html', '[sourcecode language="html"]', '[/sourcecode]', 'html', '', 208 );
    </script>
<?php
    }
}
add_action('admin_print_footer_scripts', 'appthemes_add_quicktags');
