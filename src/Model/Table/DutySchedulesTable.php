<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DutySchedules Model
 *
 * @method \App\Model\Entity\DutySchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\DutySchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DutySchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DutySchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DutySchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DutySchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DutySchedule findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DutySchedulesTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('duty_schedules');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('start_time')
            #->maxLength('start_time')
            ->requirePresence('start_time')
            ->notEmpty('start_time');

        $validator
            ->scalar('late_time')
            #->maxLength('late_time')
            ->requirePresence('late_time')
            ->notEmpty('late_time');

        $validator
            ->scalar('end_time')
            #->maxLength('end_time')
            ->requirePresence('end_time')
            ->notEmpty('end_time');

        $validator
            ->scalar('status')
            ->requirePresence('status')
            ->notEmpty('status');

        return $validator;
    }
}
