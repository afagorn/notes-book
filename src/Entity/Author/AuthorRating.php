<?php

namespace Entity\Author;

class AuthorRating
{
    /**
     * @var int
     */
    private int $value;

    /**
     * AuthorRating constructor.
     * @param int $value
     */
    public function __construct(int $value = 0)
    {
        $this->setValue($value);
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        if($value > 5 || $value < 0) {
            throw new \InvalidArgumentException('AuthorRating must be between 1 and 5');
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}