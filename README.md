
## Ventas Lite

Sistema para la gestión de ventas desarrollado con Laravel y Livewire


## Feartures

- Agregar productos a la venta, a traves de codigo de barras
- Modulo de Usuarios
- Modulo de Productos
- Modulo Categorias
- Modulo Monedas
- Modulo Roles y permisos
- Modulo Corte de caja
- Reportes ventas por día y entre fechas (PDF y Excel)


## Installación

Puedes seguir estos pasos para la instalación:

* Clonar desde github (usar github desktop)
```bash
  gh repo clone fmoraless/jsonapi
```
* Vaya a la carpeta del proyecto
```bash
  cd my-project
```
* Instalar dependencias con composer desde consola
```bash
  composer install
```

* Instalar dependencias node
```bash
  npm install
```

## Variables de entorno

Para ejecutar este proyecto, Necesitarás añadir las siguientes variables de entorno en **.env file**

`DB_DATABASE=your-database`

`DB_USERNAME=your-username`

`DB_PASSWORD=your-password`

`APP_KEY=base64:APP_KEY` (**)

** para generar el APP_KEY, se necesita ejecutar el siguiente comando:

```bash
  php artisan key:generate
```
## Ejecutar Localmente

Ejecutar las migraciones y datos de prueba

```bash
  php artisan migrate:fresh --seed
```

Iniciar el server

```bash
  php artisan serve
```
##### ** te recomiendo usar laragon o Sail **


#
Ir a

http://ventas-lite.dev.com (tu localhost)

utilizar usuario para prueba:
```bash
    user: fmorales@mail.com
    pass: password
```


## Screenshots

#### Crear productos

![Create product](https://drive.google.com/uc?export=view&id=1NdMtgqzL2W56fJQKcc2fSEnVJHbusNtp)

#### Añadir productos a la venta
![Add products to Sale](https://drive.google.com/uc?export=view&id=1aPAIy9fBMW86hGckwr9MWxSvUFRAK1GC)

#### Asignar permisos a rol
![Add Permission to rol](https://drive.google.com/uc?export=view&id=1OPXXcuEWibbn1QGwPW6FrSX3fYx7U588)

## Feedback

Si tienes algun Feedback, por favor hazme saber fcomorales.sanchez@gmail.com

