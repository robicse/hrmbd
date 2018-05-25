<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupMenuItem Entity
 *
 * @property int $id
 * @property int $user_group_menu_id
 * @property string $title
 * @property string $controller
 * @property string $action
 * @property string $menu_icon
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserGroupMenu $user_group_menu
 */
class UserGroupMenuItem extends Entity{

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
        'user_group_menu_id' => true,
        'title' => true,
        'controller' => true,
        'action' => true,
        'menu_icon' => true,
        'created' => true,
        'modified' => true,
        'user_group_menu' => true
    ];
}
