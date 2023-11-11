<?php

namespace App\Http\Controllers\Api;

use App\Data\Task as DataTask;
use App\Enums\Priority;
use App\Http\Resources\Api\TaskCollection;
use App\Http\Resources\Api\TaskResource;
use App\Models\Task;
use App\Services\UploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TaskController extends ApiController
{
    public function __construct(
        private readonly UploadService $service,
        private readonly string|null $file = null
    ) {}

    public function index(Request $request) : JsonResponse
    {
        $currPage = $request->input('page',1);
        $perPage = $request->input('perPage', 4);
        $task = Task::skip(($currPage - 1) * $perPage)
                    ->take($perPage)
                    ->get();

        $total = Task::count();

        return $this->successJsonResponse(
            'Successfully load task',
            [
                'all' => TaskCollection::make($task),
                'total' => $total
            ],
            200
        );
    }

    public function store(Request $request) : JsonResponse
    {
        $this->__hasFileAttachment($request);

        $task = Task::create($this->convertToTaskObject($request, $this->file)->toArray());

        return $this->successJsonResponse(
            'Successfully created a task',
            TaskResource::make($task),
            200
        );
    }

    public function update(Task $task, Request $request) : JsonResponse
    {
        $this->__hasFileAttachment($request);

        $task->update($this->convertToTaskObject($request, $this->file)->toArray());

        return $this->successJsonResponse(
            'Successfully updated a task',
            TaskResource::make($task),
            200
        );
    }

    private function __hasFileAttachment($request) : void
    {
        if ($request->hasFile('attachment')) {
            $type = $this->getType($request->file('attachment'));
            $this->file = $this->service->{$type}(
                file: $request->file('attachment')
            );
        }
    }

    private function convertToTaskObject($request) : DataTask
    {
        $task = new DataTask(
            title: "{$request->title}",
            description: "{$request->description}",
            priority: $request->priority == null ? null : Priority::fromName($request->priority),
            dueDate: Date::parse($request->dueDate),
            status: null,
            tags: null,
            attachment: $this->file
        );

        return $task;
    }
}
