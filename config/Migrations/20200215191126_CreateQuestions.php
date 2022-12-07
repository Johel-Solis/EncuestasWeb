<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateQuestions extends AbstractMigration
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
        $table = $this->table('questions');
        $table->addColumn('descripcion', 'string', [
            'default' => null,
            'limit' => 250,
            'null' => false,
        ]);
        
        $table->addColumn('test_id','integer',["limit"=>11]);
        $table->addForeignKey("test_id","tests","id",["delete"=> "CASCADE", "update"=>"CASCADE"]);
        $table->create();
    }
}
