<?php

namespace App\Model;

use SpaceMvc\Framework\Mvc\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    static $attr_accessible = array('first_name');
}