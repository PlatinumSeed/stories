<?php

use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stories')->delete();
        DB::table('users')->delete();

        $story = factory(App\Story::class)->create([
            'user_id' => 1
        ]);
    }
}
