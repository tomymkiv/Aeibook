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

<h3>2.0 Instalación de TablePlus</h3> <br> 
2.1 Ingresar a: https://tableplus.com/download/ y seleccionar la versión correspondiente para Windows.<br> 
2.2 Ejecutar el instalador y seguir los pasos de instalación.<br> <br> 


<h3>3.0 Preparar y ejecutar el proyecto</h3> <br> 
3.1 Abrir Laravel Herd para que se inicie el servidor local.<br> 
3.2 Si vas a clonar el proyecto, asegurate de hacerlo dentro de la carpeta:<br> &nbsp;&nbsp;&nbsp;&nbsp;`C:\Users\Usuario\Herd`<br> 
3.3 Luego de clonar, se generará la carpeta `Herd/Aeibook`.<br> 
3.4 Abrí la terminal dentro del directorio del proyecto:<br> &nbsp;&nbsp;&nbsp;&nbsp;`C:\Users\Usuario\Herd\Aeibook`<br> 
3.5 En esa terminal, ejecutá el siguiente comando:<br> &nbsp;&nbsp;&nbsp;&nbsp;`npm install && npm run dev`<br> Esto instalará todas las dependencias necesarias de Vite para el entorno local.<br> 
3.6 Laravel Herd te mostrará una URL local, como por ejemplo:<br> &nbsp;&nbsp;&nbsp;&nbsp;APP_URL: http://aeibook.test<br> Podés ingresar haciendo `Ctrl + clic` en el enlace.<br> <!-- Imagen correspondiente al apartado 3.6 --> <br> 
![image](https://github.com/user-attachments/assets/dfa9ee34-b94a-4b66-a3cf-ca4b98d9d2fc) <br>

<h3>4.0 Conexión con la base de datos (TablePlus)</h3> <br>
4.1 Abrir TablePlus y crear una nueva conexión haciendo clic en "Create connection..." (abajo a la izquierda).<br>
![image](https://github.com/user-attachments/assets/d04f92a8-233b-4e9e-9ff4-93bb7f7311eb) <br>

4.2 Seleccionar el motor SQLite.<br>
![image](https://github.com/user-attachments/assets/4cc87589-f857-43e2-a36f-5031d39332bc) <br>

4.3 En el campo de archivo, seleccionar el archivo que se encuentra en:<br>
    Aeibook/database/database.sqlite<br>
También podés asignarle un nombre para identificarlo (opcional).<br>

4.4 Guardar la configuración y conectar. Ahora podrás visualizar y gestionar la base de datos del proyecto.<br>
<br>
