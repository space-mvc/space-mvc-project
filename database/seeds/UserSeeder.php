<?php

use SpaceMvc\Framework\Library\Seed;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seed
{
    /**
     * run
     */
    public function run(): void
    {
        $this->insert('users', [
            'first_name' => 'Space',
            'last_name' => 'Mvc',
            'email' => 'space@space-mvc.com',
            'password' => md5('password'),
            'gender' => 'male',
            'date_of_birth' => date('Y-m-d')
        ]);
    }
}
