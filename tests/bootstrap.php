<?php

use Symfony\Component\ErrorHandler\DebugClassLoader;

require dirname(__DIR__).'/vendor/autoload.php';

// Reports methods that miss a native return type their parent declares or announces,
// so such deprecations fail the suite through the deprecation baseline in phpunit.xml.dist.
DebugClassLoader::enable();
