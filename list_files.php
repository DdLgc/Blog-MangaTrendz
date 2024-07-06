<?php
function listFiles($dir, $level = 0) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo str_repeat(' ', $level * 4) . $file . PHP_EOL;
            if (is_dir($dir . '/' . $file)) {
                listFiles($dir . '/' . $file, $level + 1);
            }
        }
    }
}

$rootDir = __DIR__;
listFiles($rootDir);
?>
