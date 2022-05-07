<?php

namespace Cooper\StrChineseMacros\Macros;

/**
 * Parse China Address
 *
 * @param  string  $address
 *
 * @mixin \Illuminate\Support\Str
 *
 * @return array
 */
class ParseAddress
{
    public const PARSE_RULE = [
        'province' => '省|自治区|北京市|天津市|上海市|重庆市|澳门特别行政区|香港特别行政区',
        'city' => '市|自治州|地区|区划|县',
        'district' => '区|县|镇|乡|街道'
    ];

    public function __invoke(): \Closure
    {
        $parseRule = static::PARSE_RULE;

        return static function (string $address) use ($parseRule) {
            $originalAddress = $address;

            preg_match('/(.*?('.$parseRule['province'].'))/u', $address, $matches);
            if (count($matches) > 1) {
                $province = $matches[count($matches) - 2];
                $address = preg_replace('/(.*?('.$parseRule['province'].'))/u', '', $address, 1);
            }

            preg_match('/(.*?('.$parseRule['city'].'))/u', $address, $matches);
            if (count($matches) > 1) {
                $city = $matches[count($matches) - 2];
                $address = str_replace($city, '', $address);
            }

            preg_match('/(.*?('.$parseRule['district'].'))/u', $address, $matches);
            if (count($matches) > 1) {
                $district = $matches[count($matches) - 2];
                $address = str_replace($district, '', $address);
            }

            return [
                'original_address' => $originalAddress,
                'province' => $province ?? '',
                'city' => $city ?? '',
                'district' => $district ?? '',
                "address" => $address
            ];
        };
    }
}
