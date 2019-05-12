<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\TodoListItem;
use App\Form\TodoListItemType;
use App\Service\TodoListService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoListController extends AbstractController
{
    /** @var TodoListService */
    private $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    /** @Route("/", name="todo-list.overview", methods={"GET"}) */
    public function overview(): Response
    {
        $todoListItems = $this->getTodoListService()->getTodoListItems();
        $emptyTodoListItem = TodoListItem::createEmpty();
        $todoListItemForm = $this->createForm(
            TodoListItemType::class,
            $emptyTodoListItem,
            [
                'action' => $this->generateUrl('todo-list.create-item'),
            ]
        );

        return $this->render(
            'todo_list/overview.html.twig',
            [
                'todoListItemForm' => $todoListItemForm->createView(),
                'todoListItems' => $todoListItems,
            ]
        );
    }

    /** @Route("/create-item", name="todo-list.create-item", methods={"POST"}) */
    public function createTodoListItem(Request $request): RedirectResponse
    {
        $emptyTodoListItem = TodoListItem::createEmpty();
        $todoListItemForm = $this->createForm(TodoListItemType::class, $emptyTodoListItem);
        $todoListItemForm->handleRequest($request);

        $this->getTodoListService()->addTodoListItem(
            $todoListItemForm->getData()
        );

        return $this->redirectToRoute('todo-list.overview');
    }

    /** @Route("/toggle-item/{id}", name="todo-list.toggle-item", methods={"GET"}) */
    public function toggleTodoListItem(TodoListItem $todoListItem): RedirectResponse
    {
        $this->getTodoListService()->toggleTodoListItem($todoListItem);

        return $this->redirectToRoute('todo-list.overview');
    }

    public function getTodoListService(): TodoListService
    {
        return $this->todoListService;
    }
}
