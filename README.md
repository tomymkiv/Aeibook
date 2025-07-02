Aclaración: estos pasos son para usuarios pertenecientes a Windows 11. <br> <br>

Para ejecutar esta app tuve que instalar varios programas (omitiendo un IDE. En mi caso, uso VSCode): <br> <br>

1 - Laravel Herd (windows). Incluye php (8.4 para esta app) y nginx <br>
2 - npm y Node <br>
3 - TablePlus <br>
4 - Vite (incluido dentro de la creacion del proyecto) <br> <br>

Laravel Herd: <br>
1.1 - Ingresar al siguiente link: https://herd.laravel.com/windows <br>
1.2 - Ejecutar el programa. La instalación será automática si todo sale bien <br>
1.3 - Instalar, dentro de Herd, PHP 8.4 y nginx <br>

npm y Node: <br>
2.1 - Instalar node ingresando a https://nodejs.org/en/download <br>
2.2 - Seguir las instrucciones del programa ejecutable. <br>
2.3 - Asegurense de seleccionar la opcion de "npm package manager". <br>
![image](https://github.com/user-attachments/assets/2517e7f2-36a2-4f16-9c61-1d024bc29234)
<br>
2.4 - Verificar que todo esté instalado usando "node -v" y "npm -v". <br>

TablePlus: software de administración de bases de datos que sirve para conectarse, visualizar, gestionar y editar bases de datos de forma rápida y sencilla <br><br>

Instalacion: <br><br>

3.1 - Entramos al link y elegimos la version: https://tableplus.com/download/ <br>
3.2 - Ejecutamos el programa y seguimos los pasos correspondientes <br>
3.3 - Una vez instalado, crearemos una nueva conexion (Create connection..., abajo a la izquierda) <br>
3.4 - Elegimos el motor SQLite <br>
3.5 - Añadimos el archivo de la app (Aeibook/database/database.sqlite) y le asignamos el nombre para poder identificarlo (esto último es opcional) <br>
3.6 - Guardamos y conectamos la base de datos para ver la informacion de esta. <br><br>

Una vez tenemos todos estos programas, toca ejecutar el proyecto. <br><br>

1 - Abrimos Laravel Herd para que se ejecute el server local. <br>
2 - Si pulleas el archivo, debe ser dentro de la carpeta C:\Users\Usuario\Herd. <br>
3 - Una vez se pullea, quedará la carpeta "Herd/Aeibook". <br>
4 - Cuando estemos seguros que el proyecto está alli, abrimos la terminal en el directorio de la app ('C:\Users\Usuario\Herd\Aeibook') <br>
5 - En la misma terminal, escribimos "npm run dev". <br>
6 - Elegimos la opcion de Laravel (APP_URL: http://aeibook.test). <br>
7 - Ingresamos al link usando CTRL + Click.

En el caso de que les salte un error de Vite, referido a que el manifesto no encuentra un archivo png, deben instalar algunas dependencias que faltan de este software. <br><br>

Para esto deben ingresar al directorio del proyecto (desde una terminal) e ingresar:<br><br>

npm install<br>
npm run dev<br><br>

Luego, les saldra algo muy similar a los puntos 6 y 7 de la instalacion.
