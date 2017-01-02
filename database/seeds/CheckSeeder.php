<?php

use Illuminate\Database\Seeder;
use App\Models\Check;
use Illuminate\Database\Eloquent\Model;


class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Check::insert([

        	  ['check_in' => '2016-12-31 11:23:17','check_out' => '2016-12-31 23:44:43','check_time' => '741','user_id' => '4','created_at' => '2016-12-31 08:23:17','updated_at' => '2017-01-01 15:31:49'],
			  ['check_in' => '2016-12-31 01:44:45','check_out' => '2016-12-31 23:07:38','check_time' => '922','user_id' => '3','created_at' => '2016-12-31 08:45:45','updated_at' => '2016-12-31 17:07:41'],
			  ['check_in' => '2016-12-31 10:56:55','check_out' => '2016-12-31 23:20:02','check_time' => '743','user_id' => '3','created_at' => '2016-12-31 08:56:55','updated_at' => '2017-01-01 15:32:25'],
			  ['check_in' => '2016-12-31 09:20:40','check_out' => '2016-12-31 09:27:32','check_time' => '480','user_id' => '4','created_at' => '2016-12-31 09:20:40','updated_at' => '2016-12-31 09:27:32'],
			  ['check_in' => '2016-12-31 09:33:31','check_out' => '2016-12-31 09:39:10','check_time' => '500','user_id' => '4','created_at' => '2016-12-31 09:33:31','updated_at' => '2016-12-31 09:39:10'],
			  ['check_in' => '2016-12-31 02:43:36','check_out' => '2016-12-31 10:45:59','check_time' => '878','user_id' => '2','created_at' => '2016-12-31 09:43:36','updated_at' => '2016-12-31 17:22:27'],
			  ['check_in' => '2016-12-31 17:49:59','check_out' => '2017-01-02 21:27:53','check_time' => '3097','user_id' => '2','created_at' => '2016-12-31 17:49:59','updated_at' => '2017-01-01 15:29:51'],
			  ['check_in' => '2016-10-01 10:12:07','check_out' => '2016-10-01 22:32:32','check_time' => '740','user_id' => '4','created_at' => '2016-12-31 18:12:07','updated_at' => '2016-12-31 21:37:17'],
			  ['check_in' => '2017-01-01 05:18:18','check_out' => '2017-01-01 05:21:01','check_time' => '2','user_id' => '1','created_at' => '2017-01-01 05:18:18','updated_at' => '2017-01-01 05:21:01'],
			  ['check_in' => '2017-01-01 13:57:56','check_out' => '2017-01-01 21:32:40','check_time' => '454','user_id' => '1','created_at' => '2017-01-01 13:57:56','updated_at' => '2017-01-01 15:32:42'],
			  ['check_in' => '2017-01-01 19:12:02','check_out' => '2017-01-01 19:12:07','check_time' => '0','user_id' => '1','created_at' => '2017-01-01 19:12:02','updated_at' => '2017-01-01 19:12:07']

                ]);
    }
}
