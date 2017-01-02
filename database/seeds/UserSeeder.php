<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::insert([

        	  ['name' => 'lincoln mahmud','email' => 'lincoln@gmail.com','role' => 'user','password' => '$2y$10$fSmsvRIc18UHH5M5BPDZuen8aUa0/d2nHX5W2UM19qkpGIHMsMywe','remember_token' => 'MJbrn8mLyNkYl96g2rfHs2BIawXL1zZaM2qipMcg4nMjMgqCOMTV9tOJmYMZ','created_at' => '2016-12-30 21:04:46','updated_at' => '2017-01-01 19:24:30'],
			  ['name' => 'tajul islam','email' => 'lincolndu@gmail.com','role' => 'user','password' => '$2y$10$mnT5r0j7hTqiHFtvjz6K1uqhBKI8E1Ew4VCMpKlrUMIrdbDuCE.ce','remember_token' => 'gOdtJeNURvvPLyVNFoksgtWSnv0wdw6WHg98RLHwdA0vxvqgleHj8qv0tfgU','created_at' => '2016-12-30 21:17:32','updated_at' => '2016-12-30 21:17:45'],
			  ['name' => 'Dream','email' => 'dream@gmail.com','role' => 'user','password' => '$2y$10$O2pINbR8AXRI0CH2X57wRePKfEr.SAgjaFc30Tm0B1UEyXBK8bhtS','remember_token' => 'EcrzzD35g1Cy1izsgXzKilroi9O1cxGPNPF8788esvOQxkG2lrSDdQhLXpeU','created_at' => '2016-12-31 06:25:46','updated_at' => '2017-01-01 19:25:13'],
			  ['name' => 'admin','email' => 'admin@gmail.com','role' => 'admin','password' => '$2y$10$1mIgsjYApyRTn84FgUXIqetyhnpEgVNREKwcRgNsJBLO458NffynK','remember_token' => 'BlQOreUid6QRiwqfmt1sH2jeoeZBBhpgdhnRnZASDDeVtKGLFvr1DApwT0eI','created_at' => '2016-12-31 17:48:43','updated_at' => '2017-01-01 18:42:33']

                ]);
    }
}
