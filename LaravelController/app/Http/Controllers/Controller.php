<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function getUsers(){
        $users = [
            [
                'id' => 1,
                'name' => 'Amit Sharma',
                'email' => 'amit.sharma@example.com',
                'phone' => '+919876543210',
                'role' => 'Admin',
                'status' => 'active',
                'profile' => [
                    'avatar' => null,
                    'gender' => 'male',
                    'dob' => '1992-05-14',
                ],
                'address' => [
                    'city' => 'Ahmedabad',
                    'state' => 'Gujarat',
                    'country' => 'India',
                    'pincode' => null,
                ],
                'permissions' => ['users.view', 'users.create', 'settings.update'],
                'last_login_at' => '2025-02-01 10:30:00',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Neha Patel',
                'email' => 'neha.patel@example.com',
                'phone' => null,
                'role' => 'User',
                'status' => 'inactive',
                'profile' => [
                    'avatar' => 'neha.jpg',
                    'gender' => 'female',
                    'dob' => null,
                ],
                'address' => null,
                'permissions' => [],
                'last_login_at' => null,
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Rahul Verma',
                'email' => 'rahul.verma@example.com',
                'phone' => '+918765432109',
                'role' => 'Manager',
                'status' => 'active',
                'profile' => null,
                'address' => [
                    'city' => 'Mumbai',
                    'state' => 'Maharashtra',
                    'country' => 'India',
                    'pincode' => '400001',
                ],
                'permissions' => ['reports.view'],
                'last_login_at' => '2025-02-03 18:45:12',
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'phone' => '+14155552671',
                'role' => 'User',
                'status' => 'blocked',
                'profile' => [
                    'avatar' => null,
                    'gender' => null,
                    'dob' => null,
                ],
                'address' => [
                    'city' => null,
                    'state' => null,
                    'country' => 'USA',
                    'pincode' => null,
                ],
                'permissions' => null,
                'last_login_at' => '2025-02-04 09:12:00',
                'deleted_at' => '2025-02-05 11:00:00',
            ],
            [
                'id' => 5,
                'name' => 'Daniel Lee',
                'email' => 'daniel.lee@example.com',
                'phone' => '+821012345678',
                'role' => 'Support',
                'status' => 'active',
                'profile' => [
                    'avatar' => 'daniel.png',
                    'gender' => 'male',
                    'dob' => '1990-11-21',
                ],
                'address' => [
                    'city' => 'Seoul',
                    'state' => null,
                    'country' => 'South Korea',
                    'pincode' => null,
                ],
                'permissions' => ['tickets.view', 'tickets.reply'],
                'last_login_at' => '2025-02-05 14:20:00',
                'deleted_at' => null,
            ],
        ];
        session(['users' =>  $users]);
        return $users;
    }
}
