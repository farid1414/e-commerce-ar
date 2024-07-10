<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

function maskString($name)
{
    // Split the name by space to handle first and last names separately
    $parts = explode(' ', $name);

    // Initialize an array to hold the masked parts
    $maskedParts = [];

    foreach ($parts as $part) {
        // Get the first and last character of the part
        $firstChar = substr($part, 0, 1);
        $lastChar = substr($part, -1);

        // Get the length of the middle part
        $middleLength = strlen($part) - 2;

        // Create the masked part
        $maskedPart = $firstChar . str_repeat('*', $middleLength) . $lastChar;

        // Add the masked part to the array
        $maskedParts[] = $maskedPart;
    }

    // Join the masked parts with a space
    return implode(' ', $maskedParts);
}
