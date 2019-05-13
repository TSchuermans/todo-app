<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\TodoListItem;
use PHPUnit\Framework\TestCase;

class TodoListItemTest extends TestCase
{
    public function testToggleClearsCompletedAt(): void
    {
        $todoListItem = TodoListItem::createEmpty();

        $this->assertNull($todoListItem->getCompletedAt());

        $todoListItem->toggle();
        $this->assertInstanceOf(\DateTimeImmutable::class, $todoListItem->getCompletedAt());

        $todoListItem->toggle();
        $this->assertNull($todoListItem->getCompletedAt());
    }

    public function testToggleFillsCompletedAt(): void
    {
        $todoListItem = TodoListItem::createEmpty();

        $this->assertNull($todoListItem->getCompletedAt());

        $todoListItem->toggle();
        $this->assertInstanceOf(\DateTimeImmutable::class, $todoListItem->getCompletedAt());
    }
}
