<?php

/**
 * Get site env
 * @return string
 */
function get_site_env()
{
    return CONF_APP_DATA["config"]["siteEnv"] ?? "local";
}

/**
 * Get site name
 * @return null|string
 */
function get_site_name()
{
    return CONF_APP_DATA["config"]["siteName"] ?? null;
}

/**
 * Get site url
 * @param string|null $path
 * @return string
 */
function get_my_site_url(?string $path = null)
{
    return (CONF_APP_DATA["config"]["siteUrl"] ?? "") . $path;
}

/**
 * Get site assets url
 * @param string|null $asset
 * @return string
 */
function get_site_asset_url(?string $asset = null)
{
    return (CONF_APP_DATA["config"]["siteAssetsUrl"] ?? "") . ($asset ?? "");
}

/**
 * Get site logo
 * @return null|string
 */
function get_site_logo()
{
    return CONF_APP_DATA["config"]["siteLogo"] ?? null;
}

/**
 * Get site favicon
 * @return null|string
 */
function get_site_favicon()
{
    return CONF_APP_DATA["config"]["siteFavicon"] ?? null;
}

/**
 * Get header nav
 * @return array
 */
function get_site_header_nav()
{
    return CONF_APP_DATA["config"]["header"]["nav"] ?? [];
}

/**
 * Get site page data
 * @param string $dataKeys data keys separated by .
 * @return array
 */
function get_site_page_data(string $dataKeys)
{
    $keys = explode(".", $dataKeys);
    $data = CONF_APP_DATA;

    foreach ($keys as $key) {
        if (key_exists($key, $data)) {
            $data = $data[$key];
        } else {
            $data = [];
            break;
        }
    }

    return $data;
}