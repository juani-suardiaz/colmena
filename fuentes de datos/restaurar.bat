@echo off
:: Definición de variables
set "USUARIO=root"
set "PASSWORD="
set "BASE_DATOS=colmena"
set "RUTA_RESTAURAR_BASE=C:\xampp\htdocs\colmena\fuentes de datos\restaurar.sql"
set "RUTA_BACKUP_BASE=C:\xampp\htdocs\colmena\fuentes de datos\BACK-UP BASE DE DATOS\colmena.sql"
set "RUTA_LOG=C:\xampp\htdocs\colmena\fuentes de datos\errores.txt"

cd C:\xampp\mysql\bin
echo Iniciando restauración para la base de datos...
mysql -u %USUARIO% -p%PASSWORD% < "%RUTA_RESTAURAR_BASE%" 2>> "%RUTA_LOG%"
mysql -u %USUARIO% -p%PASSWORD% %BASE_DATOS% < "%RUTA_BACKUP_BASE%" 2>> "%RUTA_LOG%"

echo Proceso completado.
pause