<?php

use Illuminate\Database\Seeder;
use App\Publication;

class Publicationsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Publication',10)->create();
    }
}
