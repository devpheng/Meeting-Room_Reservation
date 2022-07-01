<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        $departments = [
            "Banking Bussiness Department",
            "BPR Center",
            "Financial & Accounting Department",
            "Information Security Department",
            "Compliance Department",
            "Audit Department",
            "General Affair Department",
            "Loan Business Department",
            "Loan Assessment Department",
            "Loan Collection Department",
            "Risk Management Department",
            "Treasury and Trade Banking Department",
            "HR(D) Department",
            "ICT Development Department",
            "Card Bussiness Department",
            "Contact Center",
            "Digital Business Department",
            "HQ Bussiness Department",
            "AML Department",
            "Channel Development Department",
            "Car Loan Center",
            "Commercial Business Banking Center",
            "Strategic Planning Department",
        ];
        foreach($departments as $key => $department){
            $newDepartment = new Department();
            $newDepartment->name = $department;
            $newDepartment->save();
        }
    }
}
