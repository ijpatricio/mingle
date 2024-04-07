<?php

namespace Ijpatricio\Mingle\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\text;
use function Laravel\Prompts\info;

class MingleMakeCommand extends GeneratorCommand
{
    /**
     * The console command description.
     *
     */
    public $description = 'Create a new Mingle class';

    /**
     * The console command name.
     *
     */
    protected $signature = 'make:mingle
        {name : The Mingle class name}
        {--jsfile= : The file path to the JS component, relative to `resources/js`}
        {--force : Create the class even if the mingle already exists}
    ';

    /**
     * The type of class being generated.
     *
     */
    protected $type = 'Mingle';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        // First we need to ensure that the given name is not a reserved word within the PHP
        // language and that the class name will actually be valid. If it is not valid we
        // can error now and prevent from polluting the filesystem using invalid files.
        if ($this->isReservedName($this->getNameInput())) {
            $this->components->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        // Next, We will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->components->error($this->type . ' already exists.');

            return false;
        }

        ray($name);

        $this->createMingleFile($name, $path);

        $this->outputSuccessInformation($path);
    }

    protected function createMingleFile($name, $path)
    {
        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));
    }

    protected function outputSuccessInformation($path)
    {
        $info = $this->type;

        if (windows_os()) {
            $path = str_replace('/', '\\', $path);

        }
        $this->components->info(sprintf('%s [%s] created successfully.', $info, $path));
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../../resources/stubs/mingle.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Livewire';
    }
}
