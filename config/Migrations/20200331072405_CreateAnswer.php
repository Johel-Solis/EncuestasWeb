<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAnswer extends AbstractMigration
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
        $table = $this->table('answers');
        $table->addColumn('value', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('question_id','integer',["limit"=>11]);
        $table->addColumn('evaluation_id','integer',["limit"=>11]);
        $table->addColumn('user_test_id','integer',["limit"=>11]);
        $table->addForeignKey("user_test_id","users_tests","id",["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->addForeignKey("question_id","questions","id",["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->addForeignKey("evaluation_id","evaluations","id",["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->create();
        
    }
}
