# Magewire PHP - Admin

## Installation
```
composer require magewirephp/magewire-admin
```

## Issues

### 1. Prototype Legacy Build
Magento, by default, includes a `./vendor/magento/module-theme/view/base/requirejs-config.js` file that defines a `'prototype': 'legacy-build.min'` entry within the paths configuration object.
   
This inclusion causes `Object.values()` to behave differently: when executing `return Object.values(t.children).map(n => n[1]).map(n => ts(n))`, an exception is thrown because it unexpectedly encounters an empty `children` array, which it cannot process properly.

By excluding the `'prototype'` path from the RequireJS configuration, Magewire is able to function correctly without errors.
