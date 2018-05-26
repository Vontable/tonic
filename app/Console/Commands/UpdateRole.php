<?php

namespace Tonic\Console\Commands;

use Tonic\Role;

use Illuminate\Console\Command;

class UpdateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:role {old_role} {new_role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a role name from database';

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
        $old_role = $this->argument('old_role');
        $new_role = $this->argument('new_role');

        if (! Role::where('name', $old_role)->first()) {
            $this->info('"' . $old_role . '" could not be found. It does not exist!');
            return;
        } else if (Role::where('name', $new_role)->first()) {
            $this->info('"' . $old_role . '" could not be updated. "' . $new_role . '" exists already!');
            return;
        }

        Role::where('name', $old_role)->update([
            'name' => $new_role
        ]);

        $this->info('"' . $old_role . '" has been updated to "' . $new_role . '"');
    }
}
