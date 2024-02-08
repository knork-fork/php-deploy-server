#!/usr/bin/php -q
<?php
declare(strict_types=1);

if (\PHP_SAPI !== 'cli') {
    echo "This script has to be run from the command line.\n";
    exit(1);
}

echo 'abcdefgh12345';
