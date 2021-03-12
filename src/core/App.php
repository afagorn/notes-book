<?php
namespace core;

use core\Request\IRequest;
use System\Route\Route;

class App
{
    /**
     * @var IRequest
     */
    private IRequest $request;

    public function __construct(IRequest $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $this->request->init();

        Route::run($this->request);
    }
}