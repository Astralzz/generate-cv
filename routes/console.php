<?php

use App\Helpers\ConsoleHelper;
use App\Services\FileService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/* STUB - LIMPIEZA

    1. php artisan clear-env-app
    2. php artisan clear-cache-app
    3. php artisan optimize-app
    4. php artisan clear-all-app

*/

// * php artisan clear-env-app
Artisan::command('clear-env-app', function () {
    try {

        // Ejecutamos composer dump-autoload
        exec('composer dump-autoload');

        // Limpiamos
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->info('Caché limpiada con éxito.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se limpio el env correctamente, ' . $th->getMessage());
    }
})->purpose('Limpiar la caché del .env de la aplicación');

// * php artisan clear-cache-app
Artisan::command('clear-cache-app', function () {
    try {

        // Limpiamos
        $this->call('clear-compiled');
        $this->call('cache:clear');
        $this->call('config:cache');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('route:cache');
        $this->call('view:clear');
        $this->info('Caché limpiada con éxito.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se limpio la app correctamente, ' . $th->getMessage());
    }
})->purpose('Limpiar la caché de la aplicación');

// * php artisan optimize-app
Artisan::command('optimize-app', function () {
    $this->call('clear-compiled');
    $this->call('optimize:clear');
    $this->call('config:cache');
    $this->call('route:cache');
    $this->info('Optimización completada.');
})->purpose('Optimizar la aplicación para un mejor rendimiento');

// * php artisan clear-all-app
Artisan::command('clear-all-app', function () {
    $this->call('clear-env-app');
    $this->call('optimize-app');
    $this->call('clear-cache-app');
    $this->info('Limpieza total de la app realizada con éxito.');
})->purpose('Limpiar al completo la app');

/* STUB - INFORMACIÓN

    1. php artisan inf-server
    2. php artisan inf-server-connection
    3. php artisan list-packages
    4. php artisan env-info

*/

// * php artisan inf-server
Artisan::command('inf-server', function () {
    $this->line('');
    $this->comment('UAGRO APP SERVER');
    $this->line('');
    $this->line('Desarrollador ..................... Ing Edain Jesus Cortez Ceron');
    $this->line('Creación .......................... 4 de diciembre del 2023');
    $this->line('Descripción ....................... Servidor oficial de la aplicación de la Universidad autónoma de Guerrero');
    $this->line('');
    $this->comment("CONTACTO DESARROLLADOR:");
    $this->line('');
    $this->info('Email ............. daiinxd13@gmail.com');
    $this->info('GitHub ............. https://github.com/Astralzz');
    $this->line('');
})->purpose('Obtener información del servidor');

// * php artisan inf-server-connection
Artisan::command('inf-server-connection', function () {
    try {
        // Verificar la conexión a la BD
        DB::connection()->getPdo();

        // Éxito
        $this->info('La conexión a la base de datos es correcta.');

        // Obtener información del servidor
        $serverInfo = [
            'Sistema operativo' => PHP_OS,
            'Versión de PHP' => phpversion(),
            'Versión de Laravel' => app()->version(),
        ];

        // Mostrar información
        $this->table(array_keys($serverInfo), [$serverInfo]);
    } catch (\Exception $e) {
        $this->error('Error en la conexión a la base de datos: ' . $e->getMessage());
    }
})->purpose('Obtener información del servidor y verificar la conexión a la base de datos.');

// * php artisan list-packages
Artisan::command('list-packages', function () {

    try {

        // Obtenemos inf del archivo
        $composerJsonPath = base_path('composer.json');

        // ? Existe
        if (file_exists($composerJsonPath)) {

            // Decodificamos
            $composerJson = json_decode(file_get_contents($composerJsonPath), true);

            // ? Existen paquetes
            if (isset($composerJson['require'])) {

                $this->info('Paquetes instalados:');

                // Recorremos
                foreach ($composerJson['require'] as $package => $version) {
                    $this->line("- {$package}: {$version}");
                }

                return;
            }

            throw new \Exception('No se encontraron paquetes instalados en composer.json.');
        }

        // ! Archivo no encontrado
        throw new \Exception('No se encontró el archivo composer.json en la ubicación predeterminada.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se obtuvieron los paquetes correctamente, ' . $th->getMessage());
    }
})->purpose('Listar los paquetes instalados en el proyecto Laravel');

