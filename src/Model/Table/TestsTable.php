<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tests Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\HasMany $Questions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Test get($primaryKey, $options = [])
 * @method \App\Model\Entity\Test newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Test[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Test|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Test saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Test patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Test[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Test findOrCreate($search, callable $callback = null, $options = [])
 */
class TestsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Questions', [
            'foreignKey' => 'test_id',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'test_id',
            'targetForeignKey' => 'username',
            'joinTable' => 'users_tests',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
