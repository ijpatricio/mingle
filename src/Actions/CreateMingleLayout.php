<?php

namespace Ijpatricio\Mingle\Actions;

use Illuminate\Filesystem\Filesystem;

/**
 * Creates a Mingle layout file at a specified location.
 * 
 * This class copies a stub file from resources/stubs/mingle.layout.stub
 * to the target directory as mingle.blade.php. It will create the target
 * directory if it doesn't exist.
 * 
 */
class CreateMingleLayout
{
    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Invokes the action to create the Mingle layout file.
     *
     * @return bool True if the file was created, false if it already exists.
     */
    public function __invoke()
    {
        // Path related pre setup
        //
        $fs = new Filesystem();
        $layoutDir = base_path($this->filePath);
        $stubPath = base_path('resources/stubs/mingle.layout.stub');
        $targetPath = $layoutDir . '/mingle.blade.php';

        // Create the target directory if it doesn't exist
        //
        if (!$fs->exists($layoutDir)) {
            $fs->makeDirectory($layoutDir, 0755, true);
        } 
        
        // If the target file already exists, do not overwrite and return false
        // Could implement complex logic to identify code differences and prompt user take action
        //
        if ($fs->exists($targetPath)) {
            return false; 
        }

        // Read the contents of the stub file and write it to the target file
        //
        $stub = $fs->get($stubPath);
        $fs->put($targetPath, $stub);

        return true;
    }
}
