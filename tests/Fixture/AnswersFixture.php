<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnswersFixture
 */
class AnswersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'value' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'question_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'evaluation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_test_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'user_test_id' => ['type' => 'index', 'columns' => ['user_test_id'], 'length' => []],
            'question_id' => ['type' => 'index', 'columns' => ['question_id'], 'length' => []],
            'evaluation_id' => ['type' => 'index', 'columns' => ['evaluation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'answers_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_test_id'], 'references' => ['users_tests', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'answers_ibfk_2' => ['type' => 'foreign', 'columns' => ['question_id'], 'references' => ['questions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'answers_ibfk_3' => ['type' => 'foreign', 'columns' => ['evaluation_id'], 'references' => ['evaluations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'value' => 'Lorem ipsum dolor sit amet',
                'question_id' => 1,
                'evaluation_id' => 1,
                'user_test_id' => 1,
            ],
        ];
        parent::init();
    }
}
