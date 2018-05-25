<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupMenu Entity
 *
 * @property int $id
 * @property int $user_group_id
 * @property string $title
 * @property string $menu_icon
 * @property int $left_sidebar
 * @property int $dashboard
 * @property string $controller
 * @property string $action
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserGroup $user_group
 * @property \App\Model\Entity\UserGroupMenuItem[] $user_group_menu_items
 */
class UserGroupMenu extends Entity{

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
        'title' => true,
        'menu_icon' => true,
        'left_sidebar' => true,
        'dashboard' => true,
        'controller' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'user_group' => true,
        'user_group_menu_items' => true
    ];
}
