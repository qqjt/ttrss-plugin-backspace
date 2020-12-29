<?php

class No_Backspace extends Plugin
{
    private $host;

    function about()
    {
        return array(
            1.0,    // Version
            "Remove backspaces in feed content (https://github.com/qqjt/ttrss-plugin-backspace)",    // Description
            "qqjt", // Author
            false   // is_system
        );
    }

    function init($host)
    {
        $this->host = $host;
        $host->add_hook($host::HOOK_FEED_FETCHED, $this);
    }

    function hook_feed_fetched($feed_data, $fetch_url, $owner_uid, $feed)
    {
        $feed_data = str_replace(chr(8), '', $feed_data);
        return $feed_data;
    }

    function api_version()
    {
        return 2;
    }
}