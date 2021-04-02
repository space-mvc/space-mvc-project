<?php

namespace App\Model;

use SpaceMvc\Framework\Mvc\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /** @var array $attributes */
    protected array $attributes = [
        'first_name',
        'last_name'
    ];
}