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
2.4 - Verificar, dentro de la terminal (cmd), que todo esté instalado usando "node -v" y "npm -v". <br>

TablePlus: software de administración de bases de datos que sirve para conectarse, visualizar, gestionar y editar bases de datos de forma rápida y sencilla <br><br>

Instalacion: <br><br>

3.1 - Entramos al link y elegimos la version: https://tableplus.com/download/ <br>
3.2 - Ejecutamos el programa y seguimos los pasos correspondientes <br>

Una vez tenemos todos estos programas, toca ejecutar el proyecto. <br><br>

1 - Abrimos Laravel Herd para que se ejecute el server local. <br>
2 - Si clonas el proyecto, debe ser dentro de la carpeta C:\Users\Usuario\Herd. <br>
3 - Una vez se clona, quedará la carpeta "Herd/Aeibook". <br>
4 - Cuando estemos seguros que el proyecto está alli, abrimos la terminal en el directorio de la app ('C:\Users\Usuario\Herd\Aeibook'). <br>
5 - En la misma terminal, escribimos "npm install && npm run dev". De esta forma, instalaremos las dependencias de Vite que necesitamos para ejecutar el proyecto. <br>
6 - Elegimos la opcion de Laravel (APP_URL: http://aeibook.test). Ingresamos al link usando CTRL + Click. <br>
![null (1)](https://github.com/user-attachments/assets/e67ef054-1406-4512-b715-c1f437ad902a)

Conexion con la base de datos:

1 - Una vez instalado TablePlus, crearemos una nueva conexion (Create connection..., abajo a la izquierda) <br>
![image](https://github.com/user-attachments/assets/882bae2a-b352-4acd-af85-69c12576169c)<br>
2 - Elegimos el motor SQLite <br>
![null (3)](https://github.com/user-attachments/assets/e6dc2858-8eb6-4729-8b0f-91500f9eb132)<br>
3 - Añadimos el archivo de la app (Aeibook/database/database.sqlite) y le asignamos el nombre para poder identificarlo (esto último es opcional) <br>
![null (4)](https://github.com/user-attachments/assets/ed93d98b-f4c7-4b26-b1aa-221879eef8ed)<br>
4 - Guardamos y conectamos la base de datos para ver la informacion de esta. <br><br>
