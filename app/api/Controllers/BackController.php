<?php

    namespace App\Api\Controllers;

    use StormBin\Package\Controllers\Controller;
    use StormBin\Package\Views\Views;
    use StormBin\Package\Request\Request;
    use App\Models\Task;
    class BackController extends Controller
    {
        private $request;
        public function __construct(){
            $this->request = new Request();
        }
        public function getInfo() {
            $tasks = Task::all();
            $formattedTasks = [];
        
            foreach ($tasks as $task) {
                $formattedTasks[$task->id] = [
                    "id" => $task->id,
                    "title" => $task->title,
                    "created_at" => $task->created_at,
                    "updated_at" => $task->updated_at
                ];
            }
        
            return Views::jsonResponse($formattedTasks);
        }
        
        public function index()
        {
            $data = [
                'message'=>'message',
                'status'=>True   
            ];
            return Views::jsonResponse($data, 201);
        }
    }
