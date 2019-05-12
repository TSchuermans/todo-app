<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoListRepository")
 */
class TodoList
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TodoListItem", mappedBy="todoList", orphanRemoval=true)
     */
    private $todoListItems;

    public static function create(string $title): self
    {
        $instance = new static();
        $instance->title = $title;
        $instance->createdAt = new \DateTimeImmutable();

        return $instance;
    }

    public function __construct()
    {
        $this->todoListItems = new ArrayCollection();
    }

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTodoListItems(): Collection
    {
        return $this->todoListItems;
    }

    public function addTodoListItem(TodoListItem $todoListItem): self
    {
        if (!$this->todoListItems->contains($todoListItem)) {
            $this->todoListItems[] = $todoListItem;
            $todoListItem->setTodoList($this);
        }

        return $this;
    }

    public function removeTodoListItem(TodoListItem $todoListItem): self
    {
        if ($this->todoListItems->contains($todoListItem)) {
            $this->todoListItems->removeElement($todoListItem);
            // set the owning side to null (unless already changed)
            if ($todoListItem->getTodoList() === $this) {
                $todoListItem->setTodoList(null);
            }
        }

        return $this;
    }
}
