<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEvaluations extends AbstractMigration
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
        $table = $this->table('evaluations');
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('state', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('age', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('gender', 'string', [
            'default' => null,
            'limit' => 1,
            'null' => true,
        ]);
        $table->addColumn('location', 'string', [
            'default' => null,
            'limit' => 200,
            'null' => true,
        ]);
        $table->addColumn('date', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('user_test_id','integer',["limit"=>11]);
        $table->addForeignKey("user_test_id","users_tests","id",["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->create();
    }
}
