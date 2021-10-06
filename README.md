## Docker

Utiliza docker para crear los contenedores con todo lo necesario para el proyecto.

``` bash
docker-compose up -d
docker exec -it bicicletas-php-fpm composer install 
```

### Agregar las configuraciónes

Puedes ejecutar **cp .env .env.local** y agregar la siguiente configuración en **.env.local**:

#### Configuración para la DB

Modificar la siguiente configuración para conectar con la DB loca:

``` bash
DATABASE_URL=mysql://demo:demo@mariadb/bicicletas
```

Correr el siguiente comando para crear las tablas:

``` bash
docker exec -it bicicletas-php-fpm php bin/console doctrine:schema:update --force
```

### Listo, ahora puedes ingresar a http://localhost:8083