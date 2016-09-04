<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FragmentsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     *
     * Test: GET /api/stories/1.
     */
    public function it_fetches_fragments()
    {
        $this->seed('StoriesSeeder');

        $this->get('/api/stories/1')->seeJsonStructure([
            'data' => [
                'title',
                'synopsis',
                'author',
                'story_type_id',
                'fragments' => [
                    '*' => [
                        'content'
                    ]
                ]
            ]
        ]);
    }

    /**
     * @test
     *
     * Test: GET /api/authenticate.
     */
    public function it_authenticates_a_user()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);
        $this->post('/api/authenticate', ['email' => $user->email, 'password' => 'foo'])->seeJsonStructure(['token']);
    }

    /**
     * @test
     *
     * Test: POST /api/fragments.
     */
    public function it_saves_a_fragment()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);
        $story = factory(App\Story::class)->create([
            'user_id' => $user->id
        ]);

        $fragment = [
            'content'          => 'This is a test fragment',
            'fragment_type_id' => 1,
            'user_id'          => $user->id,
            'story_id'         => $story->id,
            'fragment_type'    => 1,
            'order'            => 1
        ];

        $this->post('/api/fragments', $fragment, $this->headers($user))->seeStatusCode(201);
    }
}
