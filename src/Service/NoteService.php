<?php

namespace Service;

use Entity\Note\Note;
use Repository\Note\NoteRepository;
use Service\DTO\NoteCreateData;

class NoteService
{
    /**
     * @var NoteRepository
     */
    private NoteRepository $repository;

    /**
     * NoteService constructor.
     * @param NoteRepository $repository
     */
    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param NoteCreateData $data
     */
    public function create(NoteCreateData $data)
    {
        $note = new Note();
        $this->repository->add($note);
        //Events
    }
}