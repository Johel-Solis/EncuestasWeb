<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Answers Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\EvaluationsTable&\Cake\ORM\Association\BelongsTo $Evaluations
 * @property \App\Model\Table\UsersTestsTable&\Cake\ORM\Association\BelongsTo $UsersTests
 *
 * @method \App\Model\Entity\Answer newEmptyEntity()
 * @method \App\Model\Entity\Answer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Answer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Answer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Answer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Answer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Answer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Answer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Answer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Answer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Answer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Answer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Answer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AnswersTable extends Table
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

        $this->setTable('answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Evaluations', [
            'foreignKey' => 'evaluation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('UsersTests', [
            'foreignKey' => 'user_test_id',
            'joinType' => 'INNER',
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
            ->scalar('value')
            ->maxLength('value', 150)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['evaluation_id'], 'Evaluations'));
        $rules->add($rules->existsIn(['user_test_id'], 'UsersTests'));

        return $rules;
    }
}
