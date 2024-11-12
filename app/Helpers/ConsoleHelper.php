<?php

namespace App\Helpers;

class ConsoleHelper
{
    /**
     * Validar la clave de administración de la consola
     *
     * @param string $key
     *
     * @return bool
     */
    public static function validateKeyConsole(string $key): bool
    {
        // Obtener la clave o lanzar una excepción si no está presente
        $claveCorrecta = env('USE_CONSOLE_KEY') ?? throw new \Exception('No se encontró la clave de consola, actualiza el .env');

        // Verificar
        return $key === $claveCorrecta;
    }
}
