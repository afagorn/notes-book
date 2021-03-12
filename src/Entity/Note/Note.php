<?php

namespace Entity\Note;

use Entity\Author\Author;

class Note
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var Author
     */
    private Author $author;

    /**
     * Note constructor.
     * @param int $id
     * @param string $message
     * @param Author $author
     */
    public function __construct(int $id, string $message, Author $author)
    {

    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }
}