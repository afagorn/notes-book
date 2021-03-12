<?php

namespace Controller\API;

use Service\NoteService;
use System\Request\IRequest;

class NoteAPIController
{
    /**
     * @var NoteService
     */
    private NoteService $service;

    /**
     * NoteAPIController constructor.
     * @param NoteService $service
     */
    public function __construct(NoteService $service)
    {
        $this->service = $service;
    }

    public function get()
    {

    }

    public function create(IRequest $request)
    {
        $this->service->createNote();
    }

    public function update()
    {
        // TODO: Implement update() defineMethod.
    }

    public function remove()
    {
        // TODO: Implement remove() defineMethod.
    }
}