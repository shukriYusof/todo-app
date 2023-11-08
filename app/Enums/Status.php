<?php

namespace App\Enums;

use App\Traits\InvokableCases;

enum Status: string
{
    use InvokableCases;

    case Complete = 'Complete';
    case InProgress = 'In Progress';
    case Pending = 'Pending';
    case Unassign = 'Unassign';
}
