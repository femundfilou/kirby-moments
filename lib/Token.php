<?php

namespace Femundfilou\Moments;

class Token
{
    /**
     * Creates a secure token with user ID
     * @param string $userId Kirby User's ID
     * @return string Token
     */
    public static function create(string $userId): string
    {
        $data = pack('Na*', time(), $userId);
        $key = self::getSecret();
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return self::base64UrlEncode($iv . $encrypted);
    }

    /**
     * Retrieves user ID from token
     * @param string $token Token
     * @return string|null User ID or null if invalid
     */
    public static function getUserId(string $token): ?string
    {
        $decoded = self::base64UrlDecode($token);
        $iv = substr($decoded, 0, 16);
        $encrypted = substr($decoded, 16);
        $key = self::getSecret();
        $data = openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        if ($data === false) return null;
        $timestamp = unpack('N', substr($data, 0, 4))[1];
        return substr($data, 4);
    }

    private static function getSecret(): string
    {
        return hash('sha256', option('femundfilou.kirby-moments.token'), true);
    }

    private static function base64UrlEncode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private static function base64UrlDecode(string $data): string
    {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (3 + strlen($data)) % 4));
    }
}
