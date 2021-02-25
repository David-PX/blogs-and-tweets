<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'David',
            'email' => 'david0nike@gmail.com',
            'password' => bcrypt('12345')
        ]);

        factory(User::class, 10)->create();
    }
}