// * php artisan env-info
Artisan::command('env-info', function () {
    $this->line('Información del entorno:');
    $this->info('Versión de PHP: ' . phpversion());
})->purpose('Mostrar información del entorno');

/* STUB - ACCIONES

    1. php artisan generate-key lg n

    ! PASS CONSOLE

    1. php artisan migrate-app
    2. php artisan migrate-refresh-app
    3. php artisan update-key-app
    4. php artisan update-app
    5. php artisan update-app
    6. php artisan clear-storage-app {directorio}

*/

// * php artisan generate-key lg n
Artisan::command('generate-key {length} {n}', function ($length = 32, $n = 1) {
    try {

        // ? Número entero positivo y no mayor a 120
        if (!ctype_digit($length) || $length < 1 || $length > 120) {
            throw new \Exception("La longitud debe ser un número entero positivo menor o igual a 120.");
        }

        for ($i = 1; $i <= $n; $i++) {
            // Generar una clave única
            $uniqueKey = \Illuminate\Support\Str::random($length);

            // Mostrar la clave única
            $this->info('Clave única ' . $i . ': ' . $uniqueKey);
        }

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se pudieron crear las keys correctamente, ' . $th->getMessage());
    }
})->purpose('Generar n claves únicas');

// * php artisan migrate-app
Artisan::command('migrate-app', function () {
    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola');

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        $this->call('migrate');
        $this->call('db:seed');

        $this->info('Migraciones y semillas ejecutadas correctamente.');
        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se hizo la migración correctamente, ' . $th->getMessage());
    }
})->purpose('Ejecutar migraciones y semillas en la base de datos');

// * php artisan migrate-refresh-app
Artisan::command('migrate-refresh-app', function () {
    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola');

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        $this->call('migrate:refresh', [
            '--seed' => true,
        ]);

        $this->info('Migraciones y semillas ejecutadas correctamente.');
    } catch (\Throwable $th) {
        $this->error('No se hizo la migración correctamente, ' . $th->getMessage());
    }
})->purpose('Refrescar y ejecutar migraciones y semillas en la base de datos');

// * php artisan update-key-app
Artisan::command('update-key-app', function () {
    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola'); // Ocultar data

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        $this->call('key:generate');
        $this->info('La clave de la aplicación se actualizo con éxito.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se creo una nueva key del servidor correctamente, ' . $th->getMessage());
    }
})->purpose('Crear nueva clave de aplicación');

// * php artisan update-app
Artisan::command('update-app', function () {

    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola'); // Ocultar data

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        $this->call('composer update');
        $this->info('Actualización y migración completadas con éxito.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se actualizo el servidor correctamente, ' . $th->getMessage());
    }
})->purpose('Actualizar dependencias y ejecutar migraciones');

// * php artisan clear-storage-app {directorio}
Artisan::command('clear-storage-app {directory}', function (string $directory) {
    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola');

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        // Inyectar el servicio
        FileService::clearDirectoryStorageApp($directory);

        // Éxito
        $this->info('El directorio se vació correctamente');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se vació el directorio correctamente, ' . $th->getMessage());
    }
})->purpose('Vaciar un directorio de storage app/public/');

/* STUB - REQUIRED PACKAGES

    # LINK - https://spatie.be/docs/laravel-permission/v6/introduction

    # NOTE - php artisan generate-migration-roles-app

*/

// * php artisan generate-migration-roles-app
Artisan::command('generate-migration-roles-app', function () {

    try {

        // Solicitar la clave para usar la consola
        $keyConsole = $this->secret('Ingrese la clave para usar la consola'); // Ocultar data

        // ? Es diferente
        if (!ConsoleHelper::validateKeyConsole($keyConsole)) {
            // ! Error
            throw new \Exception('La clave para usar la consola es incorrecta');
        }

        // Ejecutar el comando vendor:publish
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\Permission\PermissionServiceProvider',
        ]);

        $this->info('Migración de roles generada correctamente.');

        // ! Error
    } catch (\Throwable $th) {
        $this->error('No se pudo crear la migración de roles correctamente, ' . $th->getMessage());
    }
})->purpose('Generar la migración de roles única');

