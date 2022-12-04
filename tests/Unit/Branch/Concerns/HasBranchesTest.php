<?php

namespace Tests\Unit\Branch\Concerns;

use App\Domains\Branch\Models\Branch;
use App\Domains\User\Models\User;
use Tests\TestCase;

class HasBranchesTest extends TestCase
{
    /** @test */
    public function branch_relationship_methods(): void
    {
        $user = User::factory()->withDefaultBranch()->create();
        $branch = $user->nearestBranch();

        $this->assertInstanceOf(Branch::class, $branch);

        $this->assertTrue($user->belongsToBranch($branch));

        $this->assertEquals($branch->id, $user->fresh()->nearestBranch()->id);
        $this->assertEquals($branch->id, $user->fresh()->currentBranch->id);

        // Test with another user that isn't on the branch...
        $otherUser = User::forceCreate([
            'name' => 'Adam Wathan',
            'email' => 'adam@laravel.com',
            'password' => 'secret',
        ]);

        $this->assertFalse($otherUser->belongsToBranch($branch));

        $branch->users()->attach($otherUser);

        $this->assertTrue($otherUser->fresh()->belongsToBranch($branch));

        $this->assertEquals($branch->id, $otherUser->fresh()->nearestBranch()->id);
        $this->assertEquals($branch->id, $otherUser->fresh()->currentBranch->id);
    }
}
