<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DummyTransaction>
 */
class DummyTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        $type = ['Kredit', 'Debit'];
        $label = ["Invest", "Pemindahan Dana", "Pembelian", "Cicilan", "Internet","Pajak", "BPJS", "Asuransi", "Pinjaman","Listrik/"];
        return [
            'amount' => fake()->randomNumber(9, true),
            'sendAcc' => fake()->randomNumber(8, true),
            'recvAcc' => fake()->randomNumber(8, true),
            'type' => $type[array_rand($type)],
            'label' => $label[array_rand($label)],
            'date' => fake()->dateTimeThisYear(),
        ];
    }
}
