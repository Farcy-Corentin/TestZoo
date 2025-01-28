<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Zoo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RegisterAdminCommand extends Command
{
    protected $signature = 'register:admin';
    protected $description = 'Register an admin';

    public function handle(): int
    {
        $name = $this->ask('What is your name?');
        $zooName = $this->ask('What is your zoo name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        $validator = validator(
            [
                'name' => $name,
                'zoo_name' => $zooName,
                'email' => $email,
                'password' => $password,
            ],
            [
                'name' => 'required|string',
                'zoo_name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]
        );

        if ($validator->fails()) {
            $this->error('Invalid input');
            $this->error($validator->errors());
            return self::FAILURE;
        }

        $admin = new User();
        $admin->zoo_id = Zoo::query()->firstWhere('name', $zooName)->id;
        $admin->name = $name;
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->role = 'admin';

        $admin->save();

        $this->info('Admin registered successfully');

        return self::SUCCESS;
    }
}
