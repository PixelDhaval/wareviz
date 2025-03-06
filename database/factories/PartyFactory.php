<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Party>
 */
class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pan = $this->generatePan();
        $gst = $this->generateGst($pan);
        return [
            "legal_name" => $this->faker->name(),
            "trade_name" => $this->faker->name(),
            "address_line_1" => $this->faker->address(),
            "address_line_2" => $this->faker->address(),
            "city" => $this->faker->city(),
            "state_id" => State::inRandomOrder()->first()->id,
            "group_id" => Group::inRandomOrder()->first()->id,
            "pincode" => $this->faker->numerify('######'),
            "phone" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "website" => $this->faker->url(),
            "tax_type" => $this->faker->randomElement(["REG", "SEZ", "COM"]),
            "is_tds_applicable" => $this->faker->boolean(),
            "tds_rate" => $this->faker->randomFloat(2, 0, 100),
            "opening_balance" => $this->faker->randomFloat(2, 0, 100000),
            "gst" => $gst,
            "pan" => $pan,
        ];
    }

    private function generatePan()
    {
        return strtoupper($this->faker->bothify('?????####?')); 
        // ????? - 5 random letters
        // ####  - 4 random numbers
        // ?     - 1 random letter
    }

    private function generateGst($pan)
    {
        $stateCodes = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
            '31', '32', '33', '34', '35', '36', '37'
        ];

        $stateCode = $this->faker->randomElement($stateCodes);
        ;
        $entityCode = $this->faker->numberBetween(0, 9);
        $checkDigit = 'Z';
        $lastDigit = $this->faker->numberBetween(0, 9);

        return "{$stateCode}{$pan}{$entityCode}{$checkDigit}{$lastDigit}";
    }
}
