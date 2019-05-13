<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\TodoList;
use App\Entity\TodoListItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TodoListFixtures extends Fixture
{
    public const TODO_ITEM_TITLE = 'This is a todo item';

    public function load(ObjectManager $manager): void
    {
        $todoList = TodoList::create('todo.app');
        $todoListItem = TodoListItem::create(self::TODO_ITEM_TITLE);

        $todoList->addTodoListItem($todoListItem);

        $manager->persist($todoList);
        $manager->persist($todoListItem);
        $manager->flush();
    }
}
