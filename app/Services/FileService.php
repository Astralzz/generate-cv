<?php

// TODO -> app/Services/FileService.php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;


//TODO - FILE SERVICE
class FileService
{

    // * Variables

    public static string $pathStorage = "app/public/";

    /**
     *
     * Método para limpiar datos de storage/app
     *
     * @param string $directory
     *
     * @return void
     */
    public static function clearDirectoryStorageApp(string $directory): void
    {
        try {

            // ? No es de consola
            if (!App::runningInConsole()) {
                throw new \Exception('Esta función solo puede ser ejecutada desde la consola.');
            }

            // Ruta completa al directorio dentro de storage/app
            $directoryPath = storage_path(self::$pathStorage . $directory);

            // ? No existe
            if (!File::isDirectory($directoryPath)) {
                throw new \Exception('El directorio solicitado no existe');
            }

            // Obtener la lista de archivos
            $files = File::files($directoryPath);

            // Eliminar cada archivo
            foreach ($files as $file) {
                File::delete($file);
            }
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
