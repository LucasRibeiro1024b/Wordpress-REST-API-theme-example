# Wordpress API REST
A wordpress api rest example.

## Wordpress plugins needed:
<ul>
  <li>
    <a href="https://github.com/Tmeister/wp-api-jwt-auth">JWT Authentication for WP-API
    </a>
  </li>
</ul>

### After installing JWT Authentication for WP-API

Add this to .htaccess file:

```
RewriteEngine on
RewriteCond %{HTTP:Authorization} ^(.*)
RewriteRule ^(.*) - [E=HTTP_AUTHORIZATION:%1]
```

Then go to https://api.wordpress.org/secret-key/1.1/salt/ to get your WordPress API key.<br>
Now copy and past these lines in wp-config.php changing with your api-key (it could be any of those in the link above).

```php
define('JWT_AUTH_SECRET_KEY', 'STRING AQUI');
define('JWT_AUTH_CORS_ENABLE', true);
```
