install: ; composer install -o

test: ; ./vendor/bin/phpunit

unit: ; ./vendor/bin/phpunit --testsuite Unit

integration: ; ./vendor/bin/phpunit --testsuite Integration

example: ; php examples/example.php
