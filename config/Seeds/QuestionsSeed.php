<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Questions seed.
 */
class QuestionsSeed extends AbstractSeed
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
        $table = $this->table('questions');

        $data[]=[
            "descripcion"=>"Creo que me gustaría usar este sistema con frecuencia.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Encontré el sistema innecesariamente complejo.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Pensé que el sistema era fácil de usar.",
            "test_id"=>6
        ];
        
        $data[]=[
            "descripcion"=>"Creo que necesitaría el apoyo de una persona técnica para poder utilizar este sistema.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Encontré que las diversas funciones en este sistema estaban bien integradas.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Pensé que había demasiada inconsistencia en este sistema.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Me imagino que la mayoría de la gente aprendería a usar este sistema muy rápidamente.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"El sistema me pareció muy engorroso de usar.",
            "test_id"=>6
        ];

        $data[]=[
            "descripcion"=>"Me sentí muy seguro usando el sistema.",
            "test_id"=>6
        ];


        $data[]=[
            "descripcion"=>"Necesitaba aprender muchas cosas antes de poder comenzar con este sistema.",
            "test_id"=>6
        ];

        $table->insert($data)->save();
    }
}
