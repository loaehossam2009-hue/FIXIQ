
<?php

function checkWebsiteUrl($url)
{
    $url = trim($url);

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return [
            "valid" => false,
            "message" => "Please enter a valid website URL."
        ];
    }

    $scheme = strtolower(
        parse_url($url, PHP_URL_SCHEME) ?? ""
    );

    if (!in_array($scheme, ["http", "https"], true)) {
        return [
            "valid" => false,
            "message" => "Only HTTP and HTTPS URLs are allowed."
        ];
    }

    $host = parse_url($url, PHP_URL_HOST);

    if (!$host || !str_contains($host, ".")) {
        return [
            "valid" => false,
            "message" => "Please enter a valid website domain."
        ];
    }

    return [
        "valid" => true,
        "message" => "The URL format is valid. Ready for accessibility testing!",
        "url" => $url
    ];
}
