<?php

namespace App\Enums;

use App\Traits\InvokableCases;

enum Priority: string
{
    use InvokableCases;

    case Urgent = 'Urgent';
    case High = 'High';
    case Normal = 'Normal';
    case Low = 'Low';
}
