<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Tech Sounds Plus", // set false to total remove
            'description'  => 'Download sample packs, courses, Ableton templates & royalty-free music loops for Techno music production.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['samples', 'techno samples', 'techno music', 'music samples', 'techno soundpack', 'soundbank' , 'ableton' , 'ableton template'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Tech Sounds Plus', // set false to total remove
            'description' => 'Download sample packs, courses, Ableton templates & royalty-free music loops for Techno music production.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Tech Sounds Plus',
            'images'      => ['https://techsoundsplus.com/img/logos/techsoundsplus_og.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          'card'        => 'summary',
          'site'        => '@techsoundsplus',
        ],
    ],
];
