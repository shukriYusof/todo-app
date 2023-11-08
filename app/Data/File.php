<?php

namespace App\Data;

use App\Enums\File as EnumsFile;

class File
{

    public function __construct(
        private readonly string $name,
        private readonly string $originalName,
        private readonly string $mime,
        private readonly string $path,
        private readonly string $hash,
        private readonly int $size,
        private readonly EnumsFile $type
    )
    {

    }

    public function toArray() : array
    {
        return [
            'name' => $this->name,
            'original_name' => $this->originalName,
            'mime' => $this->mime,
            'path' => $this->path,
            'hash' => $this->hash,
            'size' => $this->size,
            'type' => $this->type
        ];
    }
}
