
## Product Bulk Upload
###### This package works only with ECTBX CRM.
### Installation

- Copy the package in packages directory in application root.
> Folder: packages/ProductBulkUpload

- Update the *composer.json* file, and add following lines under *autoload*, under *psr-4*, remove comma at the end if this is last line under *psr-4*..
```php
"ProductBulkUpload\\": "packages/ProductBulkUpload/src",
```

- Register the package in *config/app.php* file under the *providers* array
```php
ProductBulkUpload\Providers\ProductBulkUploadServiceProvider::class,
```

- Update composer
> composer dump-autoload  OR composer update
