<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupPermission Entity
 *
 * @property int $id
 * @property int $user_group_id
 * @property int $user_group_controller_id
 * @property int $user_group_controller_action_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserGroup $user_group
 * @property \App\Model\Entity\UserGroupController $user_group_controller
 * @property \App\Model\Entity\UserGroupControllerAction $user_group_controller_action
 */
class UserGroupPermission extends Entity{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_group_id' => true,
        'user_group_controller_id' => true,
        'user_group_controller_action_id' => true,
        'created' => true,
        'modified' => true,
        'user_group' => true,
        'user_group_controller' => true,
        'user_group_controller_action' => true
    ];
}
