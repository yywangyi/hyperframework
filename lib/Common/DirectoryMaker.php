<?php
namespace Hyperframework\Common;

use RuntimeException;

class DirectoryMaker {
    /**
     * @param string $path
     * @param int $mode
     * @return void
     */
    public static function make($path, $mode = 0755) {
        $fullPath = FileFullPathBuilder::build($path);
        if (is_dir($fullPath) === false) {
            try {
                if (mkdir($fullPath, $mode, true) === false) {
                    if (is_dir($fullPath) === false) {
                        throw new RuntimeException(
                            "Failed to create directory '$fullPath'."
                        );
                    }
                }
            } catch (ErrorException $e) {
                if (is_dir($fullPath) === false) {
                    throw $e;
                }
            }
        }
    }
}
