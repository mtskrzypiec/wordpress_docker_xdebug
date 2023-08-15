#!/bin/bash

if [ "$1" == "on" ]; then
    printf "\nxdebug.idekey=PHPSTORM" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
    printf "\nzend_extension=xdebug.so" >> /etc/php/$PHP_VERSION/fpm/conf.d/xdebug.ini
    printf "\nxdebug.max_nesting_level=9999" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
    printf "\nxdebug.remote_enable=On" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
    printf "\nxdebug.remote_host=$2" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
    printf "\nxdebug.remote_port=$3" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
    printf "\nxdebug.remote_log=/var/log/xdebug.log" >> /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
else
    rm /etc/php/${PHP_VERSION}/fpm/conf.d/xdebug.ini
fi

supervisorctl reload
