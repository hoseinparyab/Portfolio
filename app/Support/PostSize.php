<?php

namespace App\Support;

class PostSize
{
    public static function maxBytes(): int
    {
        $postMaxSize = ini_get('post_max_size');

        if (is_numeric($postMaxSize)) {
            return (int) $postMaxSize;
        }

        $metric = strtoupper(substr($postMaxSize, -1));
        $postMaxSize = (int) $postMaxSize;

        return match ($metric) {
            'K' => $postMaxSize * 1024,
            'M' => $postMaxSize * 1048576,
            'G' => $postMaxSize * 1073741824,
            default => $postMaxSize,
        };
    }

    public static function exceedsMessage(int $contentLength): string
    {
        return sprintf(
            'POST Content-Length of %d bytes exceeds the limit of %d bytes',
            $contentLength,
            self::maxBytes()
        );
    }
}
