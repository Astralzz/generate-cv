<?php

namespace App\Enums;

/**
 * @enum SkillLevel
 * @type string
 * @description - El nivel de un skill
 */
enum SkillLevel: string
{

    case Novice = 'novice';
    case Beginner = 'beginner';
    case Intermediate = 'intermediate';
    case Advanced = 'advanced';
    case Expert = 'expert';
    case Master = 'master';

    /**
     * Obtener la traducción del nivel de habilidad.
     *
     * @return string - [resources/lang/[lenguaje]/skills.php]
     */
    public function label(): string
    {
        return trans('skills.' . $this->value);
    }
}
