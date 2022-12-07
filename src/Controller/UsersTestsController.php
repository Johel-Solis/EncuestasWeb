<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\EvaluationsTable;
use Cake\Utility\Text;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Mailer\Mailer;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
/**
 * UsersTests Controller
 *
 * @property \App\Model\Table\UsersTestsTable $UsersTests
 *
 * @method \App\Model\Entity\UsersTest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersTestsController extends AppController
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
            if( in_array($action, ['add', 'crearEncuesta', 'view', 'index', 'edit', 'delete']))
            {
                return true;

            }

        }

        return parent::isAuthorized($user);
        
    }
    public function index()
    {
        $this->viewBuilder()->setLayout('menu');
        $this->paginate = [
            'conditions' => ['username'=>$this->Auth->user('username')],
        ];
        $usersTests = $this->paginate($this->UsersTests);

        $this->set( compact ('usersTests', null));
    }

    /**
     * View method
     *
     * @param string|null $id Users Test id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('menu');
        $this->loadModel('Evaluations');
        $usersTest = $this->UsersTests->get($id, [
            'contain' => ['Tests'],
        ]);

        $this->set('usersTest', $usersTest);

        $this->paginate = [
            'conditions' => ['user_test_id'=>$id],
        ];
        $evaluations = $this->paginate($this->Evaluations);

        $this->set(compact('evaluations'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   

    /**
     * Edit method
     *
     * @param string|null $id Users Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('menu');

        $usersTest = $this->UsersTests->get($id, [
            'contain' => ['Tests'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersTest = $this->UsersTests->patchEntity($usersTest, $this->request->getData());
            if ($this->UsersTests->save($usersTest)) {
                $this->Flash->success(__('La encuesta se ha editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar la encuesta, intente de nuevo.'));
        }
        $tests = $this->UsersTests->Tests->find('list', ['limit' => 200]);
        $this->set(compact('usersTest', 'tests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersTest = $this->UsersTests->get($id);
        if ($this->UsersTests->delete($usersTest)) {
            $this->Flash->success(__('La encuesta ha sido borrada.'));
        } else {
            $this->Flash->error(__('No se pudo borrar la encuesta, intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function crearEncuesta()
    {
        $this->viewBuilder()->setLayout('menu');
        $usersTest = $this->UsersTests->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $usersTest = $this->UsersTests->newEmptyEntity();
        
            $usersTest = $this->UsersTests->patchEntity($usersTest, $this->request->getData());
            $usersTest->username = $this->Auth->user('username');
            
            $correos=$this->request->getData('correos');
           
            
            $fech = $this->request->getData('max_date');
            $date = new Date($fech);
            $usersTest->max_date=$date->format('Y-m-d H:i:s');
            
            
            if (!empty($correos))
            {
                if ($this->UsersTests->save($usersTest)) {
            
                    $this->loadModel('Evaluations');
    
                   
                    
                   
                    foreach($correos as $c) {
                        
                        $evaluation = $this->Evaluations->newEmptyEntity();
                        $evaluation->token=Text::UUID(); 
                        $evaluation->email=$c;
                        $evaluation->user_test_id= $usersTest->id ;
                        $this->Evaluations->save($evaluation);
                        $mailer = new Mailer('default');
                        $mailer->setEmailFormat('html')
                            ->setFrom(['juanmaza4520@gmail.com' => ' Encuesta S & S'])
                            ->setTo($c)
                            ->setSubject('Invitacion a encuesta')
                            ->setViewVars(['url_en'=>$evaluation->url_app, 'token'=>$evaluation->token])
                            ->viewBuilder()
                                ->setTemplate('invitacion')
                                ->setLayout('default');
    
                    
                        $mailer->deliver();
                    
    
                  }
    
                  
                        
                    $this->Flash->success(__('la encuesta se ha guardado correctamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }else
                {
                $this->Flash->error(__('no se ha guardado la encuesta, intenta de nuevo.'));
    
                }
                

            }else
            {
                $this->Flash->error(__('no se ha guardado la encuesta, faltan los correos .'));

            }
            
            
        }   
        $tests = $this->UsersTests->Tests->find('list', ['limit' => 200]);
            $this->set(compact('usersTest', 'tests'));
    }
   
   
        
}
