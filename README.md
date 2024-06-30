# Laravel Cart

<img src="https://banners.beyondco.de/Laravel%20Cart.png?theme=light&packageManager=composer+require&packageName=binafy%2Flaravel-cart&pattern=autumn&style=style_1&description=customizable+package+for+adding+shopping+cart+functionality+to+Laravel+applications&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="binafy-laravel-cart" />

[![PHP Version Require](http://poser.pugx.org/binafy/laravel-cart/require/php)](https://packagist.org/packages/binafy/laravel-cart)
[![Latest Stable Version](http://poser.pugx.org/binafy/laravel-cart/v)](https://packagist.org/packages/binafy/laravel-cart)
[![Total Downloads](http://poser.pugx.org/binafy/laravel-cart/downloads)](https://packagist.org/packages/binafy/laravel-cart)
[![License](http://poser.pugx.org/binafy/laravel-cart/license)](https://packagist.org/packages/binafy/laravel-cart)
[![Passed Tests](https://github.com/binafy/laravel-cart/actions/workflows/tests.yml/badge.svg)](https://github.com/binafy/laravel-cart/actions/workflows/tests.yml)

<a name="introduction"></a>
## Introduction

The `Laravel Cart` is a highly customizable and flexible package that integrates basket functionality into your Laravel application. It simplifies storing and managing cart items, supporting multiple item types and quantities. It is ideal for e-commerce platforms to create carts, attach items, and manage them efficiently. Installation is straightforward via Composer, and it offers robust features like secure item storage, easy cart manipulation, and seamless integration with your existing Laravel app.

## Features:

- Secure cart information storage and management
- Support for multiple payment gateways
- Recurring payment and subscription management
- Robust validation and error handling
- Highly customizable and flexible architecture

<a name="installation"></a>
## Installation

You can install the package with Composer:

```bash
composer require binafy/laravel-cart
```

<a name="publish"></a>
## Publish

If you want to publish a config file, you can use this command:

```shell
php artisan vendor:publish --tag="laravel-cart-config"
```

If you want to publish the migrations, you can use this command:

```shell
php artisan vendor:publish --tag="laravel-cart-migrations"
```

For convenience, you can use this command to publish config, migration, and ... files:

```shell
php artisan vendor:publish --provider="Binafy\LaravelCart\Providers\LaravelCartServiceProvider"
```

After publishing, run the `php artisan migrate` command.

<a name="usage"></a>
## Usage

<a name="store-cart"></a>
### Store Cart

For storing a new cart, you can use `Cart` model:

```php
use \Binafy\LaravelCart\Models\Cart;

$cart = Cart::query()->firstOrCreate(['user_id' => $user->id]);
```

<a name="store-items-for-a-cart"></a>
### Store Items For a Cart

If you want to store items for cart, first you need to create a cart and attach items to cart:

```php
$cart = Cart::query()->firstOrCreate(['user_id' => $user->id]);
$cartItem = new CartItem([
    'itemable_id' => $itemable->id,
    'itemable_type' => $itemable::class,
    'quantity' => 1,
]);

$cart->items()->save($cartItem);
```

If you may to access the items of one cart, you can use `items` relation that exists in Cart model.

> There is no need to use any Interface or something for itemable.   

<a name="access-itemable"></a>
### Access Itemable

If you want to access to itemable in `CartItem`, you can use `itemable` relation:

```php
$cartItem = new CartItem([
    'itemable_id' => $itemable->id,
    'itemable_type' => $itemable::class,
    'quantity' => 1,
]);

$cartItem->itemable()->first(); // Return Model Instance
```

<a name="create-cart-with-storing-items"><a>
### Create Cart With Storing Items

```php
Cart::query()->firstOrCreateWithStoreItems(
    item: $product,
    quantity: 1,
    userId: $user->id
);
```

<a name="store-multiple-items"></a>
### Store multiple items

If you may to store multiple items for a cart, you can use `storeItems` method:

```php
$items = [
    [
        'itemable' => $product1,
        'quantity' => 2,
    ],
    [
        'itemable' => $product2,
        'quantity' => 1,
    ],
    [
        'itemable' => $product3,
        'quantity' => 5,
    ],
];

$cart = Cart::query()->firstOrCreate(['user_id' => $user->id]);
$cart->storeItems($items);
```

### Delete Item From Cart

If you may to delete an item for a cart, you can use `removeItem` method:

```php
$items = [
    [
        'itemable' => $product1,
        'quantity' => 2,
    ],
    [
        'itemable' => $product2,
        'quantity' => 1,
    ],
    [
        'itemable' => $product3,
        'quantity' => 5,
    ],
];

$cart = Cart::query()->firstOrCreate(['user_id' => $user->id]);
$cart->removeItem($product1);
```

### Delete All Items From Cart

If you may to delete all items from a cart, you can use `emptyCart` method:

```php
$items = [
    [
        'itemable' => $product1,
        'quantity' => 2,
    ],
    [
        'itemable' => $product2,
        'quantity' => 1,
    ],
    [
        'itemable' => $product3,
        'quantity' => 5,
    ],
];

$cart = Cart::query()->firstOrCreate(['user_id' => $user->id]);
$cart->emptyCart();
```

<a name="contributors"></a>
## Contributors

Thanks to all the people who contributed. [Contributors](https://github.com/binafy/laravel-cart/graphs/contributors).

<a href="https://github.com/binafy/laravel-cart/graphs/contributors"><img src="https://opencollective.com/laravel-cart/contributors.svg?width=890&button=false" /></a>

<a name="security"></a>
## Security

If you discover any security-related issues, please email `binafy23@gmail.com` instead of using the issue tracker.

<a name="chanelog"></a>
## Changelog

The changelog can be found in the `CHANGELOG.md` file of the GitHub repository. It lists the changes, bug fixes, and improvements made to each version of the Laravel User Monitoring package.

<a name="license"></a>
## License

The MIT License (MIT). Please see [License File](https://github.com/binafy/laravel-cart/blob/0.x-dev/LICENSE) for more information.
