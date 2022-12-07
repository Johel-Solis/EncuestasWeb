<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 *
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestsController extends AppController
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
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $this->viewBuilder()->setLayout('menu');
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('menu');
        $this->loadModel('Questions');
        $test = $this->Tests->get($id, [
            'contain' => ['Questions'],
        ]);

        $this->set('test', $test);

        $this->paginate = [
            'conditions' => ['test_id'=>$id],
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->viewBuilder()->setLayout('menu');
        $test = $this->Tests->newEmptyEntity();
        if ($this->request->is('post')) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {

                $preguntas=$this->request->getData('preguntas');
           
                
                if (!empty($preguntas))
                {                
                        $this->loadModel('Questions');
        
                       
                        
                       
                        foreach($preguntas as $p) {
                            
                            $question = $this->Questions->newEmptyEntity();
                            $question->descripcion=$p;
                            
                            $question->test_id= $test->id ;
                            $this->Questions->save($question);
                            
                      }
        
                      
                            
                    }
                    
                
                    $this->Flash->success(__('El Test se ha guardado correctamente.'));
        

                return $this->redirect(['controller'=>'Tests', 'action' => 'index']);
            }
            $this->Flash->error(__('no se ha guardado el Test, intenta de nuevo.'));
        }
        $users = $this->Tests->Users->find('list', ['limit' => 200]);
        $this->set(compact('test', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('menu');
        $test = $this->Tests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('El test se ha editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El test no se ha editado, intente de nuevo.'));
        }
        
        $this->set(compact('test'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('El test se ha borrado.'));
        } else {
            $this->Flash->error(__('El test no se ha borrado, intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
