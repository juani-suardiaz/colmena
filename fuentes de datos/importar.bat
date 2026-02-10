@echo off
:: Definición de variables
set "USUARIO=root"
set "PASSWORD="
set "BASE_DATOS=colmena"
set "RUTA_SQL=C:\xampp\htdocs\colmena\fuentes de datos\importar.sql"
set "RUTA_LOG=C:\xampp\htdocs\colmena\fuentes de datos\errores.txt"

cd C:\xampp\mysql\bin
echo Iniciando importacion para la base de datos lolo...
mysql -u %USUARIO% -p%PASSWORD% %BASE_DATOS% < "%RUTA_SQL%" 2> "%RUTA_LOG%"

echo Proceso completado.
pause