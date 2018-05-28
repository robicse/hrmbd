<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Weekend Entity
 *
 * @property int $id
 * @property int $department_id
 * @property int $department_section_id
 * @property string $date
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\DepartmentSection $department_section
 */
class Weekend extends Entity{

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
        'department_id' => true,
        'department_section_id' => true,
        'date' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'department' => true,
        'department_section' => true
    ];
}
