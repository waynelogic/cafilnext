<?php

declare(strict_types=1);

if (! function_exists('phone')) {
    function phone(string $phone): string
    {
        return preg_replace('/[^\d+]/', '', $phone);
    }
}
