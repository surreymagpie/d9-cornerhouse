<?php

$databases = [];

$settings['config_sync_directory'] = '../config/sync';

/**
 * Settings:
 *
 * $settings contains environment-specific configuration, such as the files
 * directory and reverse proxy address, and temporary configuration, such as
 * security overrides.
 *
 * @see \Drupal\Core\Site\Settings::get()
 */

/**
 * Salt for one-time login links, cancel links, form tokens, etc.
 *
 * This variable will be set to a random value by the installer. All one-time
 * login links will be invalidated if the value is changed. Note that if your
 * site is deployed on a cluster of web servers, you must ensure that this
 * variable has the same value on each server.
 *
 * For enhanced security, you may set this variable to the contents of a file
 * outside your document root; you should also ensure that this file is not
 * stored with backups of your database.
 *
 * Example:
 * @code
 *   $settings['hash_salt'] = file_get_contents('/home/example/salt.txt');
 * @endcode
 */
$settings['hash_salt'] = '';

/**
 * Deployment identifier.
 *
 * Drupal's dependency injection container will be automatically invalidated and
 * rebuilt when the Drupal core version changes. When updating contributed or
 * custom code that changes the container, changing this identifier will also
 * allow the container to be invalidated as soon as code is deployed.
 */
# $settings['deployment_identifier'] = \Drupal::VERSION;

/**
 * Access control for update.php script.
 *
 * If you are updating your Drupal installation using the update.php script but
 * are not logged in using either an account with the "Administer software
 * updates" permission or the site maintenance account (the account that was
 * created during installation), you will need to modify the access check
 * statement below. Change the FALSE to a TRUE to disable the access check.
 * After finishing the upgrade, be sure to open this file again and change the
 * TRUE back to a FALSE!
 */
$settings['update_free_access'] = FALSE;

/**
 * External access proxy settings:
 *
 * If your site must access the Internet via a web proxy then you can enter the
 * proxy settings here. Set the full URL of the proxy, including the port, in
 * variables:
 * - $settings['http_client_config']['proxy']['http']: The proxy URL for HTTP
 *   requests.
 * - $settings['http_client_config']['proxy']['https']: The proxy URL for HTTPS
 *   requests.
 * You can pass in the user name and password for basic authentication in the
 * URLs in these settings.
 *
 * You can also define an array of host names that can be accessed directly,
 * bypassing the proxy, in $settings['http_client_config']['proxy']['no'].
 */
# $settings['http_client_config']['proxy']['http'] = 'http://proxy_user:proxy_pass@example.com:8080';
# $settings['http_client_config']['proxy']['https'] = 'http://proxy_user:proxy_pass@example.com:8080';
# $settings['http_client_config']['proxy']['no'] = ['127.0.0.1', 'localhost'];

/**
 * Reverse Proxy Configuration:
 *
 * Reverse proxy servers are often used to enhance the performance
 * of heavily visited sites and may also provide other site caching,
 * security, or encryption benefits. In an environment where Drupal
 * is behind a reverse proxy, the real IP address of the client should
 * be determined such that the correct client IP address is available
 * to Drupal's logging, statistics, and access management systems. In
 * the most simple scenario, the proxy server will add an
 * X-Forwarded-For header to the request that contains the client IP
 * address. However, HTTP headers are vulnerable to spoofing, where a
 * malicious client could bypass restrictions by setting the
 * X-Forwarded-For header directly. Therefore, Drupal's proxy
 * configuration requires the IP addresses of all remote proxies to be
 * specified in $settings['reverse_proxy_addresses'] to work correctly.
 *
 * Enable this setting to get Drupal to determine the client IP from the
 * X-Forwarded-For header. If you are unsure about this setting, do not have a
 * reverse proxy, or Drupal operates in a shared hosting environment, this
 * setting should remain commented out.
 *
 * In order for this setting to be used you must specify every possible
 * reverse proxy IP address in $settings['reverse_proxy_addresses'].
 * If a complete list of reverse proxies is not available in your
 * environment (for example, if you use a CDN) you may set the
 * $_SERVER['REMOTE_ADDR'] variable directly in settings.php.
 * Be aware, however, that it is likely that this would allow IP
 * address spoofing unless more advanced precautions are taken.
 */
# $settings['reverse_proxy'] = TRUE;

/**
 * Specify every reverse proxy IP address in your environment.
 * This setting is required if $settings['reverse_proxy'] is TRUE.
 */
# $settings['reverse_proxy_addresses'] = ['a.b.c.d', ...];

