<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeTypeDesignations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $EmployeeTypes
 *
 * @method \App\Model\Entity\EmployeeTypeDesignation get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeTypeDesignation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeeTypeDesignationsTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('employee_type_designations');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EmployeeTypes', [
            'foreignKey' => 'employee_type_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->scalar('title')
            #->maxLength('title')
            ->requirePresence('title')
            ->notEmpty('title');

        $validator
            ->scalar('status')
            ->requirePresence('status')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['employee_type_id'], 'EmployeeTypes'));

        return $rules;
    }
}
