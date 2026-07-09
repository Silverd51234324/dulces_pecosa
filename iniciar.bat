@echo off
title Iniciando Laravel

cd /d "%~dp0"

echo Ejecutando migraciones...
php artisan migrate

echo.

echo Iniciando servidor Laravel...
start cmd /k "php artisan serve"

echo.

echo Iniciando Vite...
start cmd /k "npm run dev"

exit