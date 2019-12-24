# Mage2 Module OrviSoft AddToCartByUrl

    `orvisoft/module-addtocartbyurl`

 - [Main Functionalities](#main-functionalities)
 - [Installation](#installation)
 - [How to Use](#how-to-use)



## Main Functionalities
This module will help create Add to Cart by URL (usable with Facebook Stores)

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/OrviSoft/AddToCartByUrl`
 - Enable the module by running `php bin/magento module:enable OrviSoft_AddToCartByUrl`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require orvisoft/module-addtocartbyurl`
 - enable the module by running `php bin/magento module:enable OrviSoft_AddToCartByUrl`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## How to Use

Its pretty simple, install and navigate to {your-site}/quickcart/addtocart/bysku/sku/{your-sku-here}