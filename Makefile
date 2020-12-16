install: ; composer install -o

phpunit: ; ./vendor/bin/phpunit

phpstan: ; ./vendor/bin/phpstan analyse --level 8 src

sniff: ; ./vendor/bin/phpcs --standard="PSR12" --colors src

example: ; php examples/example.php
