# Add multiple contacts for a User

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aecor/contactable.svg?style=flat-square)](https://packagist.org/packages/aecor/contactable)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/aecor/contactable/run-tests?label=tests)](https://github.com/aecor/contactable/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/aecor/contactable.svg?style=flat-square)](https://packagist.org/packages/aecor/contactable)


## Installation

You can install the package via composer:

```bash
composer require aecor/contactable
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Aecor\Contact\ContactServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Aecor\Contact\ContactServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    'table-name' => 'contacts'
];
```

## Usage and few examples
Prepare your model
``` php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Aecor\Contact\Traits\HasContact;

class YourModel extends Model
{
    use HasContact;
}
```

Get instance of your model
``` php
$user = \App\Models\User::find(1);
```

Add a single contact
``` php
$user->addContact([
    'type' => 'phone',
    'value' => '9999999999',
    'custom_attributes' => [
        'sub_type' => 'office'
    ],                          // Optional field
    'order_column' => 1         // Optional field
]);
```

Add multiple contacts
``` php
$user->addManyContacts([
    [
        'type' => 'phone',
        'value' => '9999999999',
    ],
    [
        'type' => 'mobile',
        'value' => '8888888888',
    ],
    [
        'type' => 'email',
        'value' => 'john@example.com',
    ],
]);
```

Get all contacts
``` php
$user->contacts;
```

Get contacts with condition
``` php
$user->contacts()->where('type', 'mobile')->get();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abrar Dhalwala](https://github.com/adhalwala)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
