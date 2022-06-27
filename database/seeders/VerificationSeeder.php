<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Verification;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $data = [
            ['slug' => 'NIP', 'name'=>'Nigeria International Passport', 'report_type'=>'passport','fee'=>1000], 
            ['slug' => 'PVC', 'name'=>'Permanent Voters Card', 'report_type'=>'pvc','fee'=>250], 
            ['slug' => 'BVN', 'name'=>'Bank Verification Number', 'report_type'=>'bvn','fee'=>500], 
            ['slug' => 'NIN', 'name'=>'National Identity Number', 'report_type'=>'nin','fee'=>900], 
            ['slug' => 'NDL', 'name'=>'Nigerian Driver\'s License', 'report_type'=>'drivers-license','fee'=>200], 
            ['slug' => 'TIN', 'name'=>'Tax Identification Number', 'report_type'=>'tin','fee'=>200],
            ['slug' => 'CAC', 'name'=>'Company Search (CAC)', 'report_type'=>'business','fee'=>200],
            ['slug' => 'individual_address', 'name'=>'Individual Address Verification', 'report_type'=>'address','fee'=>1000], 
            ['slug' => 'reference_address', 'name'=>'Reference Address Verification', 'report_type'=>'address','fee'=>1000], 
            ['slug' => 'business_address', 'name'=>'Business Address Verification', 'report_type'=>'address','fee'=>1000],  
        ];

    foreach($data as $datum){
        Verification::create($datum);
    }
    }

}
