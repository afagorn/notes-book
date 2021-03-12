<?php

namespace Entity\Author\Repository;

use Entity\Author\Author;

class AuthorMemoryRepository implements IAuthorRepository
{
    private array $items;

    /**
     * @param Author $author
     */
    public function addUser(Author $author): void
    {
        $this->items[$author->getId()] = $author;
    }

    /**
     * @param Author $author
     */
    public function removeUser(Author $author): void
    {
        if(array_key_exists($author->getId(), $this->items)) {
            unset($this->items[$author->getId()]);
        }
    }
}