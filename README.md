Pasos para que el mapa de map.php y visualizarEventos.php funcione correctamente.

1. Ingresar a https://console.cloud.google.com/welcome

2. Crear un proyecto.

3. Seleccionar el proyecto.

4. Seleccionar la opción, que aparece en la página principal apenas se crea el proyecto, llamada "Biblioteca API - APIs y servicios - Nombre del proyecto".

5. En la barra de búsqueda buscar las siguientes APIs:

	5.1. Places API.

	5.2. Geocoding API.

	5.3. Maps JavaScript API.

	5.4. Service Usage API (Puede que no tenga que activarla, se puede activar por defecto).

6. Seleccionar en el menú de navegación "APIs y servicios".

	6.1. Seleccionar la opción de "Crear Credenciales".

		6.1.1. Seleccionar la opción "Clave de IP".

7. En los archivos map.php y visualizarEventos.php, en las lineas 2 y 19 respectivamente, copiar la IP generada en el paso 6.1.1.

8. Seleccionar la opción "Credenciales".

	8.1. Seleccionar la API creada(Clave de API 1).

		8.1.1. Seleccionar la opción "Direcciones IP (servidores web, trabajos cron, etcétera.)".

		8.1.2. Seleccionar la opción "ADD".

			8.1.2.1. Ingresar la dirección IP donde usted se encuentre tabajando.
		
		8.1.3. Guardar los cambios.

Cosas a tener en cuenta.

1. Se usó XAMPP como herramienta para visualizar la página de manera local, y para hacer el manejo de la Base de Datos por medio de phpMyAdmin(dailypost.sql).

	1.1. Si desea usar otra base de datos, el archivo conexion.php lo debería editar y hacer la respectiva conexión.

2. Si va a trabajar en el proyecto desde otra ubicación, debe realizar el paso 8 y sus pasos consecuentes.

3. Se puede implementar, como mejoras, que los creadores de eventos puedan editar sus eventos y que los eventos tengan reseñas.

4. Si tiene alguna recomendación o propuesta de trabajo, me la puede comentar por medio de mi LinkedIn: https://www.linkedin.com/in/david-agudelo-tapias-877b61257/