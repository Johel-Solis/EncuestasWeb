<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $role
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $create_date
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\Test[] $tests
 */
class User extends Entity
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
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'password' => true,
        'role' => true,
        'active' => true,
        'create_date' => true,
        'modified_date' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
