<?php

namespace App\Constants;

class Roles
{
    public const ADMIN = 'ADMIN';
    public const ANGGOTA = 'ANGGOTA';
    public const ADMIN_MUTLAK = 'ADMIN_MUTLAK';

    public static function allRoles()
    {
        return [self::ADMIN => 'Admin', self::ANGGOTA => 'Anggota', self::ADMIN_MUTLAK => 'Admin Mutlak'];
    }
}
