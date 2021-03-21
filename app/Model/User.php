<?php

namespace App\Model;

use SpaceMvc\Framework\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /** @var string $table */
    protected static string $table = 'users';

    /** @var array $fillable  */
    protected static array $fillable = [
        'name',
        'email',
        'password'
    ];
}