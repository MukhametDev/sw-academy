<?php

namespace Framework\Base\Enums;

enum Role: int
{
    case ADMIN = 1;
    case USER = 2;
    case UNAUTHORIZED = 0;
}
