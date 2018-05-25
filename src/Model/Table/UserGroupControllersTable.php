<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupControllersTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_group_controllers');
        $this->displayField('controller_title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserGroupControllerActions', [
            'foreignKey' => 'user_group_controller_id'
        ]);
        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_controller_id'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('controller_title')
            ->requirePresence('controller_title', 'create')
            ->notEmpty('controller_title');

        $validator
            ->scalar('controller')
            ->requirePresence('controller', 'create')
            ->notEmpty('controller')
            ->add('controller', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->isUnique(['controller']));

        return $rules;
    }
}
