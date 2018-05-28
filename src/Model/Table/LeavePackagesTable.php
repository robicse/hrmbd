<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeavePackages Model
 *
 * @method \App\Model\Entity\LeavePackage get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeavePackage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeavePackage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeavePackage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeavePackage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeavePackage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeavePackage findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeavePackagesTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('leave_packages');
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
            ->integer('casual')
            ->requirePresence('casual')
            ->notEmpty('casual');

        $validator
            ->integer('sick')
            ->requirePresence('sick')
            ->notEmpty('sick');

        $validator
            ->integer('earned')
            ->requirePresence('earned')
            ->notEmpty('earned');

        $validator
            ->scalar('status')
            ->requirePresence('status')
            ->notEmpty('status');

        return $validator;
    }
}
