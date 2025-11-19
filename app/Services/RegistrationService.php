<?php

namespace App\Services;

use App\Interfaces\UserInterface;

class RegistrationService
{
    public function register(UserInterface $user)
    {
        $user->register();
    }
}
