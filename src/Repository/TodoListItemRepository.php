<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TodoListItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TodoListItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method TodoListItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method TodoListItem[]    findAll()
 * @method TodoListItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoListItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TodoListItem::class);
    }

    public function saveTodoListItem(TodoListItem $todoListItem): void
    {
        $this->getEntityManager()->persist($todoListItem);
        $this->getEntityManager()->flush();
    }
}
