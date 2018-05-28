<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeavePayableTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $UserLeaves
 *
 * @method \App\Model\Entity\LeavePayableType get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeavePayableType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeavePayableType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeavePayableType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeavePayableType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeavePayableType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeavePayableType findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeavePayableTypesTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('leave_payable_types');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserLeaves', [
            'foreignKey' => 'leave_payable_type_id'
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
}
