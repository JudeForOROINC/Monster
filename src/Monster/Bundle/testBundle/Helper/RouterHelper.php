<?php
/**
 * Created by PhpStorm.
 * User: jude
 * Date: 30.06.15
 * Time: 15:44
 */
namespace Monster\Bundle\testBundle\Helper;

//use Magecore\Bundle\TestTaskBundle\Entity\Comment;
use Monster\Bundle\testBundle\Entity\Post;
//use Magecore\Bundle\TestTaskBundle\Entity\Project;
//use Magecore\Bundle\TestTaskBundle\Entity\User;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;

class RouterHelper{
    /**
     * @param $entity
     * @return array|\Exception
     * @throw Exception
     */
    public function getRoute($entity){
        //
        if ($entity instanceof User){
            return [
                'route'=>'magecore_test_task_user_view',
                'route_params'=>['id'=>$entity->getId()],
                'anchor'=>'',
                'text'=>$entity,

            ];
        }

        if ($entity instanceof Post){
            return [
                'route' => 'monster_test_issue_show',
                'route_params' => ['id'=>$entity->getId()],
                'anchor'=>'',
                'text'=>$entity,

            ];
        }

        if ($entity instanceof Project){
            return [
                'route' => 'magecore_test_task_project_view',
                'route_params' => ['id'=>$entity->getId()],
                'anchor'=>'',
                'text'=>$entity,

            ];
        }

        if ($entity instanceof Comment){
            return [
                'route' => 'magecore_testtask_issue_show',
                'route_params' => ['id'=>$entity->getIssue()->getId()],
                'anchor'=>'#comment-'.$entity->getId(),
                'text'=>$entity,

            ];
        }

        throw new \Exception('Unknown entity type in twig!');

    }
    public function getName()
    {
        return 'router_helper';
    }
}