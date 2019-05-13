<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TodoListItem;
use App\Repository\TodoListItemRepository;
use App\Repository\TodoListRepository;
use Doctrine\Common\Collections\Collection;

class TodoListItemService
{
    /** @var TodoListRepository */
    private $todoListRepository;

    /** @var TodoListItemRepository */
    private $todoListItemRepository;

    public function __construct(TodoListRepository $todoListRepository, TodoListItemRepository $todoListItemRepository)
    {
        $this->todoListRepository = $todoListRepository;
        $this->todoListItemRepository = $todoListItemRepository;
    }

    public function getTodoListItems(): Collection
    {
        $todoList = $this->getTodoListRepository()->getTodoList();

        return $todoList->getTodoListItems();
    }

    public function addTodoListItem(TodoListItem $todoListItem): void
    {
        $todoList = $this->getTodoListRepository()->getTodoList();

        $todoList->addTodoListItem($todoListItem);
        $this->getTodoListRepository()->saveTodoList($todoList);
    }

    public function toggleTodoListItem(TodoListItem $todoListItem): void
    {
        $todoListItem->toggle();
        $this->getTodoListItemRepository()->saveTodoListItem($todoListItem);
    }

    public function getTodoListRepository(): TodoListRepository
    {
        return $this->todoListRepository;
    }

    public function getTodoListItemRepository(): TodoListItemRepository
    {
        return $this->todoListItemRepository;
    }
}
