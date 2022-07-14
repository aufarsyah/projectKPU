<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Privilege;
use App\Models\Group;
use App\Models\TranPrivilegeGroup;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserting group superadmin
        $data_group_superadmin = Group::create(
        [
            "name" => 'Superadmin',
            "description" => 'Group user for superadmin'
        ]);   

        $data_group_superadmin->save();
        $group_superadmin_id = $data_group_superadmin->id;

        //inserting group requester
        $data_group_viewer = Group::create(
        [
            "name" => 'Viewer',
            "description" => 'Group user for requester'
        ]);   

        $data_group_viewer->save();
        $group_viewer_id = $data_group_viewer->id;


        //inserting user admin
        $data_admin = User::create(
        [
            "username"          => 'administrator',
            "employee_number"   => '01010101',
            "first_name"        => 'super',
            "last_name"         => 'admin',
            "email"             => 'admin@admin.com',
            "phone"             => '08123456789',
            "birth_of_date"     => '2021/07/30',
            "address"           => 'Indonesia',
            "password"          => Hash::make("admin123"),
            "group_id"          => $group_superadmin_id
        ]);

        $data_admin->save();


        //inserting user viewer
        $data_viewer = User::create(
        [
            "username"          => 'viewer',
            "employee_number"   => '02020202',
            "first_name"        => 'user',
            "last_name"         => 'viewer',
            "email"             => 'view@view.com',
            "phone"             => '08987654321',
            "birth_of_date"     => '2021/08/30',
            "address"           => 'Indonesia',
            "password"          => Hash::make("view123"),
            "group_id"          => $group_viewer_id
        ]);

        $data_viewer->save();

        //USER SETUP
        //inserting privilege - user_setup - CREATE
        $data_privilege = Privilege::create(
        [
            "name" => 'user_setup',
            "label" => 'User Setup',
            "type" => 'Create',
            "description" => 'User setup menu - create'
        ]);

        $data_privilege->save();
        $privilege_id_user_setup_create = $data_privilege->id;  

        //inserting privilege - user_setup - READ
        $data_privilege = Privilege::create(
        [
            "name" => 'user_setup',
            "label" => 'User Setup',
            "type" => 'Read',
            "description" => 'User setup menu - read'
        ]);

        $data_privilege->save();
        $privilege_id_user_setup_read = $data_privilege->id;  

        //inserting privilege - user_setup - UPDATE
        $data_privilege = Privilege::create(
        [
            "name" => 'user_setup',
            "label" => 'User Setup',
            "type" => 'Update',
            "description" => 'User setup menu - update'
        ]);

        $data_privilege->save();
        $privilege_id_user_setup_update = $data_privilege->id;  

        //inserting privilege - user_setup - DELETE
        $data_privilege = Privilege::create(
        [
            "name" => 'user_setup',
            "label" => 'User Setup',
            "type" => 'Delete',
            "description" => 'User setup menu - delete'
        ]);

        $data_privilege->save();
        $privilege_id_user_setup_delete = $data_privilege->id;  


        //GROUP SETUP
        //inserting privilege - group_setup - CREATE
        $data_privilege = Privilege::create(
        [
            "name" => 'group_setup',
            "label" => 'Group Setup',
            "type" => 'Create',
            "description" => 'Group setup menu - create'
        ]);

        $data_privilege->save();
        $privilege_id_group_setup_create = $data_privilege->id;  

        //inserting privilege - group_setup - READ
        $data_privilege = Privilege::create(
        [
            "name" => 'group_setup',
            "label" => 'Group Setup',
            "type" => 'Read',
            "description" => 'Group setup menu - read'
        ]);

        $data_privilege->save();
        $privilege_id_group_setup_read = $data_privilege->id;  

        //inserting privilege - group_setup - UPDATE
        $data_privilege = Privilege::create(
        [
            "name" => 'group_setup',
            "label" => 'Group Setup',
            "type" => 'Update',
            "description" => 'Group setup menu - update'
        ]);

        $data_privilege->save();
        $privilege_id_group_setup_update = $data_privilege->id;  

        //inserting privilege - group_setup - DELETE
        $data_privilege = Privilege::create(
        [
            "name" => 'group_setup',
            "label" => 'Group Setup',
            "type" => 'Delete',
            "description" => 'Group setup menu - delete'
        ]);

        $data_privilege->save();
        $privilege_id_group_setup_delete = $data_privilege->id; 



        //inserting tran privilege group
        TranPrivilegeGroup::insert([
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_user_setup_create
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_user_setup_read
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_user_setup_update
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_user_setup_delete
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_group_setup_create
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_group_setup_read
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_group_setup_update
            ],
            [
                "group_id" => $group_superadmin_id,
                "privilege_id" => $privilege_id_group_setup_delete
            ]
        ]);


    }
}
