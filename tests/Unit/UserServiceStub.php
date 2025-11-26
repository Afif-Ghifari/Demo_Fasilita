<?php

namespace Tests\Feature;

use App\Models\Pengguna;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class UserServiceStub extends TestCase
{
    /** @test */
    public function login_success_with_stub()
    {
        // Fake user
        $fakeUser = new Pengguna([
            'id' => 1,
            'username' => 'Admin',
            'password' => 'hashedpw'
        ]);

        // 1. Mock UserService
        $service = Mockery::mock(UserService::class);
        $service->shouldReceive('attemptLogin')
            ->with('Admin', '12345')
            ->andReturn($fakeUser);

        // Replace instance in container
        $this->app->instance(UserService::class, $service);

        // 2. Mock Auth::guard()->login()
        $guard = Mockery::mock(\Illuminate\Contracts\Auth\Guard::class);

        $guard->shouldReceive('login')
            ->once()
            ->with($fakeUser, false);

        $guard->shouldReceive('user')->andReturn($fakeUser);

        Auth::shouldReceive('guard')->with('web')->andReturn($guard);

        // 3. Matikan middleware
        $this->withoutMiddleware();

        // 4. Eksekusi request
        $response = $this->post('/login', [
            'username' => 'Admin',
            'password' => '12345'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
    }
}
