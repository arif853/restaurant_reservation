<?php

    namespace App\Enums;

    enum TableStatus:string{

        case Pending = 'pending';
        case Available = 'availabe';
        case Unavailable = 'unavailabe';
    }
