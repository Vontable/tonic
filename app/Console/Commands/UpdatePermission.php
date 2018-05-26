<?php

namespace Tonic\Console\Commands;

use Tonic\Permission;

use Illuminate\Console\Command;

class UpdatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:permission {old_permission} {new_permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a permission name from database';

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
        $old_permission = $this->argument('old_permission');
        $new_permission = $this->argument('new_permission');

        if (! Permission::where('name', $old_permission)->first()) {
            $this->info('"' . $old_permission . '" could not be found. It does not exist!');
            return;
        } else if (Permission::where('name', $new_permission)->first()) {
            $this->info('"' . $old_permission . '" could not be updated. "' . $new_permission . '" exists already!');
            return;
        }

        Permission::where('name', $old_permission)->update([
            'name' => $new_permission
        ]);

        $this->info('"' . $old_permission . '" has been updated to "' . $new_permission . '"');
    }
}
