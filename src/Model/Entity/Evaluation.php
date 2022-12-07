<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evaluation Entity
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property int|null $state
 * @property int|null $age
 * @property string|null $gender
 * @property string|null $location
 * @property \Cake\I18n\FrozenTime|null $date
 * @property int $user_test_id
 *
 * @property \App\Model\Entity\UsersTest $users_test
 * @property \App\Model\Entity\Answer[] $answers
 */
class Evaluation extends Entity
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
        'email' => true,
        'token' => true,
        'state' => true,
        'age' => true,
        'gender' => true,
        'location' => true,
        'date' => true,
        'user_test_id' => true,
        'users_test' => true,
        'answers' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token',
    ];
}
