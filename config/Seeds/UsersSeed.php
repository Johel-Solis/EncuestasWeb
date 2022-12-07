<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $hasher = new DefaultPasswordHasher();
        $passwdHasheado = $hasher->hash("123456");

        $faker = Faker\Factory::create();
        
        $data = [];
        
        
        $data[] = 
            [
                'username'   => 'johel_27',
                'first_name' => 'joHel',
                'last_name'  => 'Solis',
                'password'   => $passwdHasheado,
                'role'       => 'admin',
                'active'     => true,
                'create_date'=>date("Y-m-d H:i:s"),
                'modified_date'=>date("Y-m-d H:i:s")
            ];
       

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
