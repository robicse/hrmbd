<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupsTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_groups');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserGroupMenus', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_group_id'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('prefix')
            ->allowEmpty('prefix');

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->isUnique(['title']));
        $rules->add($rules->isUnique(['prefix']));

        return $rules;
    }
}
