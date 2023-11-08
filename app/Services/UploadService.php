<?php

namespace App\Services;

use App\Data\File as DataFile;
use App\Enums\File as EnumsFile;
use App\Models\File;

class UploadService
{
    public function image($file)
    {
        File::create($this->convertToTaskObject($file, __FUNCTION__));
    }

    private function convertToTaskObject($file, $type) : DataFile
    {
        $prefix = 'TDA';
        $task = new DataFile(
            name:  str_pad($file->getClientOriginalName(), strlen($file->getClientOriginalName()) + 3, $prefix, STR_PAD_LEFT),
            originalName: $file->getClientOriginalName(),
            mime: $file->getClientMimeType(),
            path: $file->getPath(),
            hash: $file->hashName(),
            size: $file->getSize(),
            type: EnumsFile::fromName($type)
        );

        return $task;
    }
}

