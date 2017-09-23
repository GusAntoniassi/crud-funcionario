<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Programador Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property string $linguagem
 * @property string $github
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 */
class Programador extends Entity
{

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
        '*' => true,
        'id' => false
    ];
}
