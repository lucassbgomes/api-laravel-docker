<?php
use Illuminate\Database\Seeder;
use App\Models\v1\User;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
use Illuminate\Support\Facades\Storage;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();

    for($i=0; $i<5; $i++){
      User::create([
        "firstName"=>$faker->firstName(),
        "lastName" => $faker->boolean(10) ? $faker->lastName()." ".$faker->lastName() : $faker->lastName(),
        "email" => $faker->unique()->email(),
        "password"  => bcrypt("secret"),
      ]);
    }
	}
}
