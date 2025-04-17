<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LanguageSeeder::class);
        User::factory(10)->create();

        //Attach random languages to users
        $users = User::all();
        $languages = Language::all();

        foreach ($users as $user) {
            $user->languages()->attach(
                $languages->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
