<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupController Entity
 *
 * @property int $id
 * @property string $controller_title
 * @property string $controller
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserGroupControllerAction[] $user_group_controller_actions
 * @property \App\Model\Entity\UserGroupPermission[] $hrmbd
 */
class UserGroupController extends Entity{

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
        'controller_title' => true,
        'controller' => true,
        'created' => true,
        'modified' => true,
        'user_group_controller_actions' => true,
        'hrmbd' => true
    ];
}
