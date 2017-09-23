<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hobbies Model
 *
 * @property \App\Model\Table\FuncionariosTable|\Cake\ORM\Association\BelongsToMany $Funcionarios
 *
 * @method \App\Model\Entity\Hobby get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hobby newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hobby[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hobby|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hobby patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hobby[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hobby findOrCreate($search, callable $callback = null, $options = [])
 */
class HobbiesTable extends Table
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

        $this->setTable('hobbies');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Funcionarios', [
            'foreignKey' => 'hobby_id',
            'targetForeignKey' => 'funcionario_id',
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

        return $validator;
    }
}
