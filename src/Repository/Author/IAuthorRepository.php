<?php

namespace Entity\Author\Repository;

use Entity\Author\Author;

/**
 * Interface IAuthorRepository
 * @package Entity\Author\Repository
 */
interface IAuthorRepository
{
    /**
     * @param Author $author
     */
    public function addAuthor(Author $author): void;

    /**
     * @param Author $author
     */
    public function removeAuthor(Author $author): void;
}