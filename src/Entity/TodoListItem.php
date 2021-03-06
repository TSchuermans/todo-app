<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoListItemRepository")
 */
class TodoListItem
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
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $completedAt;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\TodoList",
     *     inversedBy="todoListItems",
     *     cascade={"persist","remove"}
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $todoList;

    public static function create(string $title): self
    {
        $instance = new static();
        $instance->title = $title;
        $instance->createdAt = new \DateTimeImmutable();

        return $instance;
    }

    public static function createEmpty(): self
    {
        $instance = new static();
        $instance->createdAt = new \DateTimeImmutable();

        return $instance;
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

    public function getCompletedAt(): ?\DateTimeImmutable
    {
        return $this->completedAt;
    }

    public function setCompletedAt(?\DateTimeImmutable $completedAt): self
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    public function getTodoList(): ?TodoList
    {
        return $this->todoList;
    }

    public function setTodoList(?TodoList $todoList): self
    {
        $this->todoList = $todoList;

        return $this;
    }

    public function toggle(): void
    {
        if ($this->getCompletedAt() instanceof \DateTimeImmutable) {
            $this->completedAt = null;

            return;
        }

        $this->completedAt = new \DateTimeImmutable();
    }
}
