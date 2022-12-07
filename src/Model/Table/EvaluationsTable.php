<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evaluations Model
 *
 * @property \App\Model\Table\UsersTestsTable&\Cake\ORM\Association\BelongsTo $UsersTests
 * @property \App\Model\Table\AnswersTable&\Cake\ORM\Association\HasMany $Answers
 *
 * @method \App\Model\Entity\Evaluation newEmptyEntity()
 * @method \App\Model\Entity\Evaluation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evaluation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Evaluation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evaluation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evaluation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evaluation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Evaluation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Evaluation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Evaluation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EvaluationsTable extends Table
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

        $this->setTable('evaluations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('UsersTests', [
            'foreignKey' => 'user_test_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Answers', [
            'foreignKey' => 'evaluation_id',
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->integer('state')
            ->allowEmptyString('state');

        $validator
            ->integer('age')
            ->allowEmptyString('age');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 1)
            ->allowEmptyString('gender');

        $validator
            ->scalar('location')
            ->maxLength('location', 200)
            ->allowEmptyString('location');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_test_id'], 'UsersTests'));

        return $rules;
    }
}
