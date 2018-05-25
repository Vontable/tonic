<?php

namespace Tonic\Console\Commands;

use Tonic\Role;

use Illuminate\Console\Command;

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:role {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a role and store it in database';

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

        if (Role::where('name', $role)->first()) {
            $this->info('Role "' . $role . '" exists already!');
            return;
        }

        Role::create([
            'name' => $role
        ]);

        $this->info("Role \"{$role}\" created successfully!");
    }
}
