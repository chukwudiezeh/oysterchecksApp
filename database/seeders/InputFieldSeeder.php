<?php

namespace Database\Seeders;
use App\Models\FieldInput;
use Illuminate\Database\Seeder;

class InputFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input_fields = [
            ['slug' => 'NIN', 'name'=>'reference', 'placeholder'=>'Enter NIN number', 'type'=>'text', 'is_required'=>'1', 'label'=>'NIN Number', 'inputid'=>'reference'], 
            ['slug' => 'NIP', 'name'=>'reference', 'placeholder'=>'Enter NIP number', 'type'=>'text', 'is_required'=>'1', 'label'=>'NIP Number', 'inputid'=>'reference'], 
            ['slug' => 'PVC', 'name'=>'reference', 'placeholder'=>'Enter PVC number', 'type'=>'text', 'is_required'=>'1', 'label'=>'PVC Number', 'inputid'=>'reference'], 
            ['slug' => 'BVN', 'name'=>'reference', 'placeholder'=>'Enter BVN number', 'type'=>'text', 'is_required'=>'1', 'label'=>'BVN Number', 'inputid'=>'reference'], 
            ['slug' => 'NIN', 'name'=>'first_name', 'placeholder'=>'Enter First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'NIP', 'name'=>'first_name', 'placeholder'=>'Enter First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'PVC', 'name'=>'first_name', 'placeholder'=>'Enter First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'BVN', 'name'=>'first_name', 'placeholder'=>'Enter First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'NIN', 'name'=>'last_name', 'placeholder'=>'Enter Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            ['slug' => 'NIP', 'name'=>'last_name', 'placeholder'=>'Enter Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            ['slug' => 'PVC', 'name'=>'last_name', 'placeholder'=>'Enter Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            ['slug' => 'BVN', 'name'=>'last_name', 'placeholder'=>'Enter Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            ['slug' => 'NDL', 'name'=>'reference', 'placeholder'=>'Enter NDL number', 'type'=>'text', 'is_required'=>'1', 'label'=>'NDL number', 'inputid'=>'reference'], 
            ['slug' => 'NDL', 'name'=>'first_name', 'placeholder'=>'Enter First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'NDL', 'name'=>'last_name', 'placeholder'=>'Enter Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            
            ['slug' => 'TIN', 'name'=>'reference', 'placeholder'=>'Enter Reference', 'type'=>'text', 'is_required'=>'1', 'label'=>'TIN Number', 'inputid'=>'reference'], 
            ['slug' => 'CAC', 'name'=>'company_name', 'placeholder'=>'Enter Company Full Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Registered Company Name', 'inputid'=>'company_name'], 
            ['slug' => 'Bank_account', 'name'=>'account_number', 'placeholder'=>'Enter Account Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'Account Number', 'inputid'=>'account_number'], 
            ['slug' => 'candidate', 'name'=>'first_name', 'placeholder'=>'Enter Candidate\'s First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'candidate', 'name'=>'middle_name', 'placeholder'=>'Enter Candidate\'s Middle Name', 'type'=>'text', 'is_required'=>'0', 'label'=>'Middle Name', 'inputid'=>'middle_name'],
            ['slug' => 'candidate', 'name'=>'last_name', 'placeholder'=>'Enter Candidate\'s Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'], 
            ['slug' => 'candidate', 'name'=>'phone', 'placeholder'=>'Enter Candidate\'s Phone', 'type'=>'text', 'is_required'=>'1', 'label'=>'Phone', 'inputid'=>'phone'], 
            ['slug' => 'candidate', 'name'=>'dob', 'placeholder'=>'Enter Candidate\'s Date of Birth e.g. 1900/03/31', 'type'=>'text', 'is_required'=>'0', 'label'=>'Date of Birth', 'inputid'=>'dob'], 
            ['slug' => 'candidate', 'name'=>'email', 'placeholder'=>'Enter Candidate\'s Email', 'type'=>'email', 'is_required'=>'0', 'label'=>'Email', 'inputid'=>'email'],  
            ['slug' => 'candidate', 'name'=>'image', 'placeholder'=>'Upload Candidate\'s Picture', 'type'=>'file', 'is_required'=>'1', 'label'=>'Image', 'inputid'=>'image'],
            
            ['slug' => 'individual_address', 'name'=>'house_number', 'placeholder'=>'Enter House Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'House Number', 'inputid'=>'house_number'], 
            ['slug' => 'individual_address', 'name'=>'street', 'placeholder'=>'Enter Street', 'type'=>'text', 'is_required'=>'1', 'label'=>'Street', 'inputid'=>'street'],  
            ['slug' => 'individual_address', 'name'=>'city', 'placeholder'=>'Enter City', 'type'=>'text', 'is_required'=>'1', 'label'=>'City', 'inputid'=>'city'],
            ['slug' => 'individual_address', 'name'=>'state', 'placeholder'=>'Enter State', 'type'=>'text', 'is_required'=>'1', 'label'=>'State', 'inputid'=>'state'],  
            ['slug' => 'individual_address', 'name'=>'landmark', 'placeholder'=>'Enter nearest bustop', 'type'=>'text', 'is_required'=>'1', 'label'=>'Landmark', 'inputid'=>'landmark'],
            ['slug' => 'individual_address', 'name'=>'country', 'placeholder'=>'Enter Country', 'type'=>'text', 'is_required'=>'1', 'label'=>'Country', 'inputid'=>'country'],
    
            ['slug' => 'reference_address', 'name'=>'first_name', 'placeholder'=>'Enter Guarantor First Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'First Name', 'inputid'=>'first_name'], 
            ['slug' => 'reference_address', 'name'=>'last_name', 'placeholder'=>'Enter Guarantor Last Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Last Name', 'inputid'=>'last_name'],  
            ['slug' => 'reference_address', 'name'=>'phone', 'placeholder'=>'Enter Guarantor Phone Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'Phone', 'inputid'=>'phone'],
            ['slug' => 'reference_address', 'name'=>'email', 'placeholder'=>'Enter Guarantor Email', 'type'=>'text', 'is_required'=>'1', 'label'=>'Email', 'inputid'=>'email'],  
            ['slug' => 'reference_address', 'name'=>'house_number', 'placeholder'=>'Enter House Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'House Number', 'inputid'=>'house_number'], 
            ['slug' => 'reference_address', 'name'=>'street', 'placeholder'=>'Enter Street', 'type'=>'text', 'is_required'=>'1', 'label'=>'Street', 'inputid'=>'street'],  
            ['slug' => 'reference_address', 'name'=>'city', 'placeholder'=>'Enter City', 'type'=>'text', 'is_required'=>'1', 'label'=>'City', 'inputid'=>'city'],
            ['slug' => 'reference_address', 'name'=>'state', 'placeholder'=>'Enter State', 'type'=>'text', 'is_required'=>'1', 'label'=>'State', 'inputid'=>'state'],  
            ['slug' => 'reference_address', 'name'=>'landmark', 'placeholder'=>'Enter nearest bustop', 'type'=>'text', 'is_required'=>'1', 'label'=>'Landmark', 'inputid'=>'landmark'],
            ['slug' => 'reference_address', 'name'=>'country', 'placeholder'=>'Enter Country', 'type'=>'text', 'is_required'=>'1', 'label'=>'Country', 'inputid'=>'country'],
    
    
            ['slug' => 'business_address', 'name'=>'name', 'placeholder'=>'Enter Contact Name', 'type'=>'text', 'is_required'=>'1', 'label'=>'Name', 'inputid'=>'name'], 
            ['slug' => 'business_address', 'name'=>'registration_number', 'placeholder'=>'Registration Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'Registration Number', 'inputid'=>'registration_number'],  
            ['slug' => 'business_address', 'name'=>'email', 'placeholder'=>'Enter Contact Email', 'type'=>'text', 'is_required'=>'1', 'label'=>'Email', 'inputid'=>'email'],
            ['slug' => 'business_address', 'name'=>'phone', 'placeholder'=>'Enter Contact Phone', 'type'=>'text', 'is_required'=>'1', 'label'=>'Phone', 'inputid'=>'phone'],  
            ['slug' => 'reference_address', 'name'=>'house_number', 'placeholder'=>'Enter House Number', 'type'=>'text', 'is_required'=>'1', 'label'=>'House Number', 'inputid'=>'house_number'], 
            ['slug' => 'reference_address', 'name'=>'street', 'placeholder'=>'Enter Street', 'type'=>'text', 'is_required'=>'1', 'label'=>'Street', 'inputid'=>'street'],  
            ['slug' => 'reference_address', 'name'=>'city', 'placeholder'=>'Enter City', 'type'=>'text', 'is_required'=>'1', 'label'=>'City', 'inputid'=>'city'],
            ['slug' => 'reference_address', 'name'=>'state', 'placeholder'=>'Enter State', 'type'=>'text', 'is_required'=>'1', 'label'=>'State', 'inputid'=>'state'],  
            ['slug' => 'reference_address', 'name'=>'landmark', 'placeholder'=>'Enter nearest bustop', 'type'=>'text', 'is_required'=>'1', 'label'=>'Landmark', 'inputid'=>'landmark'],
            ['slug' => 'reference_address', 'name'=>'country', 'placeholder'=>'Enter Country', 'type'=>'text', 'is_required'=>'1', 'label'=>'Country', 'inputid'=>'country'],
    
       ];
        foreach($input_fields as $input_field){
            FieldInput::create($input_field);
        }
    }

}
