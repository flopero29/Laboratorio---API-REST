# Laboratorio – API REST con Postman

## Universidad Tecnológica de Panamá  
**Facultad de Sistemas Computacionales**  
**Licenciatura en Ingeniería de Software**  
**Asignatura:** Ingeniería Web  
**Grupo:** 1SF131  
**Segundo Semestre - Año 2025**

---

## Integrantes
- **Jose Bustamante** – 8-1011-1717  
- **Abigail Koo** – 8-997-974  

**Facilitadora:** Irina Fong  
**Fecha de Ejecución:** 13 de noviembre de 2025  

---

## Introducción
Este proyecto presenta el desarrollo de una **API RESTful en PHP**, diseñada para gestionar productos mediante los métodos **HTTP POST, GET y PUT**.  
El desarrollo se realizó bajo el **patrón MVC (Modelo-Vista-Controlador)**, utilizando **Postman** para las pruebas de los endpoints y validación de las respuestas del servidor.  

---

## Tecnologías Utilizadas
- **PHP** – Backend  
- **MySQL** – Base de datos  
- **Apache** – Servidor web  
- **Postman** – Pruebas de API  
- **PDO** – Conexión a base de datos  
- **JSON** – Formato de intercambio de datos  
- **REST** – Arquitectura de la API  

---

## Metodología Implementada

### Configuración de la Base de Datos
- Se utilizó **MySQL con WAMPP**.  
- Creación de la tabla `productos` con los campos:
  ```sql
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  precio DECIMAL(10,2),
  stock INT
  ```
### Desarrollo de Endpoints
| Método                     | Funcionalidad                                                                 | Descripción                                                                                   |
|-------------------------------------|-------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------|
| POST         | Crear productos | Inserta un nuevo producto en la base de datos       |
| GET | Listar productos | Devuelve todos los productos existentes                      |
| PUT       | Actualizar productos | Modifica los datos de un producto por su ID     |
              
### Pruebas con POSTMAN
- Validación de cada método HTTP.

- Verificación de códigos de respuesta HTTP.

- Comprobación del manejo de errores y excepciones.

---

## Archivos Principales
| Archivo                   | Descripción                                                   | 
|-------------------------------------|-------------------------------------------------------------------------------|
|database.php       | Configuración de la conexión PDO a MySQL | 
| index.php       | Control central de las peticiones HTTP | 
|Producto.php     | Clase del modelo con atributos y métodos del producto | 
| ProductosController.php     | Controlador que maneja las operaciones CRUD | 

---

## Resultados obtenidos
### Funcionalidades implementadas
- POST: Creación exitosa de productos.
- GET: Listado correcto de productos.
- PUT: Actualización funcional por ID.
- Manejo de errores y respuestas HTTP adecuadas.

## Códigos HTTP utilizados
| Código              | Descripción                                                   | 
|-------------------------------------|-------------------------------------------------------------------------------|
|201     | Producto creado exitosamente| 
| 200       | Operación completada correctamente | 
|404     | No se encontraron productos | 
| 503     | Error en operación de base de datos | 
| 405    | Método HTTP no permitido| 

---
## Conclusiones
El desarrollo de esta API REST en PHP permitió aplicar los fundamentos de la arquitectura REST y comprender la interacción entre los métodos HTTP y el manejo de datos en formato JSON.
Se logró cumplir con todos los objetivos del laboratorio, demostrando un correcto uso del patrón MVC, la conexión PDO y las validaciones en los endpoints mediante Postman.

