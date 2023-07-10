<?php

function generate_token() {
    // $token = bin2hex(random_bytes(16));
    $token = '';

    for ($i = 0; $i < 6; $i++) {
        $token .= mt_rand(0, 9);
    }

    return $token;
}