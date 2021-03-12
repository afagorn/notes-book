<?php

namespace Entity\Author\Repository;

use Entity\Author\Author;

/**
 * Class AuthorDBRepository
 * @package Entity\Author\Repository
 */
class AuthorDBRepository implements IAuthorRepository
{
    /**
     * @param Author $author
     */
    public function addAuthor(Author $author): void
    {

    }

    /**
     * @param Author $author
     */
    public function removeAuthor(Author $author): void
    {
        // TODO: Implement removeAuthor() defineMethod.
    }
}