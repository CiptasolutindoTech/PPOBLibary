# Laravel PPOB Helper

A helper for sending PPOB request in laravel, designed for ciptasolutindo and team.
Curently support for laravel 8+ and php 7.3+

## Installation

1. Add vcs repo to ```composer.json```

    ```json
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/CiptasolutindoTech/PPOBLibary"
            }
        ],
    ```

2. Add ```cst/ppob-laravel``` to required package in composer json or run in terminal :

    ```bash
        composer require cst/ppob-laravel
    ```

3. Add api url,secret and auth optionaly you can add default phone number for testing

    ```env
        PPOB_SERVER_API_URL=https://example.com/api
        PPOB_AUTH_KEY=xxxxxxx
        
        # PPOB_TEST_PHONE_NUMBERS also work
        TEST_PHONE_NUMBERS=08123456789
    ```

4. Publish Assets if needed:

    ```bash
        php artisan vendor:publish --tag=ppob
    ```

## Usage

Basic usage:

```php
    use Cst\WALaravel\PPOB; // at the top of the file

    // Get list pulsa
    PPOB::pulsa("08123456789")->inquiry();
    // Pay selected product :  pay(ppob_product_code,id_transaksi)
    PPOB::pulsa("08123456789")->pay(1,1);
    
```
