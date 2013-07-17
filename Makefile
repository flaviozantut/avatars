TEMP := $(shell mktemp -u)

default:
	@composer

composer: composer.json
	@if [ ! -f "composer.phar" ]; then make composer_install; else make composer_update; fi

composer_install: composer.json
	@echo "Installing composer"
	@curl -s http://getcomposer.org/installer | php
	@php composer.phar install --dev

composer_update: composer.phar
	@php composer.phar update --dev

test:
	@make composer
	vendor/bin/phpunit --coverage-html ./build/coverage --coverage-clover ./build/logs/clover.xml

phpcs:
	./vendor/bin/phpcs --standard=PSR2 ./src

doc:
	phpdoc -p -t $(TEMP)
	rm -Rf docs/*
	vendor/bin/phpdocmd $(TEMP)/structure.xml docs/


web_coverage:
	@make test
	php -S 0.0.0.0:8181 -t ./build/coverage
