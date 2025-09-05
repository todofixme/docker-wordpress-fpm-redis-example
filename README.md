# Optimized WordPress (Nginx + PHP-FPM + MariaDB + Redis)

A production‑ready Docker Compose example for a fast, cache‑friendly WordPress stack with Nginx FastCGI cache, PHP‑FPM tuning, OPcache, Redis object cache, and a tuned MariaDB configuration. Includes a hardened Nginx config.

## How-to run
1) Fill the 8 WordPress salts/keys in [wp-config.php](./php/wp-config.php) with strong random values.

2) Start the stack
```shell
docker compose up -d
```

3) Finish installation of WordPress: http://localhost:8080/

## Redis
Install the plugin "Redis Object Cache" to activate Redis support.

## WooCommerce (optional)
This setup has a site running WooCommerce in mind. Just install the plugin "WooCommerce".

## Sample Data

### FakerPress
To generate sample data you can use the plugin "FakerPress".

### Theme Unit Test
* Download XML-file from https://github.com/wpaccessibility/a11y-theme-unit-test
* Import via Tools / Import / WordPress

### WooCommerce
* Download CSV-file from https://glover.us/blog/woocommerce-sample-data-set/
* Import via Product / Import