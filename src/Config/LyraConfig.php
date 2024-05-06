<?php

namespace Aznoqmous\ContaoLyraBundle\Config;

class LyraConfig extends Config
{
    protected static $configFile = "lyra";

    public static function getOptions(): array
    {
        return [
            'username' => self::getRequired("username"),
            'password' => self::getRequired("password"),
            'public_key' => self::getRequired("public_key"),
            'sha_key' => self::getRequired("sha_key"),
            'server' => self::getRequired("server"),
            'domain_url' => self::getRequired("domain_url"),
            'notification_url' => self::getRequired("notification_url")
        ];
    }

    public static function getUsername(): string
    {
        return self::getRequired("username");
    }

    public static function getPassword(): string
    {
        return self::getRequired("password");
    }

    public static function getPublicKey(): string
    {
        return self::getRequired("public_key");
    }

    public static function getShaKey(): string
    {
        return self::getRequired("sha_key");
    }

    public static function getServer(): string
    {
        return self::getRequired("server");
    }

    public static function getDomainUrl(): string
    {
        return self::getRequired("domain_url");
    }

    public static function getCurrency(): string
    {
        return self::getRequired("currency");
    }

    public static function getSuccessUrl(): string
    {
        return self::getRequired("success_url");
    }

    public static function getNotificationUrl(): string
    {
        return self::getRequired("notification_url");
    }
}
