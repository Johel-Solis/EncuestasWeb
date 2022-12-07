<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{
    public function isAuthorized($user)
    {
        $action=$this->request->getParam('action');
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if( in_array($action, ['add',  'view', 'index', 'edit', 'delete']))
            {
                return true;

            }

        }

        return parent::isAuthorized($user);
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tests'],
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('menu');
        $question = $this->Questions->get($id, [
            'contain' => ['Tests', 'Answers'],
        ]);

        $this->set('question', $question);
        $this->loadModel('Tests');

        $test = $this->Tests->get($question->test_id, [
            'contain' => [],
        ]);
        
        $this->set(compact( 'test'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id =null)
    {
        $this->viewBuilder()->setLayout('menu');

        $question = $this->Questions->newEmptyEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->test_id=$id;
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('La pregunta se ha guardado.'));

                return $this->redirect(['controller'=>'Tests', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('La pregunta no se ha guardado, intente de nuevo.'));
        }
        $this->loadModel('Tests');
        $test = $this->Tests->get($id, [
            'contain' => [],
        ]);
        
        
        $this->set(compact('question', 'test'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('menu');

        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('La pregunta se ha editado.'));

                return $this->redirect(['controller'=>'Tests', 'action' => 'view', $question->test_id]);
            }
            $this->Flash->error(__('La pregunta no se ha editado, intente de  nuevo.'));
        }
        $this->loadModel('Tests');
        $test = $this->Tests->get($question->test_id, [
            'contain' => [],
        ]);
        
        $this->set(compact('question', 'test'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);

        $id_test=$question->test_id;
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('La pregunta se ha  borrada.'));
            return $this->redirect(['controller'=>'Tests', 'action' => 'view', $id_test]);
        } else {
            $this->Flash->error(__('La pregunta no se pudo borrar, intente de nuevo.'));
        }

        
    }
}
