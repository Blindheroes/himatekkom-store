use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RefreshDatabase;

<?php

namespace Tests\Unit\Models;


class UserTest extends TestCase
{

    /** @test */
    public function it_returns_true_when_user_is_new()
    {
        $user = User::factory()->create([
            'member_id_status' => false,
            'member_id_approved' => false
        ]);

        $this->assertTrue($user->isNewUser());
    }

    /** @test */
    public function it_returns_false_when_member_id_status_is_true()
    {
        $user = User::factory()->create([
            'member_id_status' => true,
            'member_id_approved' => false
        ]);

        $this->assertFalse($user->isNewUser());
    }

    /** @test */
    public function it_returns_false_when_member_id_approved_is_true()
    {
        $user = User::factory()->create([
            'member_id_status' => false,
            'member_id_approved' => true
        ]);

        $this->assertFalse($user->isNewUser());
    }

    /** @test */
    public function it_returns_false_when_both_member_id_status_and_approved_are_true()
    {
        $user = User::factory()->create([
            'member_id_status' => true,
            'member_id_approved' => true
        ]);

        $this->assertFalse($user->isNewUser());
    }
}
