<?php
namespace Entity\Author;

use Entity\User\User;

class Author extends User
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var AuthorRating
     */
    private AuthorRating $rating;

    public function __construct()
    {

    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}