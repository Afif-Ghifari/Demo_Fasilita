<?php

namespace Database\Factories;

use App\Models\Peran;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeranFactory extends Factory
{
    protected $model = Peran::class;

    public function definition()
    {
        return [
            'kode_peran' => 'GST',
            'nama_peran' => 'Guest',
        ];
    }
}
