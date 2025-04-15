<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

use function Laravel\Prompts\error;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskServices)
    {
        $this->taskService = $taskServices;
    }

    public function getAll()
    {
        return $this->taskService->getAll();
    }
    
    public function get ($id)
    {
        return $this->taskService->get($id);
    }

    public function store (Request $request)
    {
        return $this->taskService->store($request);
    }

    public function update ($id, Request $request)
    {
        return $this->taskService->update($id, $request);
    }

    public function destroy ($id)
    {        
        return $this->taskService->destroy($id);
    }


    


}
