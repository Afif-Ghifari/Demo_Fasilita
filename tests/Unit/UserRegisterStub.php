<?php

namespace Tests\Unit;

use App\Models\Peran;
use App\Models\Pengguna;
use Tests\TestCase;
use App\Services\NoIndukVerifierService;

class UserRegisterStub extends TestCase
{
    /** @test */
    // public function register_success()
    // {
    //     // Mock service noIndukVerifier
    //     $this->mock(NoIndukVerifierService::class, function ($mock) {
    //         $mock->shouldReceive('verify')
    //             ->once()
    //             ->andReturn([
    //                 'type' => 'Valid',
    //                 'errors' => []
    //             ]);
    //     });

    //     // Mock Peran::where(...)->value(...)
    //     $this->mock(Peran::class, function ($mock) {
    //         $mock->shouldReceive('where')
    //             ->with('kode_peran', 'GST')
    //             ->andReturnSelf();

    //         $mock->shouldReceive('value')
    //             ->with('id_peran')
    //             ->andReturn(99); // return role id palsu
    //     });

    //     // Mock Pengguna::create()
    //     $this->mock(Pengguna::class, function ($mock) {
    //         $mock->shouldReceive('create')
    //             ->once()
    //             ->andReturn(true);
    //     });

    //     // Data request
    //     $data = [
    //         'no_induk' => '2341720076',
    //         'nama' => 'rani',
    //         'username' => 'rani123',
    //         'password' => 'secret',
    //         'password_confirmation' => 'secret',
    //     ];

    //     $response = $this->postJson('/register', $data);

    //     $response->assertStatus(200)
    //         ->assertJson([
    //             'status' => true,
    //             'message' => 'Registrasi berhasil',
    //         ]);
    // }

    /** @test */
    public function register_fail_when_no_induk_invalid()
    {
        // Mock service mengembalikan tidak valid
        $this->mock(NoIndukVerifierService::class, function ($mock) {
            $mock->shouldReceive('verify')
                ->once()
                ->andReturn([
                    'type' => 'Tidak Valid',
                    'errors' => ['format salah']
                ]);
        });

        $data = [
            'no_induk' => '123',
            'nama' => 'rani',
            'username' => 'rani123',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

        $response = $this->postJson('/register', $data);

        $response->assertStatus(422)
    ->assertJson([
        'message' => 'Nomor induk tidak valid',
        'errors' => [
            'no_induk' => ['Nomor induk tidak valid']
        ]
    ]);

    }

    /** @test */
    public function register_fail_when_validation_error()
    {
        $response = $this->postJson('/register', []); 

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'no_induk', 'nama', 'username', 'password'
        ]);
    }
}
