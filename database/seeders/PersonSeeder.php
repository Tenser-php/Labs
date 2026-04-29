<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('data/person_data.json'));

        if ($json === false) {
            throw new \RuntimeException('Unable to read database/data/person_data.json');
        }

        $people = collect(json_decode($json, true, 512, JSON_THROW_ON_ERROR))
            ->map(function (array $person): array {
                return [
                    'name' => $person['name'],
                    // Keep the schema as integer by storing YYYYMMDD.
                    'birthday' => (int) preg_replace('/\D+/', '', $person['birthday']),
                    'sex' => $person['sex'],
                    'department' => $person['department'],
                    'role' => $person['role'],
                    'phone' => $person['phone_number'],
                    'age' => (int) $person['age'],
                ];
            })
            ->all();

        DB::table('person')->truncate();
        DB::table('person')->insert($people);
    }
}
