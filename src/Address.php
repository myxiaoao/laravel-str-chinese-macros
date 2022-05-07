<?php

namespace Cooper\StrChineseMacros;

use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class Address
{
    public const PARSE_RULE = [
        'province' => '省|自治区|北京市|天津市|上海市|重庆市|澳门特别行政区|香港特别行政区',
        'city' => '市|自治州|地区|区划|县',
        'district' => '区|县|镇|乡|街道'
    ];

    /**
     * @param  string  $address
     *
     * @return array
     */
    #[ArrayShape([
        'original_address' => "string",
        'province' => "mixed|string",
        'city' => "mixed|string",
        'district' => "mixed|string",
        "address" => "mixed|string"
    ])]
    public static function parse(string $address): array
    {
        return [
            'original_address' => $address,
            'province' => static::parseProvince($address),
            'city' => static::parseCity($address),
            'district' => static::parseDistrict($address),
            "address" => $address
        ];
    }

    /**
     * @param  string  $address
     *
     * @return string
     */
    private static function parseProvince(string &$address): string
    {
        return static::parseExecute($address, static::PARSE_RULE['province']);
    }

    /**
     * @param  string  $address
     *
     * @return string
     */
    private static function parseCity(string &$address): string
    {
        return static::parseExecute($address, static::PARSE_RULE['city']);
    }

    /**
     * @param  string  $address
     *
     * @return string
     */
    private static function parseDistrict(string &$address): string
    {
        return static::parseExecute($address, static::PARSE_RULE['district']);
    }

    /**
     * @param  string  $address
     * @param  string  $pregRule
     *
     * @return string
     */
    private static function parseExecute(string &$address, string $pregRule): string
    {
        preg_match('/(.*?('.$pregRule.'))/u', $address, $matches);
        $result = $matches[count($matches) - 2] ?? '';
        $address = Str::replace($result, '', $address);

        return $result;
    }
}
