<?php

namespace Tonic\Console\Commands;

use Tonic\Permission;

use Illuminate\Console\Command;

class ListPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all permissions from database';

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
        if (! $permissions = Permission::all()) {
            $this->info('There are no permissions. Create some with "create:permission {permission}"');
            return;
        }

        foreach ($permissions as $permission) {
            $this->info('- ' . $permission->name);
        }
    }
}
