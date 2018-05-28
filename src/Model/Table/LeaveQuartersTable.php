<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeaveQuarters Model
 *
 * @property \Cake\ORM\Association\HasMany $UserLeaves
 *
 * @method \App\Model\Entity\LeaveQuarter get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeaveQuarter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeaveQuarter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeaveQuarter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeaveQuarter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeaveQuarter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeaveQuarter findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeaveQuartersTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('leave_quarters');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserLeaves', [
            'foreignKey' => 'leave_quarter_id'
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
            ->scalar('start_date')
            #->maxLength('start_date')
            ->requirePresence('start_date')
            ->notEmpty('start_date');

        $validator
            ->scalar('end_date')
            #->maxLength('end_date')
            ->requirePresence('end_date')
            ->notEmpty('end_date');

        $validator
            ->scalar('casual_duration')
            #->maxLength('casual_duration')
            ->requirePresence('casual_duration')
            ->notEmpty('casual_duration');

        $validator
            ->scalar('sick_duration')
            #->maxLength('sick_duration')
            ->requirePresence('sick_duration')
            ->notEmpty('sick_duration');

        $validator
            ->scalar('earned_duration')
            #->maxLength('earned_duration')
            ->requirePresence('earned_duration')
            ->notEmpty('earned_duration');

        $validator
            ->scalar('total_duration')
            #->maxLength('total_duration')
            ->requirePresence('total_duration')
            ->notEmpty('total_duration');

        return $validator;
    }
}
