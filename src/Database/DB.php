<?php

namespace App\Database;

use function array_column;
use function array_filter;
use function array_search;
use function array_values;
use function file_get_contents;
use function file_put_contents;
use function json_decode;
use function json_encode;
use const DATABASE_URL;

class DB
{
    private static array $data = [];

    public static function initDatabase()
    {
        self::$data = json_decode(file_get_contents(DATABASE_URL), true) ?? [];
    }

    public static function save(array $data)
    {
        self::$data[] = $data;
        self::flush();
    }

    public static function remove(string $id)
    {
        $index = array_search($id, array_column(self::$data, 'activityId'));
        unset(self::$data[$index]);
        unset($index);
        self::flush();
    }

    public static function findByName(string $activityName): ?array
    {
        return array_filter(self::$data, function ($activity) use ($activityName) {
                return $activity['activityName'] === $activityName;
            })[0] ?? null;
    }

    public static function findAll(): array
    {
        return self::$data;
    }

    private static function flush()
    {
        file_put_contents(DATABASE_URL, json_encode(array_values(self::$data)));
    }

}