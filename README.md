# Laravel AvaTax Integration

This package provides an integration with Avalara's AvaTax API for Laravel applications. It includes services for handling transactions, tax codes, tax rules, and more.

## Installation

### Step 1: Install the Package

You can install the package via Composer:

```php
composer require oscar-team/avatax-laravel
```

### Step 2: Publish the Configuration
Publish the package configuration using the following Artisan command:
```php
php artisan vendor:publish --provider="OscarTeam\AvaTax\AvaTaxServiceProvider"
```
### Step 3: Configure AvaTax
Add your Avalara credentials to the .env file:
```dotenv
AVATAX_APP_NAME=demo
AVATAX_APP_VERSION=1
AVATAX_MACHINE_NAME=localhost
AVATAX_ACCOUNT_ID=your_account_id
AVATAX_LICENSE_KEY=your_license_key
AVATAX_ENVIRONMENT=sandbox # or production
```
## Usage

### Example 1: Creating a Simple Transaction

```php
use OscarTeam\AvaTax\Facades\AvaTax;
use Avalara\DocumentType;

// Create a new transaction
$transaction = AvaTax::createTransaction([
    'companyCode' => 'DEFAULT',
    'type' => DocumentType::C_SALESINVOICE,
    'customerCode' => 'ABC',
    'addresses' => [
        'SingleLocation' => [
            'line1' => '123 Main Street',
            'city' => 'Irvine',
            'region' => 'CA',
            'postalCode' => '92615',
            'country' => 'US'
        ]
    ],
    'lines' => [
        [
            'amount' => 100.0,
            'quantity' => 1,
            'itemCode' => 'P0000000'
        ]
    ]
]);

echo '<pre>' . json_encode($transaction, JSON_PRETTY_PRINT) . '</pre>';
```



