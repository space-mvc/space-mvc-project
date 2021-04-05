<?php

use SpaceMvc\Framework\Library\Abstract\MigrationAbstract;

final class V20210402141920 extends MigrationAbstract
{
    /**
     * up
     */
    public function up(): void
    {
        $table = $this->table('posts');
        $table->addColumn('title', 'string')
            ->addColumn('subject', 'string')
            ->addColumn('description', 'text')
            ->addColumn('body', 'text')
            ->addTimestamps()
            ->create();
    }

    /**
     * down
     */
    public function down(): void
    {
        $this->table('posts')->drop()->save();
    }
}
