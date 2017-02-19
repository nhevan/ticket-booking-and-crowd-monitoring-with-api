<?php

use App\Ticket;
use Picqer\Barcode\BarcodeGeneratorPNG;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Ticket::class, function (Faker\Generator $faker) {
	static $reg_id_start_number = 40000;
    
    $last_ticket_id = Ticket::all()->pluck('id')->last();
    $reg_code = $reg_id_start_number + $last_ticket_id + 1;
    $reg_id = 'YB-'.$reg_code;

    $generator = new BarcodeGeneratorPNG();
	$barcode = $generator->getBarcode($reg_id, $generator::TYPE_CODE_128, 3, 170);
	$barcode = base64_encode($barcode);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->e164PhoneNumber,
        'slogan' => $faker->word,
        'reg_id' => $reg_id,
        'barcode' => $barcode
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    $right_option = $faker->word;
    return [
        'question' => $faker->sentence,
        'option1' => $faker->word,
        'option2' => $faker->word,
        'option3' => $right_option,
        'right_option' => $right_option,
    ];
});
