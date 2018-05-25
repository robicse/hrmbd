<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupMenuItemsTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_group_menu_items');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroupMenus', [
            'foreignKey' => 'user_group_menu_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('controller')
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        $validator
            ->scalar('menu_icon')
            ->requirePresence('menu_icon', 'create')
            ->notEmpty('menu_icon');

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->existsIn(['user_group_menu_id'], 'UserGroupMenus'));

        return $rules;
    }
}
