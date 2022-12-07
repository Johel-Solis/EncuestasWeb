<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;
/**
 * Evaluations Controller
 *
 * @property \App\Model\Table\EvaluationsTable $Evaluations
 *
 * @method \App\Model\Entity\Evaluation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EvaluationsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('responderEncuesta');
        $this->Auth->allow('exito');
    }
    public function isAuthorized($user)
    {
        $action=$this->request->getParam('action');
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if( in_array($action, ['exito', 'estadistica', 'responderEncuesta', 'index' ]))
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
    public function index($id_test = null)
    {
        $this->paginate = [
            'conditions' => ['user_test_id' => $id_test, 'state' => 1],
        ];

        $evaluations = $this->paginate($this->Evaluations);

        $this->set(compact('evaluations'));
        $this->set('id_encuesta', $id_test);
    }

    /**
     * View method
     *
     * @param string|null $id Evaluation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  

    public function estadistica($id_test = null)
    {
        $male = 0;

        $female = 0;

        $promEd = 0;

        $promEn = 0;
        $encu_res = 0;

        $this->paginate = [
            'conditions' => ['user_test_id' => $id_test, 'state' => 1],
        ];
        $evaluations = $this->paginate($this->Evaluations);
        $encu_res = $evaluations->count();

        if ($encu_res > 0) {

            foreach ($evaluations as $evaluation) {
                $promEd += ($evaluation->age);

                if (($evaluation->gender) == 'M') {
                    $male++;
                } else {
                    $female++;
                }
            }
            $promEd = ($promEd / $encu_res);
            $this->paginate = [
                'conditions' => ['user_test_id' => $id_test],
            ];

            $evaluations = $this->paginate($this->Evaluations);
            $promEn = ($encu_res / $evaluations->count()) * 100;
        }
        $this->loadModel('UsersTests');
        $usersTest = $this->UsersTests->get($id_test, [
            'contain' => [],
        ]);

        $this->loadModel('Tests');
        $test = $this->Tests->get($usersTest->test_id, [
            'contain' => ['Questions'],
        ]);
        $questions = $test['questions'];

        $this->set('questions', $questions);

        $estadista =
            [
                'male' => $male,
                'female'  => $female,
                'numres' => $encu_res,
                'promed'   => $promEd,
                'promen'   => $promEn

            ];
        $this->loadModel('Answers');

        $this->paginate = [
            'conditions' => ['user_test_id' => $id_test],
        ];
        $answers = $this->paginate($this->Answers);
        $this->set(compact('answers', $answers));


        $this->set(compact('estadista', $estadista));
        $this->set('id_encuesta', $id_test);
    }


    public function responderEncuesta($token = null)
    {

        $this->paginate = [
            'conditions' => ['token' => $token],
        ];
        $evaluation = $this->paginate($this->Evaluations);

        $evaluation = $evaluation->first();
        $id = $evaluation->user_test_id;


        $this->loadModel('UsersTests');
        $usersTest = $this->UsersTests->get($id, [
            'contain' => [],
        ]);

        $this->loadModel('Tests');
        $test = $this->Tests->get($usersTest->test_id, [
            'contain' => ['Questions'],
        ]);
        $questions = $test['questions'];
        $this->set(compact('usersTest'));
        $this->set(compact('evaluation'));
        $this->set('questions', $questions);


        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $evaluation = $this->Evaluations->patchEntity($evaluation, $this->request->getData());
            $evaluation->state = 1;
            $evaluation->date=date("Y-m-d H:i:s");
            if ($this->Evaluations->save($evaluation)) {
                $num = 1;
                foreach ($questions as $quetion) {
                    $preguna = $this->request->getData('respuesta_'. $num);
                    $this->loadModel('Answers');
                    $answer = $this->Answers->newEmptyEntity();
                    $answer->user_test_id = $id;
                    $answer->question_id = $quetion->id;
                    $answer->evaluation_id = $evaluation->id;
                    $answer->value = $preguna;

                    if ($this->Answers->save($answer))
                    {

                        
                        

                    }else{
                        $this->Flash->error(__('por favor complete la encuesta.'));

                    }

                    $num++;
                }
                return $this->redirect(['controller'=>'Evaluations', 'action' => 'exito']);
                
            }else{
                $this->Flash->error(__('por favor complete la encuesta.'));
            }
        }
    }

    public function exito()
    {

    }
}
