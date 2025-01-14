# Monitoreo Ambiental con ESP32

Este proyecto es un sistema de gestión para una clínica veterinaria. Permite a los usuarios administrar información relacionada con clientes, mascotas y citas médicas. El sistema está desarrollado en PHP y utiliza MySQL como base de datos.

## Funcionalidades

### Características principales
- **Gestor de usuarios:** Manejo de roles y acceso por credenciales.
- **Administración de clientes:** Registro y edición de información de los dueños de mascotas.
- **Gestor de mascotas:** Registro de las mascotas asociadas a cada cliente.
- **Control de citas:** Programación y seguimiento de citas veterinarias.

### Administración
- **Inicio de Sesión del Administrador:** Permite a los administradores iniciar sesión y gestionar el sistema.
- **Gestión de Doctores:** Los administradores pueden agregar, editar y eliminar información de los doctores.
- **Gestión de Pacientes:** Los administradores pueden ver y gestionar la información de los pacientes.
- **Historial de Citas:** Los administradores pueden ver el historial de citas de los pacientes.

### Doctores
- **Inicio de Sesión del Doctor:** Permite a los doctores iniciar sesión y acceder a sus funcionalidades.
- **Agregar Pacientes:** Los doctores pueden agregar nuevos pacientes al sistema.
- **Editar Perfil:** Los doctores pueden editar su perfil.
- **Chat:** Los doctores pueden comunicarse con los pacientes a través de un sistema de chat.

### Pacientes
- **Inicio de Sesión del Paciente:** Permite a los pacientes iniciar sesión y acceder a sus funcionalidades.
- **Reservar Citas:** Los pacientes pueden reservar citas con los doctores.
- **Ver Historial de Citas:** Los pacientes pueden ver su historial de citas.

## Requisitos de instalación

- Servidor local con soporte para PHP (ejemplo: XAMPP o WAMP).
- MySQL instalado.
- Navegador web compatible.

## Configuración e instalación

1. **Descargar el proyecto:**
   - Extrae los archivos en el directorio `htdocs` (o el equivalente en tu servidor).

2. **Configurar la base de datos:**
   - Importa el archivo `veterinaria.sql` desde phpMyAdmin o mediante la línea de comandos para crear la estructura de la base de datos.
   - Asegúrate de actualizar las credenciales de la base de datos en el archivo `config.php` si es necesario.

3. **Iniciar el servidor:**
   - Ejecuta el servidor local y accede al sistema desde el navegador utilizando la URL correspondiente, por ejemplo:

     ```text
     http://localhost/veterinaria
     ```

## Credenciales de acceso

El sistema tiene usuarios predefinidos para propósitos de prueba:

### Administrador:
- **Usuario:** admin
- **Contraseña:** sistem123

### Veterinario:
- **Correo:** clagos@gmail.com
- **Contraseña:** 1234567

### Paciente:
- **Correo:** Francisco@gamil.com
- **Contraseña:** 123456
