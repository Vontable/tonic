<?php

namespace Tonic\Console\Commands;

use Tonic\Role;

use Illuminate\Console\Command;

class DeleteRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:role {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a role from database';

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
        $role = $this->argument('role');

        if (! Role::where('name', $role)->first()) {
            $this->info('The role "' . $role . '" does not exist!');
            return;
        }

        Role::where('name', $role)->delete();

        $this->info("Role \"{$role}\" deleted successfully!");
    }
}
