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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }
}