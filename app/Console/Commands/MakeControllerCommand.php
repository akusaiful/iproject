<?php

/**
 * Based on guide : 
 * https://medium.com/@ariadoos/laravel-custom-file-stubs-ed32f046ea81
 */
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeControllerCommand extends Command
{
    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Conroller name 
     */
    public $name;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'x:controller {name?} {--m|model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enhancement controller with view';

    private $views = [
        '_form.blade',
        'create.blade',
        'edit.blade',
        'index.blade',
        'show.blade'
    ];

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if(!$this->argument('name')){
            $this->name = $this->ask('Controller to be named?');
        }else{
            $this->name = $this->argument('name');
        }

        // Main Class
        $path = $this->getSourceFilePath();
        $this->makeDirectory(dirname($path));
        $contents = $this->getSourceFile();
        $this->createFile($path, $contents);

        // View folder
        foreach ($this->views as $view) {
            $path = $this->getSourceViewFilePath($view);
            $this->makeDirectory(dirname($path));
            $contents = $this->getSourceViewFile($view);
            $this->createFile($path, $contents);
        }
    }

    public function createFile($path, $contents)
    {
        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} ALREADY EXIST ..SKIP");
        }
    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/controller/';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        $classModel = $this->option('model') ?: $this->name;

        $className = $this->getSingularClassName($this->name);

        return [
            // Nama controller         
            'CLASS_NAME' => $className,

            'CLASS_NAME_FOLDER' => strtolower($className),

            // Nama related model
            'CLASS_MODEL' => $this->getSingularClassName($classModel),

            // nama model variable
            'MODEL' => strtolower($classModel),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath() . 'controller.stub', $this->getStubVariables());
    }

    public function getSourceViewFile($view)
    {
        return $this->getStubContents($this->getStubPath() . 'views/'  . $view . '.stub', $this->getStubVariables());
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('#' . $search . '#', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path('App/Http/Controllers') . '/' . ucwords($this->name) . 'Controller.php';
        // return base_path('app/Interfaces');
    }

    public function getSourceViewFilePath($view)
    {
        return base_path('resources/views') . '/' . strtolower($this->name) . '/' . $view . '.php';
        // return base_path('app/Interfaces');
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
