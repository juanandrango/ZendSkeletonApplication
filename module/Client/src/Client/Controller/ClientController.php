<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Client\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Request;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder;

class ClientController extends AbstractActionController
{
    public function showAllAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $allClients = $objectManager->getRepository('Client\Entity\Client')->findAll();
        return new ViewModel( array('allClients' => $allClients) );
    }

    public function showAction() 
    {
        if ($this->getRequest()->isPost()) {
            $clientId = (int)$this->getRequest()->getPost('clientId');
            $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $client = $objectManager->getRepository('Client\Entity\Client')->findOneBy(array("clientId" => $clientId));

            //Create form 
            //TODO This should be a form under form/ directory
            $builder = new AnnotationBuilder($objectManager);
            $form = $builder->createForm($client);
            $form->setHydrator(new DoctrineHydrator($objectManager,'Client\Entity\Client'));
            $form->setBindOnValidate(false);
            $form->bind($client);
            return new ViewModel( array('client' => $client, 
                'form' => $form
                ) 
            );
        } else {
            die(var_dump($this->getRequest()->isPost()));
            //return;
        }
    }
    public function editAction() {
        if ($this->getRequest()->isPost()) {
            $stateId = (int)$this->getRequest()->getPost('stateId');
            $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $client = $objectManager->getRepository('Client\Entity\Client')->findOneBy(array("stateId" => $stateId));
            //Create form 
            //TODO This should be a form under form/ directory
            $builder = new AnnotationBuilder($objectManager);
            $form = $builder->createForm($client);
            $form->setHydrator(new DoctrineHydrator($objectManager,'Client\Entity\Client'));
            $form->bind($client);
            $form->setData($this->getRequest()->getPost());            
            if ($form->isValid()) {
                $objectManager->flush();
            } 
            return new ViewModel( array('client' => $client, 
                'form' => $form
                )
            ); 
        } else {
            die(var_dump($this->getRequest()->isPost()));
            //$this->redirect()->toRoute('home');
            //return;
        }
    }
}
