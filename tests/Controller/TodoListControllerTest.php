<?php

namespace App\Tests\Controller;

use App\DataFixtures\TodoListFixtures;
use Symfony\Component\Panther\PantherTestCase;

class TodoListControllerTest extends PantherTestCase
{
    public function testToggleClass()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink(TodoListFixtures::TODO_ITEM_TITLE)->link();
        $initialClass = $link->getNode()->getAttribute('class');

        $crawler = $client->click($link);

        $link = $crawler->selectLink(TodoListFixtures::TODO_ITEM_TITLE)->link();
        $updatedClass = $link->getNode()->getAttribute('class');

        $this->assertNotSame($initialClass, $updatedClass);
    }
}
