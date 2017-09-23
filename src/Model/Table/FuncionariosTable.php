<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionarios Model
 *
 * @property \App\Model\Table\AnalistasTable|\Cake\ORM\Association\HasMany $Analistas
 * @property \App\Model\Table\ProgramadoresTable|\Cake\ORM\Association\HasMany $Programadores
 * @property \App\Model\Table\HobbiesTable|\Cake\ORM\Association\BelongsToMany $Hobbies
 *
 * @method \App\Model\Entity\Funcionario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Funcionario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Funcionario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncionariosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('funcionarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Analistas', [
            'foreignKey' => 'funcionario_id'
        ]);
        $this->hasMany('Programadores', [
            'foreignKey' => 'funcionario_id'
        ]);
        $this->belongsToMany('Hobbies', [
            'foreignKey' => 'funcionario_id',
            'targetForeignKey' => 'hobby_id',
            'joinTable' => 'funcionarios_hobbies'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->integer('idade')
            ->requirePresence('idade', 'create')
            ->notEmpty('idade');

        return $validator;
    }
}
