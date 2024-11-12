<?php

namespace App\Enums;

/**
 * @enum LayoutCv
 * @type string
 * @description - Tipo de cv
 */
enum LayoutCv: string
{
    case Default = "default";
    case Modern = "modern";
    case Classic = "classic";
    case Minimal = "minimal";
}
