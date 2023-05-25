<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class File
{
    public $slug;
    public $options;
    /**
     * @return string
     */
    public function handle(Request $request, $field, $table_slug, $options = null)
    {
        $this->slug = $table_slug;
        $this->options = $options;

        if (!$request->hasFile($field)) {
            return;
        }

        $files = Arr::wrap($request->file($field));

        $filesPath = [];
        $path = $this->generatePath();

        foreach ($files as $file) {
            $filename = $this->generateFileName($file, $path);
            $file->storeAs(
                $path,
                $filename.'.'.$file->getClientOriginalExtension(),
                'public'
            );

            array_push($filesPath, [
                'download_link' => $path.$filename.'.'.$file->getClientOriginalExtension(),
                'original_name' => $file->getClientOriginalName(),
            ]);
        }

        return json_encode($filesPath);
    }

    /**
     * @return string
     */
    protected function generatePath()
    {
        return $this->slug.DIRECTORY_SEPARATOR.date('FY').DIRECTORY_SEPARATOR;
    }

    /**
     * @return string
     */
    protected function generateFileName($file, $path)
    {
        if (isset($this->options->preserveFileUploadName) && $this->options->preserveFileUploadName) {
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
            $filename_counter = 1;

            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
            }
        } else {
            $filename = Str::random(20);

            // Make sure the filename does not exist, if it does, just regenerate
            while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                $filename = Str::random(20);
            }
        }

        return $filename;
    }
}
