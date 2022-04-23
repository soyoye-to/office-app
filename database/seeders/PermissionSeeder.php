<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert($this->allPermissions());
    }
    private function allPermissions()
    {
        return $all_permission = array(
            ['id' => 1, 'permission_name' => 'Add new user', 'permission_description' => 'Adds new user to the user list'],
            ['id' => 2, 'permission_name' => 'Delete User', 'permission_description' => 'Permits the user to delete the history of a User'],
            ['id' => 3, 'permission_name' => 'Approve Requisition', 'permission_description' => 'Allows assigned to approve requisition and pass to the next Level of verification'],
            ['id' => 4, 'permission_name' => 'Last level Requisition Approval', 'permission_description' => 'Allows assigned to use finally approve requistions'],
            ['id' => 5, 'permission_name' => 'Edit staff details', 'permission_description' => 'Allows assigned to edit staff information'],
            ['id' => 6, 'permission_name' => 'Attendance', 'permission_description' => 'Allows users to mark attendance'],
            ['id' => 7, 'permission_name' => 'View attendance history', 'permission_description' => 'Allows assigned to view attendance history'],
            ['id' => 8, 'permission_name' => 'Create Requisition', 'permission_description' => 'Allows users to create Requisition'],
            ['id' => 9, 'permission_name' => 'Position Allocation', 'permission_description' => 'Allows users to allocate position to users'],
            ['id' => 10, 'permission_name' => 'Add Vendor', 'permission_description' => 'allows assigned to add vendors'],
            ['id' => 11, 'permission_name' => 'Edit Vendors', 'permission_description' => 'Allows assigned to edit Vendors information'],
            ['id' => 12, 'permission_name' => 'Requisition History', 'permission_description' => 'Allows users to view Requisition History'],
            ['id' => 13, 'permission_name' => 'View Issue History', 'permission_description' => 'View Issue Tracker  History'],
            ['id' => 14, 'permission_name' => 'HOD Requisition Approval', 'permission_description' => 'Approves Requisition at the Unit Level'],
            ['id' => 15, 'permission_name' => 'CTO Requisition Approval', 'permission_description' => 'Approves Requisition at the Departmental Level'],
            ['id' => 17, 'permission_name' => 'Manager Requisition Approval', 'permission_description' => 'Approves Requisition before final approval'],
            ['id' => 18, 'permission_name' => 'Roles and Permission', 'permission_description' => 'Allowed to access Roles and permissions'],
            ['id' => 19, 'permission_name' => 'Manage users', 'permission_description' => 'Allows users to Add/Delete Vendors and Staffs'],
            ['id' => 20, 'permission_name' => 'Manager', 'permission_description' => 'Allows users to use all the app features'],
            ['id' => 21, 'permission_name' => 'Staff', 'permission_description' => 'Allows users to use basic features of the App'],
            ['id' => 22, 'permission_name' => 'Super Admin', 'permission_description' => 'Allows users to use all the app features plus Final Requisition Approval'],
        );
    }
}
