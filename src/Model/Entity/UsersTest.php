<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersTest Entity
 *
 * @property int $id
 * @property string $name
 * @property string $url_app
 * @property \Cake\I18n\FrozenDate $max_date
 * @property string $message
 * @property string $username
 * @property int $test_id
 *
 * @property \App\Model\Entity\Test $test
 */
class UsersTest extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'url_app' => true,
        'max_date' => true,
        'message' => true,
        'username' => true,
        'test_id' => true,
        'test' => true,
    ];
}
