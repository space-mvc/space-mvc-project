<?php

declare(strict_types=1);

use \SpaceMvc\Framework\Library\Migration;

/**
 * Class CreateUsersTable
 */
final class CreateUsersTable extends Migration
{
    /**
     * up
     */
    public function up(): void
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('gender', 'string')
            ->addColumn('date_of_birth', 'string')
            ->create();
    }

    /**
     * down
     */
    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
