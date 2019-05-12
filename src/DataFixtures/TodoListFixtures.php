<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\TodoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TodoListFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $todoList = TodoList::create('Automanager');

        $manager->persist($todoList);
        $manager->flush();
    }
}
