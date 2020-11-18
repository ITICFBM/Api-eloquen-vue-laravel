<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User:: create([
            'name' => 'Saira Martinez',
            'email' => 'Saira@gmail.com',
            'password' => bcrypt('Saira'),
            
        ]);
    
    }
}
