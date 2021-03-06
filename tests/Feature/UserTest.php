<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Url;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function get_urls_for_authenticated_user()
    {
        $user = factory(User::class)->create();
        $url1 = factory(Url::class)->create([
            'user_id' => $user->id
        ]);
        $url2 = factory(Url::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $this->get('/user/urls')
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $url1->id,
                'url' => $url1->url,
                'key' => $url1->key,
                'user_id' => "$user->id"
            ])->assertJsonFragment([
                'id' => $url2->id,
                'url' => $url2->url,
                'key' => $url2->key,
                'user_id' => "$user->id"
            ]);
    }

    /** @test */
    public function attempt_to_access_users_urls_when_not_logged_in_returns_error()
    {
        $user = factory(User::class)->create();

        $this->get('/user/urls')
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthenticated.'
            ]);
    }
}
