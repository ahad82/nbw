<?php

namespace Acme\ProjectManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;

// Entity
use Acme\ProjectManagerBundle\Entity\Task;
use Acme\ProjectManagerBundle\Entity\Project;
use Acme\ProjectManagerBundle\Entity\Dependency;

//forms
use Acme\ProjectManagerBundle\Form\TaskType;
use Acme\ProjectManagerBundle\Form\DependencyType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_project")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        // a general pur
        $statusList = $this->container->getParameter('statusList');
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository("AcmeProjectManagerBundle:Project")->findAll();
        
        if(!$project){
            $project = new Project();
            $project->setName("First Project");
            $project->setDescription('This is the project description');
            $project->setStatus($statusList["new"]);
            $project->setCreateDate(new \DateTime());
            $project->setUpdateDate(new \DateTime());
            $project->setCreatedBy("555");
            $project->setUpdatedBy("555");
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
        }
        return $this->render('AcmeProjectManagerBundle:Default:index.html.php', array('statusList'=>$statusList, 'project'=>$project[0]));
    }
    
    /**
     * @Route("/createtask/{projectId}", name="_project_createtask", defaults={"projectId":null})
     * 
     * @Template()
     */
    public function createTaskAction($projectId, Request $request){
        $statusList = $this->container->getParameter('statusList');
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository("AcmeProjectManagerBundle:Project")->find($projectId);
        if(!$project){
            //redirect to home page or project create page
        }
        
        $task = new Task();
        
        $form = $this->createForm(new TaskType, $task);
        $form->add('status', 'choice', array(
            'choices' => array_flip($statusList),
        
        ));
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $task->setProjectId($projectId);
            $task->setCreateDate(new \DateTime());
            $task->setUpdateDate(new \DateTime());
            $task->setCreatedBy("555");//assuming current user id
            $task->setUpdatedBy("555");//assuming current user id
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            
            return new RedirectResponse($this->generateUrl('_project_listtasks', array('projectId'=>$projectId)));
        }

        return $this->render('AcmeProjectManagerBundle:Default:createTask.html.php', array('projectId'=>$projectId, 'form' => $form->createView()));
    }
    
    /**
     * @Route("/listtasks/{projectId}", name="_project_listtasks")
     * @Template()
     */
    public function listTasksAction($projectId){
        $em = $this->getDoctrine()->getManager();
        $statusList = $this->container->getParameter('statusList');
        
        $Tasks = $em->getRepository("AcmeProjectManagerBundle:Task")->findBy(array("projectId"=>$projectId));
        
        foreach($Tasks as $task){
            //echo $task->getName() . "<br>";
            $deps =  $task->getDependencies();
            if($deps){
                foreach ($deps as $dep){
                    //echo "--- dependency -- <br>";
                    /*$dependents_task = $em->getRepository("AcmeProjectManagerBundle:Task")->find($dep->getTaskId());
                    echo "Depends on: " . $dependents_task->getName() . "<br>";
                    echo "Depends on status:" . array_search($dep->getOnStatus(), $statusList) . "</br>";
                    echo "Update status to:" . array_search($dep->getDoStatus(), $statusList) . "</br>";*/
                    
                   /* $Tasks["dependencies"][] = array ("on_task_name"=>$dependents_task->getName(),
                                                      "on_task_id" => $dependents_task->getId(),
                                                      "on_task_status"=>array_search($dep->getOnStatus(), $statusList),
                                                       "do_task_status"=>array_search($dep->getDoStatus(), $statusList));*/
                }
            }
    
        }

              
        return $this->render('AcmeProjectManagerBundle:Default:listTasks.html.php', array('projectId'=>$projectId, 'statusList'=>$statusList, 'Tasks' => $Tasks));
        
    }
    
    /**
     * @Route("/dependency/{taskId}", name="_project_dependency", defaults={"taskId":null})
     * @Template()
     */
    public function dependencyAction($taskId, Request $request){
        $em = $this->getDoctrine()->getManager();
        $statusList = $this->container->getParameter('statusList');
        
        $task = $em->getRepository("AcmeProjectManagerBundle:Task")->find($taskId);
        if(!$task){
            //redirect to home page or project create page
        }
        $dependency = new Dependency();
        
        $form = $this->createForm(new DependencyType, $dependency);
        $form->add('onStatus', 'choice', array(
            'choices' => array_flip($statusList),
        
        ));
         $form->add('doStatus', 'choice', array(
            'choices' => array_flip($statusList),
        
        ));
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            
            $dependency->setCreateDate(new \DateTime());
            $dependency->setUpdateDate(new \DateTime());
            $dependency->setCreatedBy("555");//assuming current user id
            $dependency->setUpdatedBy("555");//assuming current user id
            $em = $this->getDoctrine()->getManager();
            $em->persist($dependency);
            $em->flush();
            
            $task->setDependencies($dependency);
            $task->setUpdateDate(new \DateTime());
            $em->persist($task);
            $em->flush();
            //return new RedirectResponse($this->generateUrl('_project_listtasks', array('projectId'=>$projectId)));
        }
        $dependencyList = array();
        $dependencies = $task->getDependencies();//getting current dependencies to list down
        if($dependencies){
            foreach ($dependencies as $dep){
                $dependents_task = $em->getRepository("AcmeProjectManagerBundle:Task")->find($dep->getTaskId());
                $dependencyList[] = array ("task_name"=>$task->getName(),
                                                "on_task_name"=>$dependents_task->getName(),
                                                  "on_task_id" => $dependents_task->getId(),
                                                  "on_task_status"=>array_search($dep->getOnStatus(), $statusList),
                                                   "do_task_status"=>array_search($dep->getDoStatus(), $statusList));
            }
        }
        
        
        
        return $this->render('AcmeProjectManagerBundle:Default:dependency.html.php', array('projectId'=>$task->getProjectId(), 'taskId'=>$taskId, 'dependencyList'=>$dependencyList, 'form' => $form->createView()));
        
    }
        

}
