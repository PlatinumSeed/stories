<?php

use Illuminate\Database\Seeder;

class StoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fragments')->delete();
        DB::table('stories')->delete();
        DB::table('users')->delete();

        $user = factory(App\User::class)->create();
        $story = factory(App\Story::class)->create([
            'user_id' => $user->id
        ]);

        $fragments = factory(App\Fragment::class, 20)->create([
            'story_id' => $story->id,
            'user_id'  => $user->id
        ]);
    }
}
