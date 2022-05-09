# Laravel Str Chinese Macros
![Packagist Version](https://img.shields.io/packagist/v/cooper/laravel-str-chinese-macros)
![Packagist License](https://img.shields.io/packagist/l/cooper/laravel-str-chinese-macros)
![GitHub Main Workflow Status](https://img.shields.io/github/workflow/status/myxiaoao/laravel-str-chinese-macros/Tests/master)

`Illuminate\Support\Str` 中文拓展包

## 使用方法

- parseAddress `解析中文地址`
- isChinese `是否是中文`

## 安装

### 使用 Composer 安装

```
composer require cooper/laravel-str-chinese-macros
```

### 例子

```php
<?php

use Illuminate\Support\str;

Str::parseAddress('广东省深圳市南山区南海大道2163号');
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.


