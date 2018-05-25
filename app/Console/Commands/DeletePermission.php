<?php

namespace Tonic\Console\Commands;

use Tonic\Permission;

use Illuminate\Console\Command;

class DeletePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:permission {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a permission from database';

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

        if (! Permission::where('name', $permission)->first()) {
            $this->info('The permission "' . $permission . '" does not exist!');
            return;
        }

        Permission::where('name', $permission)->delete();

        $this->info("Permission \"{$permission}\" deleted successfully!");
    }
}
