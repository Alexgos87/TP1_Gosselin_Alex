<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Equipment;
use App\Models\Sport;
use App\Models\Category;
use App\Models\Rental;
use App\Models\Review;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SportSeeder::class,
            EquipmentSeeder::class,
            EquipmentSportSeeder::class,
        ]);

        Sport::factory(10)->create()->each(function ($sport) {
            $equipments = Equipment::factory(2)->create([
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
            $sport->equipment()->attach($equipments->pluck('id'));
        });

        User::factory(10)->create();
        $users = User::all();
        $equipments = Equipment::all();

        $users->each(function ($user) use ($equipments) {
            $equipments->random(rand(2, 3))->each(function ($equipment) use ($user) {

                $rental = Rental::factory()->create([
                    'user_id' => $user->id,
                    'equipment_id' => $equipment->id,
                ]);

                Review::factory()->create([
                    'user_id' => $user->id,
                    'rental_id' => $rental->id,
                ]);
            });
        });
    }
}
