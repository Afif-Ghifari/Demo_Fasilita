<?php

namespace Tests\Feature;

use App\Models\Pengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    /** @test */
    public function login_success()
    {
        // Ambil user yang sudah ada di DB
        $user = Pengguna::where('username', 'Admin')->first();

        // Jika user tidak ditemukan, fail (biar jelas)
        $this->assertNotNull($user, "User Admin tidak ditemukan di database");

        // Pastikan password benar (opsional)
        $this->assertTrue(
            Hash::check('12345', $user->password),
            "Password user tidak cocok"
        );

        // Test login
        $response = $this->post('/login', [
            'username' => 'Admin',
            'password' => '12345'
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

}
