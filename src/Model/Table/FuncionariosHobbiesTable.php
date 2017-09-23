<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuncionariosHobbies Model
 *
 * @property \App\Model\Table\FuncionariosTable|\Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \App\Model\Table\HobbiesTable|\Cake\ORM\Association\BelongsTo $Hobbies
 *
 * @method \App\Model\Entity\FuncionariosHobbie get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosHobbie findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncionariosHobbiesTable extends Table
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

        $this->setTable('funcionarios_hobbies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Hobbies', [
            'foreignKey' => 'hobby_id',
            'joinType' => 'INNER'
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        $rules->add($rules->existsIn(['hobby_id'], 'Hobbies'));

        return $rules;
    }
}
