<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Breadcrumbs Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to customize the behavior of the
    | breadcrumb package. You can enable/disable features, change the
    | default settings, and more.
    |
    */

    // Whether to include the home breadcrumb by default
    'home_breadcrumb' => true,

    // Default separator for breadcrumb links
    'separator' => ' > ',

    // The view to use for rendering breadcrumbs (optional, use your own custom view)
    'view' => 'breadcrumbs::bootstrap4', // change this if using a different view for breadcrumbs

    // The default breadcrumb delimiter
    'delimiter' => ' &raquo; ',
];
