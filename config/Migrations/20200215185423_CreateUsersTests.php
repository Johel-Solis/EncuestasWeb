<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTests extends AbstractMigration
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
        $table = $this->table('users_tests');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('url_app', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('max_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('message', 'string', [
            'default' => null,
            'limit' => 250,
            'null' => false,
        ]);
        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('test_id', 'integer', ["limit"=>11]);

        $table->addForeignKey("username", " users", "username", ["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->addForeignKey("test_id", " tests", "id", ["delete"=> "CASCADE", "update"=>"CASCADE"]);
        
        $table->create();
    }
}