/**
 * Reverse proxy trusted headers.
 *
 * Sets which headers to trust from your reverse proxy.
 *
 * Common values are:
 * - \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_ALL
 * - \Symfony\Component\HttpFoundation\Request::HEADER_FORWARDED
 *
 * Note the default value of
 * @code
 * \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_ALL | \Symfony\Component\HttpFoundation\Request::HEADER_FORWARDED
 * @endcode
 * is not secure by default. The value should be set to only the specific
 * headers the reverse proxy uses. For example:
 * @code
 * \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_ALL
 * @endcode
 * This would trust the following headers:
 * - X_FORWARDED_FOR
 * - X_FORWARDED_HOST
 * - X_FORWARDED_PROTO
 * - X_FORWARDED_PORT
 *
 * @see \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_ALL
 * @see \Symfony\Component\HttpFoundation\Request::HEADER_FORWARDED
 * @see \Symfony\Component\HttpFoundation\Request::setTrustedProxies
 */
# $settings['reverse_proxy_trusted_headers'] = \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_ALL | \Symfony\Component\HttpFoundation\Request::HEADER_FORWARDED;


/**
 * Page caching:
 *
 * By default, Drupal sends a "Vary: Cookie" HTTP header for anonymous page
 * views. This tells a HTTP proxy that it may return a page from its local
 * cache without contacting the web server, if the user sends the same Cookie
 * header as the user who originally requested the cached page. Without "Vary:
 * Cookie", authenticated users would also be served the anonymous page from
 * the cache. If the site has mostly anonymous users except a few known
 * editors/administrators, the Vary header can be omitted. This allows for
 * better caching in HTTP proxies (including reverse proxies), i.e. even if
 * clients send different cookies, they still get content served from the cache.
 * However, authenticated users should access the site directly (i.e. not use an
 * HTTP proxy, and bypass the reverse proxy if one is used) in order to avoid
 * getting cached pages from the proxy.
 */
# $settings['omit_vary_cookie'] = TRUE;


/**
 * Cache TTL for client error (4xx) responses.
 *
 * Items cached per-URL tend to result in a large number of cache items, and
 * this can be problematic on 404 pages which by their nature are unbounded. A
 * fixed TTL can be set for these items, defaulting to one hour, so that cache
 * backends which do not support LRU can purge older entries. To disable caching
 * of client error responses set the value to 0. Currently applies only to
 * page_cache module.
 */
# $settings['cache_ttl_4xx'] = 3600;

/**
 * Expiration of cached forms.
 *
 * Drupal's Form API stores details of forms in a cache and these entries are
 * kept for at least 6 hours by default. Expired entries are cleared by cron.
 *
 * @see \Drupal\Core\Form\FormCache::setCache()
 */
# $settings['form_cache_expiration'] = 21600;

/**
 * Class Loader.
 *
 * If the APCu extension is detected, the classloader will be optimized to use
 * it. Set to FALSE to disable this.
 *
 * @see https://getcomposer.org/doc/articles/autoloader-optimization.md
 */
# $settings['class_loader_auto_detect'] = FALSE;

/**
 * Authorized file system operations:
 *
 * The Update Manager module included with Drupal provides a mechanism for
 * site administrators to securely install missing updates for the site
 * directly through the web user interface. On securely-configured servers,
 * the Update manager will require the administrator to provide SSH or FTP
 * credentials before allowing the installation to proceed; this allows the
 * site to update the new files as the user who owns all the Drupal files,
 * instead of as the user the webserver is running as. On servers where the
 * webserver user is itself the owner of the Drupal files, the administrator
 * will not be prompted for SSH or FTP credentials (note that these server
 * setups are common on shared hosting, but are inherently insecure).
 *
 * Some sites might wish to disable the above functionality, and only update
 * the code directly via SSH or FTP themselves. This setting completely
 * disables all functionality related to these authorized file operations.
 *
 * @see https://www.drupal.org/node/244924
 *
 * Remove the leading hash signs to disable.
 */
# $settings['allow_authorize_operations'] = FALSE;

/**
 * Default mode for directories and files written by Drupal.
 *
 * Value should be in PHP Octal Notation, with leading zero.
 */
# $settings['file_chmod_directory'] = 0775;
# $settings['file_chmod_file'] = 0664;

/**
 * Public file base URL:
 *
 * An alternative base URL to be used for serving public files. This must
 * include any leading directory path.
 *
 * A different value from the domain used by Drupal to be used for accessing
 * public files. This can be used for a simple CDN integration, or to improve
 * security by serving user-uploaded files from a different domain or subdomain
 * pointing to the same server. Do not include a trailing slash.
 */
# $settings['file_public_base_url'] = 'http://downloads.example.com/files';

