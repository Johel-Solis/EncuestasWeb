<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EvaluationsFixture
 */
class EvaluationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'token' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'state' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'age' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gender' => ['type' => 'string', 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'location' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'user_test_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'user_test_id' => ['type' => 'index', 'columns' => ['user_test_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'evaluations_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_test_id'], 'references' => ['users_tests', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd
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
                'email' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ip',
                'state' => 1,
                'age' => 1,
                'gender' => 'L',
                'location' => 'Lorem ipsum dolor sit amet',
                'date' => '2020-03-25 07:20:46',
                'user_test_id' => 1,
            ],
        ];
        parent::init();
    }
}
