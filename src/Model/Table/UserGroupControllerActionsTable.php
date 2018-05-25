<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupControllerActionsTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_group_controller_actions');
        $this->displayField('action');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroupControllers', [
            'foreignKey' => 'user_group_controller_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_controller_action_id'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('action_title')
            ->requirePresence('action_title', 'create')
            ->notEmpty('action_title');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->existsIn(['user_group_controller_id'], 'UserGroupControllers'));

        return $rules;
    }
}
