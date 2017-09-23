<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hobbies Controller
 *
 * @property \App\Model\Table\HobbiesTable $Hobbies
 *
 * @method \App\Model\Entity\Hobby[] paginate($object = null, array $settings = [])
 */
class HobbiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hobbies = $this->paginate($this->Hobbies);

        $this->set(compact('hobbies'));
        $this->set('_serialize', ['hobbies']);
    }

    /**
     * View method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hobby = $this->Hobbies->get($id, [
            'contain' => []
        ]);

        $this->set('hobby', $hobby);
        $this->set('_serialize', ['hobby']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hobby = $this->Hobbies->newEntity();
        if ($this->request->is('post')) {
            $hobby = $this->Hobbies->patchEntity($hobby, $this->request->data);
            if ($this->Hobbies->save($hobby)) {
                $this->Flash->success(__('The {0} has been saved.', 'Hobby'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Hobby'));
            }
        }
        $this->set(compact('hobby'));
        $this->set('_serialize', ['hobby']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hobby = $this->Hobbies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hobby = $this->Hobbies->patchEntity($hobby, $this->request->data);
            if ($this->Hobbies->save($hobby)) {
                $this->Flash->success(__('The {0} has been saved.', 'Hobby'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Hobby'));
            }
        }
        $this->set(compact('hobby'));
        $this->set('_serialize', ['hobby']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hobby = $this->Hobbies->get($id);
        if ($this->Hobbies->delete($hobby)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Hobby'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Hobby'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
