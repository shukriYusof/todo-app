<?php

namespace App\Data;

use App\Enums\Priority;
use App\Enums\Status;
use App\Models\File;
use Illuminate\Support\Carbon;

class Task
{

    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly Priority|null $priority,
        private readonly Carbon $dueDate,
        private readonly Status|null $status,
        private readonly object|null $tags,
        private readonly File|null $attachment
    )
    {

    }

    public function toArray() : array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'due_date' => $this->dueDate,
            'status' => $this->status,
            'tags' => $this->tags,
            'file_id' => $this->attachment?->id
        ];
    }
}
