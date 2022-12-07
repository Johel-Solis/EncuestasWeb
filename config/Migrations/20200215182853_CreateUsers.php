<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users', ["id"=>false, "primary_key"=>"username"]);
        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('first_name', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('last_name', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 300,
            'null' => false,
        ]);
        $table->addColumn('role', 'enum',array ('values'=>['admin','user'])
        );
        $table->addColumn('active', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('create_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
