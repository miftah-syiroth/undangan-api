<?php

use Core\Database\Generator;
use App\Models\User;
use Core\Valid\Hash;

return new class implements Generator
{
    /**
     * Generate nilai database
     *
     * @return void
     */
    public function run()
    {
        $user = User::find('irothsyiroth@gmail.com', 'email');

        if (!$user->exist()) {
            $user = User::create([
                'name' => 'syiroth',
                'email' => 'irothsyiroth@gmail.com',
                'password' => Hash::make('momen_k4mpr3t')
            ]);
        }


        $user->fill([
            'is_filter' => true,
            'access_key' => Hash::rand(25),
        ])->save();
    }
};
