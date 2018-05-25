<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupPermissionsTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_group_permissions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserGroupControllers', [
            'foreignKey' => 'user_group_controller_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserGroupControllerActions', [
            'foreignKey' => 'user_group_controller_action_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        $rules->add($rules->existsIn(['user_group_controller_id'], 'UserGroupControllers'));
        $rules->add($rules->existsIn(['user_group_controller_action_id'], 'UserGroupControllerActions'));

        return $rules;
    }
}
