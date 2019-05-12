<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TodoList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TodoList|null find($id, $lockMode = null, $lockVersion = null)
 * @method TodoList|null findOneBy(array $criteria, array $orderBy = null)
 * @method TodoList[]    findAll()
 * @method TodoList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TodoList::class);
    }

    public function getTodoList(): TodoList
    {
        return $this->createQueryBuilder('todolist')
            ->orderBy('todolist.createdAt')
            ->setFirstResult(0)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
        ;
    }

    public function saveTodoList(TodoList $todoList): void
    {
        foreach ($todoList->getTodoListItems() as $todoListItem) {
            $this->getEntityManager()->persist($todoListItem);
        }

        $this->getEntityManager()->persist($todoList);
        $this->getEntityManager()->flush();
    }
}
