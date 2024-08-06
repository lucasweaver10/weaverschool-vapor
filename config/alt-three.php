<?php

declare(strict_types=1);

/* Lucas renamed this to alt-three.php from segment.php because of switching to segmentio */

/*
 * This file is part of Alt Three Segment.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Segment Write Key
    |--------------------------------------------------------------------------
    |
    | This option specifies key which enables you to write to Segment's API.
    |
    | Default: ''
    |
    */

    'write_key' => env('SEGMENT_WRITE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Segment Init Options
    |--------------------------------------------------------------------------
    |
    | This option specifies an array of options to initialize Segment.
    |
    | See: https://segment.com/docs/sources/server/php/#configuration.
    |
    | Default: []
    |
    */

    'init_options' => [],
];