/**
 * Public file path:
 *
 * A local file system path where public files will be stored. This directory
 * must exist and be writable by Drupal. This directory must be relative to
 * the Drupal installation directory and be accessible over the web.
 */
# $settings['file_public_path'] = 'sites/default/files';

/**
 * Private file path:
 *
 * A local file system path where private files will be stored. This directory
 * must be absolute, outside of the Drupal installation directory and not
 * accessible over the web.
 *
 * Note: Caches need to be cleared when this value is changed to make the
 * private:// stream wrapper available to the system.
 *
 * See https://www.drupal.org/documentation/modules/file for more information
 * about securing private files.
 */
# $settings['file_private_path'] = '';

/**
 * Temporary file path:
 *
 * A local file system path where temporary files will be stored. This directory
 * must be absolute, outside of the Drupal installation directory and not
 * accessible over the web.
 *
 * If this is not set, the default for the operating system will be used.
 *
 * @see \Drupal\Component\FileSystem\FileSystem::getOsTemporaryDirectory()
 */
# $settings['file_temp_path'] = '/tmp';

/**
 * Session write interval:
 *
 * Set the minimum interval between each session write to database.
 * For performance reasons it defaults to 180.
 */
# $settings['session_write_interval'] = 180;

/**
 * String overrides:
 *
 * To override specific strings on your site with or without enabling the Locale
 * module, add an entry to this list. This functionality allows you to change
 * a small number of your site's default English language interface strings.
 *
 * Remove the leading hash signs to enable.
 *
 * The "en" part of the variable name, is dynamic and can be any langcode of
 * any added language. (eg locale_custom_strings_de for german).
 */
# $settings['locale_custom_strings_en'][''] = [
#   'forum'      => 'Discussion board',
#   '@count min' => '@count minutes',
# ];

/**
 * A custom theme for the offline page:
 *
 * This applies when the site is explicitly set to maintenance mode through the
 * administration page or when the database is inactive due to an error.
 * The template file should also be copied into the theme. It is located inside
 * 'core/modules/system/templates/maintenance-page.html.twig'.
 *
 * Note: This setting does not apply to installation and update pages.
 */
# $settings['maintenance_theme'] = 'bartik';

/**
 * PHP settings:
 *
 * To see what PHP settings are possible, including whether they can be set at
 * runtime (by using ini_set()), read the PHP documentation:
 * http://php.net/manual/ini.list.php
 * See \Drupal\Core\DrupalKernel::bootEnvironment() for required runtime
 * settings and the .htaccess file for non-runtime settings.
 * Settings defined there should not be duplicated here so as to avoid conflict
 * issues.
 */

/**
 * If you encounter a situation where users post a large amount of text, and
 * the result is stripped out upon viewing but can still be edited, Drupal's
 * output filter may not have sufficient memory to process it.  If you
 * experience this issue, you may wish to uncomment the following two lines
 * and increase the limits of these variables.  For more information, see
 * http://php.net/manual/pcre.configuration.php.
 */
# ini_set('pcre.backtrack_limit', 200000);
# ini_set('pcre.recursion_limit', 200000);

/**
 * Configuration overrides.
 *
 * To globally override specific configuration values for this site,
 * set them here. You usually don't need to use this feature. This is
 * useful in a configuration file for a vhost or directory, rather than
 * the default settings.php.
 *
 * Note that any values you provide in these variable overrides will not be
 * viewable from the Drupal administration interface. The administration
 * interface displays the values stored in configuration so that you can stage
 * changes to other environments that don't have the overrides.
 *
 * There are particular configuration values that are risky to override. For
 * example, overriding the list of installed modules in 'core.extension' is not
 * supported as module install or uninstall has not occurred. Other examples
 * include field storage configuration, because it has effects on database
 * structure, and 'core.menu.static_menu_link_overrides' since this is cached in
 * a way that is not config override aware. Also, note that changing
 * configuration values in settings.php will not fire any of the configuration
 * change events.
 */
# $config['system.site']['name'] = 'My Drupal site';
# $config['user.settings']['anonymous'] = 'Visitor';

