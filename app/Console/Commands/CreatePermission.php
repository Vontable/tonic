<?php

namespace Tonic\Console\Commands;

use Tonic\Permission;

use Illuminate\Console\Command;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permission {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission and store it in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permission = $this->argument('permission');

        if (Permission::where('name', $permission)->first()) {
            $this->info('Permission "' . $permission . '" exists already!');
            return;
        }

        Permission::create([
            'name' => $permission
        ]);

        $this->info("Permission \"{$permission}\" created successfully!");
    }
}
