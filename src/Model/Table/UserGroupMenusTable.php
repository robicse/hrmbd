<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserGroupMenusTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('user_group_menus');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserGroupMenuItems', [
            'foreignKey' => 'user_group_menu_id'
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
            ->scalar('menu_icon')
            ->requirePresence('menu_icon', 'create')
            ->notEmpty('menu_icon');

        $validator
            ->requirePresence('left_sidebar', 'create')
            ->notEmpty('left_sidebar');

        $validator
            ->requirePresence('dashboard', 'create')
            ->notEmpty('dashboard');

        $validator
            ->scalar('controller')
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        return $validator;
    }

    public function buildRules(RulesChecker $rules){
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }
}
