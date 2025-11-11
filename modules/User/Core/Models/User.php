<?php

declare(strict_types=1);

namespace Modules\User\Core\Models;

class User
{
    private int $id;
    private string $fullName;
    private string $email;
    private string $photo;
    private string $password;
    private string $role;
}
