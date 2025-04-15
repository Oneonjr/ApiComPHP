<?php 

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ValidationTask;

class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepositories)
    {
        $this->taskRepository = $taskRepositories;
    }

    public function getAll()
    {
        
        try {
            $task = $this->taskRepository->getAll();
            
            if (count($task) > 0) {
                return response()->json($task, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }
    
    public function get ($id)
    {
        try {
            $task = $this->taskRepository->get($id);
            
            if ($task) {
                return response()->json($task, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function store (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationTask::RULE_TASK
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {            
            try {            
                $task = $this->taskRepository->store($request);
        
                return response()->json($task, Response::HTTP_CREATED);
            } catch (QueryException $exception) {
                return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function update ($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationTask::RULE_TASK
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            try {            
                $task = $this->taskRepository->update($id,$request);        
                return response()->json($task, Response::HTTP_OK);
            } catch (QueryException $exception) {
                return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function destroy ($id)
    {        
        try {        
            $this->taskRepository->destroy($id);
            return response()->json(null, Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    


}
