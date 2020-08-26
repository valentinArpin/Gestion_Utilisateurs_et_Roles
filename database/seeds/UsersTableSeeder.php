<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); //vide la table et ajoute nouveaux utilisateurs
        DB::table('role_user')->truncate();//supprime les utilisateurs qui n'existe plus et vide la tablea

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), //pour hashé le pswd
        ]);

        $auteur = User::create([
            'name' => 'auteur',
            'email' => 'auteur@auteur.com',
            'password' => Hash::make('password'),
        ]);

        $utilisateur = User::create([
            'name' => 'utilisateur',
            'email' => 'utilisateur@utilisateur.com',
            'password' => Hash::make('password'),
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $auteurRole = Role::where('name', 'auteur')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();

        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $utilisateur->roles()->attach($utilisateurRole);

    }
}
