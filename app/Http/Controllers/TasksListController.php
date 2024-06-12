<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksListController extends Controller
{
    public function getTasks()
    {
        try {
            $id = auth()->user()->id;
            $tasks = Tasks::where('user_id', $id)->get();
            return response()->json([
                'message' => 'Success',
                'data' => $tasks
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function postOrUpdateTasks(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $task = Tasks::updateOrCreate(
                ['id' => $request->id],
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'due_date' => $request->due_date,
                    'user_id' => $id,
                    'completed' => isset($request->completed) ? $request->completed : false,
                    'is_priority' => $request->is_priority
                ]
            );
            return response()->json([
                'message' => 'Success',
                'data' => $task
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'error' => $th->getMessage()
            ], 500);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteTasks($id) {
        try {
            $task = Tasks::find($id);
            if (!$task) {
                return response()->json([
                    'message' => 'Task not found'
                ], 404);
            }
            $task->delete();
            return response()->json([
                'message' => 'Success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
