Para que el proyecto funcione correctamente, pegar todo el proyecto (carpeta DWES04) dentro de la carpeta htdocs de xampp y
crear un fichero .htaccess dentro del directorio DWES04\public\ del proyecto con el siguiente código:

RewriteEngine On
RewriteBase /DWES04/public
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?/$1 [QSA,L]
