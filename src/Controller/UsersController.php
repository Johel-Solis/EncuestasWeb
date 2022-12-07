<?php
declare(strict_types=1);

namespace App\Controller;
use  App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Entity\Question;


/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function isAuthorized($user)
    {
        $action=$this->request->getParam('action');
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($action, ['home', 'view', 'edit', 'logout']))
            {
                return true;

            }

        }

        return parent::isAuthorized($user);
        
    }


    public function index()
    {
        
        $this->viewBuilder()->setLayout('menu');
        $users = $this->paginate($this->Users);
        $this->set('users', $users);        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $this->viewBuilder()->setLayout('menu');
        $user = $this->Users->get($id);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('menu');
        $user = $this->Users->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->create_date=date("Y-m-d H:i:s");
            $user->modified_date=date("Y-m-d H:i:s");
            $user->active=1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario ha sido creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo crear el usuario, intente de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('menu');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Se ha editado el usuario correctamente.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('No se pudo editar el usuario, intente de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($username = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($username);
        
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario se ha borrado.'));
        } else {
            $this->Flash->error(__('No se pudo borrar el usuario, intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login ()
    {
        $this->viewBuilder()->setLayout('menu');
        if($this-> request-> is('post'))
        {
            $user=$this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Datos son invalidos,  ingrese los datos nuevamente', ['key'=>'auth']);
            }
        }
    }
    public function logout(){
        
        return $this->redirect($this->Auth->logout());
    }
    
    public function home()
    {
        $this->viewBuilder()->setLayout('menu');
        $this->render();
        
    }
    
    
    
}