/**
 * Fast 404 pages:
 *
 * Drupal can generate fully themed 404 pages. However, some of these responses
 * are for images or other resource files that are not displayed to the user.
 * This can waste bandwidth, and also generate server load.
 *
 * The options below return a simple, fast 404 page for URLs matching a
 * specific pattern:
 * - $config['system.performance']['fast_404']['exclude_paths']: A regular
 *   expression to match paths to exclude, such as images generated by image
 *   styles, or dynamically-resized images. The default pattern provided below
 *   also excludes the private file system. If you need to add more paths, you
 *   can add '|path' to the expression.
 * - $config['system.performance']['fast_404']['paths']: A regular expression to
 *   match paths that should return a simple 404 page, rather than the fully
 *   themed 404 page. If you don't have any aliases ending in htm or html you
 *   can add '|s?html?' to the expression.
 * - $config['system.performance']['fast_404']['html']: The html to return for
 *   simple 404 pages.
 *
 * Remove the leading hash signs if you would like to alter this functionality.
 */
# $config['system.performance']['fast_404']['exclude_paths'] = '/\/(?:styles)|(?:system\/files)\//';
# $config['system.performance']['fast_404']['paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
# $config['system.performance']['fast_404']['html'] = '<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

/**
 * Override the default service container class.
 *
 * This is useful for example to trace the service container for performance
 * tracking purposes, for testing a service container with an error condition or
 * to test a service container that throws an exception.
 */
# $settings['container_base_class'] = '\Drupal\Core\DependencyInjection\Container';

/**
 * Override the default yaml parser class.
 *
 * Provide a fully qualified class name here if you would like to provide an
 * alternate implementation YAML parser. The class must implement the
 * \Drupal\Component\Serialization\SerializationInterface interface.
 */
# $settings['yaml_parser_class'] = NULL;

/**
 * Trusted host configuration.
 *
 * Drupal core can use the Symfony trusted host mechanism to prevent HTTP Host
 * header spoofing.
 *
 * To enable the trusted host mechanism, you enable your allowable hosts
 * in $settings['trusted_host_patterns']. This should be an array of regular
 * expression patterns, without delimiters, representing the hosts you would
 * like to allow.
 *
 * For example:
 * @code
 * $settings['trusted_host_patterns'] = [
 *   '^www\.example\.com$',
 * ];
 * @endcode
 * will allow the site to only run from www.example.com.
 *
 * If you are running multisite, or if you are running your site from
 * different domain names (eg, you don't redirect http://www.example.com to
 * http://example.com), you should specify all of the host patterns that are
 * allowed by your site.
 *
 * For example:
 * @code
 * $settings['trusted_host_patterns'] = [
 *   '^example\.com$',
 *   '^.+\.example\.com$',
 *   '^example\.org$',
 *   '^.+\.example\.org$',
 * ];
 * @endcode
 * will allow the site to run off of all variants of example.com and
 * example.org, with all subdomains included.
 */

/**
 * The default list of directories that will be ignored by Drupal's file API.
 *
 * By default ignore node_modules and bower_components folders to avoid issues
 * with common frontend tools and recursive scanning of directories looking for
 * extensions.
 *
 * @see \Drupal\Core\File\FileSystemInterface::scanDirectory()
 * @see \Drupal\Core\Extension\ExtensionDiscovery::scanDirectory()
 */
$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

/**
 * The default number of entities to update in a batch process.
 *
 * This is used by update and post-update functions that need to go through and
 * change all the entities on a site, so it is useful to increase this number
 * if your hosting configuration (i.e. RAM allocation, CPU speed) allows for a
 * larger number of entities to be processed in a single batch run.
 */
$settings['entity_update_batch_size'] = 50;

/**
 * Entity update backup.
 *
 * This is used to inform the entity storage handler that the backup tables as
 * well as the original entity type and field storage definitions should be
 * retained after a successful entity update process.
 */
$settings['entity_update_backup'] = TRUE;

/**
 * Node migration type.
 *
 * This is used to force the migration system to use the classic node migrations
 * instead of the default complete node migrations. The migration system will
 * use the classic node migration only if there are existing migrate_map tables
 * for the classic node migrations and they contain data. These tables may not
 * exist if you are developing custom migrations and do not want to use the
 * complete node migrations. Set this to TRUE to force the use of the classic
 * node migrations.
 */
$settings['migrate_node_migrate_type_classic'] = FALSE;

// Automatically generated include for settings managed by ddev.
if (file_exists(__DIR__ . '/settings.ddev.php') && getenv('IS_DDEV_PROJECT') == 'true') {
  include __DIR__ . '/settings.ddev.php';
}

/**
 * Load local development override configuration, if available.
 *
 * Create a settings.local.php file to override variables on secondary (staging,
 * development, etc.) installations of this site.
 *
 * Typical uses of settings.local.php include:
 * - Disabling caching.
 * - Disabling JavaScript/CSS compression.
 * - Rerouting outgoing emails.
 *
 * Keep this code block at the end of this file to take full effect.
 */
#
$settings['state_cache'] = TRUE;

if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}

