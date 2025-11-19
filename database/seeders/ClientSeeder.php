<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        // Example Individual Clients
        Client::create([
            'client_type' => 'individual',
            'individual_name' => 'John Doe',
            'national_id' => 'IND123456',
            'mobile_number' => '9876543210',
            'individual_email' => 'john@example.com',
            'address' => '123 Green Street, Mumbai',
            'individual_documents' => 'docs/john_id.pdf',
        ]);

        Client::create([
            'client_type' => 'individual',
            'individual_name' => 'Aisha Khan',
            'national_id' => 'IND654321',
            'mobile_number' => '9988776655',
            'individual_email' => 'aisha@example.com',
            'address' => '45 Sea View Road, Chennai',
            'individual_documents' => 'docs/aisha_id.pdf',
        ]);

        // Example Business Clients
        Client::create([
            'client_type' => 'business',
            'company_name' => 'TechNova Pvt Ltd',
            'unified_number' => 'BUS1001',
            'vat_number' => 'VAT998877',
            'address_business' => '201 IT Park, Bengaluru',
            'ceo_name' => 'Rajesh Kumar',
            'ceo_email' => 'rajesh@technova.com',
            'representative_name' => 'Sneha Patel',
            'representative_mobile' => '9123456789',
            'representative_email' => 'sneha@technova.com',
            'accountant_name' => 'Arun Mehta',
            'accountant_mobile' => '9456123789',
            'accountant_email' => 'arun@technova.com',
            'documents' => 'docs/technova_docs.pdf',
            'company_logo' => 'logos/technova_logo.png',
        ]);

        Client::create([
            'client_type' => 'business',
            'company_name' => 'Golden Traders Co.',
            'unified_number' => 'BUS2002',
            'vat_number' => 'VAT445566',
            'address_business' => '78 Market Plaza, Delhi',
            'ceo_name' => 'Fatima Noor',
            'ceo_email' => 'fatima@goldentraders.com',
            'representative_name' => 'Imran Malik',
            'representative_mobile' => '9765432109',
            'representative_email' => 'imran@goldentraders.com',
            'accountant_name' => 'Vikram Singh',
            'accountant_mobile' => '9845123456',
            'accountant_email' => 'vikram@goldentraders.com',
            'documents' => 'docs/goldentraders_docs.pdf',
            'company_logo' => 'logos/goldentraders_logo.png',
        ]);
    }
}
