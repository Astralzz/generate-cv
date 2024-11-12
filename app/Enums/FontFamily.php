<?php

namespace App\Enums;

/**
 * @enum FontFamily
 * @type string
 * @description - Fuente principal de el cv
 */
enum FontFamily: string
{
    case Arial = 'Arial';
    case Verdana = 'Verdana';
    case Helvetica = 'Helvetica';
    case TimesNewRoman = 'Times New Roman';
    case Georgia = 'Georgia';
    case CourierNew = 'Courier New';

}
