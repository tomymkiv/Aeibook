<h3>Manual de instalación – Aeibook (Windows 11)</h3> <br>
Aclaración: estos pasos están destinados a usuarios que utilizan Windows 11.<br>
<br>
Para ejecutar esta aplicación correctamente, es necesario instalar ciertos programas (excepto un IDE, como Visual Studio Code, que no se detalla aquí).<br>
<br>

<h3>1.0 Programas requeridos</h3> <br>
1.1 Laravel Herd (Windows)<br>
1.1.1 Ingresar al siguiente enlace: https://herd.laravel.com/windows<br>
1.1.2 Ejecutar el instalador. La instalación será automática si no ocurre ningún error.<br>
1.1.3 Una vez instalado, abrir Laravel Herd e instalar PHP 8.4 y nginx desde su panel.<br>
<br>

1.2 Node.js y npm<br>
1.2.1 Ingresar al sitio oficial: https://nodejs.org/en/download<br>
1.2.2 Ejecutar el instalador y seguir las instrucciones.<br>
1.2.3 Asegurarse de seleccionar la opción "npm package manager" durante la instalación.<br>

1.2.4 Verificar desde la terminal (cmd) que estén correctamente instalados ejecutando los siguientes comandos:<br>
    • node -v<br>
    • npm -v<br>
    ![image](https://github.com/user-attachments/assets/795d829d-9ff2-447d-8e40-78b9ca6ac90f) <br>
<br>

1.3 TablePlus<br>
TablePlus es un software para administrar bases de datos de forma visual y rápida. Permite conectarse, gestionar y editar bases de datos fácilmente.<br>

1.3.1 Ingresar a: https://tableplus.com/download/ y seleccionar la versión correspondiente para Windows.<br> 
1.3.2 Ejecutar el instalador y seguir los pasos de instalación.<br> <br> 

1.4 Git <br>
1.4.1 Lo descargamos desde la página oficial: https://git-scm.com/downloads

<h3>2.0 Preparar y ejecutar el proyecto</h3> <br> 
2.1 Abrir Laravel Herd para que se inicie el servidor local.<br> 
2.2 Si vas a clonar el proyecto, asegurate de hacerlo dentro de un directorio de `C:\Users\Usuario\Herd`<br>.
2.3 Creamos la carpeta dentro de `C:\Users\Usuario\Herd` usando "mkdir 'Aeibook-test'" o el nombre que quieran (recuerdenlo para el paso 2.6.1).<br>
2.4 Una vez creado, inicializamos git en este directorio usando "git init". Luego, usamos el comando <b>git pull "https://github.com/tomymkiv/Aeibook.git</b> para traer el repositorio remoto a local. <br>
2.5 Una vez finalizado, dentro de la carpeta del proyecto (`C:\Users\Usuario\Herd\aeibook-test`) ejecutamos el comando "npm install" para todas las dependencias de Vite, necesarias para la ejecucion. <br>
2.6 Finalmente, si siguieron todos los pasos hasta acá, ejecutan "npm run dev" dentro del mismo directorio del proyecto. Una vez hecho esto, nos saldran 2 links: <img width="349" height="203" alt="image" src="https://github.com/user-attachments/assets/84feb666-3004-4405-bc10-bfeadfcda846" />. En este punto, clickeamos el de Laravel (APP_URL: http://aeibook.test).<br>
2.6.1 <h4>¡IMPORTANTE!</h4> Si les arroja un error de "vite manifest" al abrirlo en el navegador: <br><img width="415" height="67" alt="image" src="https://github.com/user-attachments/assets/935aca52-9e7c-4559-99b0-07bbc8d464b8" /><br>
Es probable que la ruta no coincida con el archivo ".env". Para eso, deben recordar el nombre que le dieron a la carpeta que crearon para almacenar el proyecto. Deben modificar el parámetro "APP_URL" y poner el nombre de la carpeta que crearon.test: <img width="307" height="20" alt="image" src="https://github.com/user-attachments/assets/e88cc79e-bcd6-49b4-a1c7-6763ed8cf38d" /><br>
Esto debido a que cada vez que lo ejecuten, se usará el valor del archivo mencionado (Aeibook.test), el cual asume que su directorio es "Aeibook". Sin embargo, con cambiar la URL en la web es suficiente (directorio.test).<br>
Con estos cambios realizados, ahora reiniciamos el servidor y volvemos a ejecutar npm run dev como antes, pero con la URL modificada: <img width="392" height="117" alt="image" src="https://github.com/user-attachments/assets/b203080f-a198-4326-b6a8-c716f112eecf" /> <br><br>

<h3>3.0 Conexión con la base de datos (TablePlus)</h3> <br>
3.1 Abrir TablePlus y crear una nueva conexión haciendo clic en "Create connection..." (abajo a la izquierda).<br>
![image](https://github.com/user-attachments/assets/d04f92a8-233b-4e9e-9ff4-93bb7f7311eb) <br>

3.2 Seleccionar el motor SQLite.<br>
![image](https://github.com/user-attachments/assets/4cc87589-f857-43e2-a36f-5031d39332bc) <br>

3.3 En el campo de archivo, seleccionar el archivo que se encuentra en:<br>
    Aeibook/database/database.sqlite<br>
También podés asignarle un nombre para identificarlo (opcional).<br>

3.4 Guardar la configuración y conectar. Ahora podrás visualizar y gestionar la base de datos del proyecto.<br>
<br>
