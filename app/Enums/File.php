<?php

namespace App\Enums;

use App\Traits\InvokableCases;

enum File: string
{
    use InvokableCases;

    Case Image      = 'Image';
    Case Video      = 'Video';
    Case Document   = 'Document';
}
