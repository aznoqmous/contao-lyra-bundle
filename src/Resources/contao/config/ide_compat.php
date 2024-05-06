<?php

/**
 * This file is part of the Lyra bundle designed for Contao 4.
 *
 * Copyright (c) 2023 Aznoqmous
 * @package    Config
 * @link       https://www.aznoqmous.fr
 * @author     Paul LANDREAU <plandreau@aznoqmous.fr>
 */


// This file is not used in Contao. Its only purpose is to make PHP IDEs like
// Eclipse, Zend Studio or PHPStorm realize the class origins, since the dynamic
// class aliasing we are using is a bit too complex for them to understand.

namespace {
    \define('TL_ROOT', __DIR__ . '/../../../../../');
    \define('TL_ASSETS_URL', 'http://localhost/');
    \define('TL_FILES_URL', 'http://localhost/');
}

namespace  {
    class MyClassLyra extends \Contao\MyClassLyra {}
}
