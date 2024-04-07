<?php

namespace Ijpatricio\Mingle\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\select;
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
        {--vue : Mingle with Vue}
        {--react : Mingle with React}
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
        $name = $this->getNameInput();

        $qualifiedClass = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($qualifiedClass);

        if ($this->canCreateClass() === false) {
            return false;
        }

        if (! $this->option('vue') && ! $this->option('react')) {
            $option = select(
                label: 'Which JavaScript framework do you want to use?',
                options: [
                    'vue' => 'Vue',
                    'react' => 'React',
                ],
            );

            $this->addOption($option);
        }

        $customOption = 'Other - customize';

        $mingleFilePath = select(
            label: 'What is the destination JavaScript file?',
            options: $this
                ->guessJavaScriptFilePath($name)
                ->push($customOption)
                ->toArray()
        );

        if ($mingleFilePath === $customOption) {
            $mingleFilePath = text(
                label: 'Enter the destination JavaScript file path',
                default: Str::finish(config('mingle.js-basepath'), '/') . $name,
                required: true,
            );
        }

        $this->createMingleClassFile($qualifiedClass, $path);

        $this->createMingleJavaScriptFile($name, $mingleFilePath);

        $this->outputSuccessInformation($path);
    }

    /**
     * Checks if the class can be created.
     *
     */
    protected function canCreateClass(): bool
    {
        // First we need to ensure that the given name is not a reserved word within the PHP
        // language and that the class name will actually be valid. If it is not valid we
        // can error now and prevent from polluting the filesystem using invalid files.
        if ($this->isReservedName($this->getNameInput())) {
            $this->components->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        // Next, We will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->components->error($this->type . ' already exists.');

            return false;
        }

        return true;
    }

    /**
     * Guess the path to the JavaScript file.
     *
     */
    protected function guessJavaScriptFilePath($name): Collection
    {
        $guesses = collect();

        $parts = collect(explode('/', $name));

        $last = $parts->pop();

        $partsPath = $parts->implode('/');

        $jsBasepath = config('mingle.js-basepath');

        if ($jsBasepath !== 'resources/js') {
            $guesses->push("{$jsBasepath}/{$partsPath}/{$last}.js");
            $guesses->push("{$jsBasepath}/{$partsPath}/{$last}/index.js");

            return $guesses->map(fn($path) => Str::replace('//', '/', $path));
        }

        $guesses->push("{$jsBasepath}/{$partsPath}/{$last}.js");
        $guesses->push("{$jsBasepath}/{$partsPath}/{$last}/index.js");

        return $guesses->map(fn($path) => Str::replace('//', '/', $path));
    }

    /**
     * Create the mingle Livewire class.
     *
     */
    protected function createMingleClassFile(string $name, string $path): void
    {
        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));
    }

    /**
     * Create the mingle Javascript file.
     *
     */
    protected function createMingleJavaScriptFile(string $name, string $path): void
    {
        $this->makeDirectory($path);

        $this->files->put(
            path: $path,
            contents: $this->buildJavascriptFile($path)
        );
    }

    protected function buildJavascriptFile($path): string
    {
        $replacements = [
            '{{ $name }}' => $path,
            '{{ $path }}' => $path,
        ];

        $stub = str(
            $this->files->get(__DIR__ . '/../../resources/stubs/mingle.javascript.stub')
        )->replace(
            search: array_keys($replacements),
            replace: array_values($replacements)
        );

        dd($stub);
    }

    /**
     * Output the success information to the console.
     *
     */
    protected function outputSuccessInformation(string $path): void
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
        return __DIR__ . '/../../resources/stubs/mingle.livewire.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Livewire';
    }
}
