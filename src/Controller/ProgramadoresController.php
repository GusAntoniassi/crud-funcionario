<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Programadores Controller
 *
 * @property \App\Model\Table\ProgramadoresTable $Programadores
 *
 * @method \App\Model\Entity\Programador[] paginate($object = null, array $settings = [])
 */
class ProgramadoresController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Github');
        $this->loadComponent('Search.Prg', [
            'actions' => 'index',
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Programadores
            ->find('search', ['search' => $this->request->getQueryParams()])
            ->contain('Funcionarios');

        $this->paginate = [
            'limit' => 20,
            'contain' => ['Funcionarios'],
            'sortWhitelist' => ['Programadores.id', 'Funcionarios.nome', 'Funcionarios.sexo',
                'Funcionarios.idade', 'Programadores.linguagem', 'Programadores.github'
            ],
        ];

        $q = (!empty($this->request->getQuery('q')) ? $this->request->getQuery('q') : '');

        $programadores = $this->paginate($query);

        $this->set(compact('programadores', 'q'));
        $this->set('_serialize', ['programadores']);
    }

    /**
     * View method
     *
     * @param string|null $id Programador id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $programador = $this->Programadores->get($id, [
            'contain' => ['Funcionarios', 'Funcionarios.Hobbies']
        ]);

        if (!empty($programador)) {
            $github = $this->Github->getUser($programador->github);
        } else {
            $github = [];
        }

        $this->set('programador', $programador);
        $this->set('github', $github);
        $this->set('_serialize', ['programador']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $programador = $this->Programadores->newEntity();
        if ($this->request->is('post')) {
            $programador = $this->Programadores->patchEntity($programador, $this->request->data, [
                'associated' => [
                    'Funcionarios',
                    'Funcionarios.Hobbies'
                ]
            ]);
            if ($this->Programadores->save($programador)) {
                $this->Flash->success(__('The {0} has been saved.', 'Programador'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Programador'));
            }
        }
        $hobbies = $this->Programadores->Funcionarios->Hobbies->find('list')->toArray();
        $this->set(compact('programador', 'hobbies'));
        $this->set('_serialize', ['programador']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Programador id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programador = $this->Programadores->get($id, [
            'contain' => ['Funcionarios', 'Funcionarios.Hobbies']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $programador = $this->Programadores->patchEntity($programador, $this->request->getData(), [
                'associated' => [
                    'Funcionarios',
                    'Funcionarios.Hobbies',
                ]
            ]);
            if ($this->Programadores->save($programador)) {
                $this->Flash->success(__('The {0} has been saved.', 'Programador'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Programador'));
            }
        }

        $hobbies = $this->Programadores->Funcionarios->Hobbies->find('list')->toArray();

        $this->set(compact('programador', 'hobbies'));
        $this->set('_serialize', ['programador']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Programador id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programador = $this->Programadores->get($id, ['contain' => [
            'Funcionarios', 'Funcionarios.Hobbies'
        ]]);

        $funcionario = $programador->funcionario;
        if ($this->Programadores->delete($programador) && $this->Programadores->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Programador'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Programador'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function searchGithubUsers() {
        $query = (!empty($this->request->getQuery('q')) ? $this->request->getQuery('q') : '');
        $users = $this->Github->searchUsers($query);
        echo json_encode($users);
        die();
    }

    public function getGithubUser() {
        $username = (!empty($this->request->getQuery('username')) ? $this->request->getQuery('username') : '');
        $user = $this->Github->getUser($username);
        echo json_encode($user);
        die();
    }
}
