<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 19,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 20,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 21,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 22,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 23,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 24,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 25,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 26,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 27,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 28,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 30,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 31,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 32,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 33,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 34,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 35,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 36,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 37,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 38,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 39,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 41,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 42,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 43,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 44,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 45,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 46,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 47,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 48,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 49,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 50,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 51,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 52,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 53,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 54,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 55,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 56,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 57,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 58,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 59,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 60,
                'title' => 'team_create',
            ],
            [
                'id'    => 61,
                'title' => 'team_edit',
            ],
            [
                'id'    => 62,
                'title' => 'team_show',
            ],
            [
                'id'    => 63,
                'title' => 'team_delete',
            ],
            [
                'id'    => 64,
                'title' => 'team_access',
            ],
            [
                'id'    => 65,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 66,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 67,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 68,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 69,
                'title' => 'project_access',
            ],
            [
                'id'    => 70,
                'title' => 'contractor_create',
            ],
            [
                'id'    => 71,
                'title' => 'contractor_edit',
            ],
            [
                'id'    => 72,
                'title' => 'contractor_show',
            ],
            [
                'id'    => 73,
                'title' => 'contractor_delete',
            ],
            [
                'id'    => 74,
                'title' => 'contractor_access',
            ],
            [
                'id'    => 75,
                'title' => 'id_tag_create',
            ],
            [
                'id'    => 76,
                'title' => 'id_tag_edit',
            ],
            [
                'id'    => 77,
                'title' => 'id_tag_show',
            ],
            [
                'id'    => 78,
                'title' => 'id_tag_delete',
            ],
            [
                'id'    => 79,
                'title' => 'id_tag_access',
            ],
            [
                'id'    => 80,
                'title' => 'icra_create',
            ],
            [
                'id'    => 81,
                'title' => 'icra_edit',
            ],
            [
                'id'    => 82,
                'title' => 'icra_show',
            ],
            [
                'id'    => 83,
                'title' => 'icra_delete',
            ],
            [
                'id'    => 84,
                'title' => 'icra_access',
            ],
            [
                'id'    => 85,
                'title' => 'drawing_request_create',
            ],
            [
                'id'    => 86,
                'title' => 'drawing_request_edit',
            ],
            [
                'id'    => 87,
                'title' => 'drawing_request_show',
            ],
            [
                'id'    => 88,
                'title' => 'drawing_request_delete',
            ],
            [
                'id'    => 89,
                'title' => 'drawing_request_access',
            ],
            [
                'id'    => 90,
                'title' => 'information_request_create',
            ],
            [
                'id'    => 91,
                'title' => 'information_request_edit',
            ],
            [
                'id'    => 92,
                'title' => 'information_request_show',
            ],
            [
                'id'    => 93,
                'title' => 'information_request_delete',
            ],
            [
                'id'    => 94,
                'title' => 'information_request_access',
            ],
            [
                'id'    => 95,
                'title' => 'commissioning_create',
            ],
            [
                'id'    => 96,
                'title' => 'commissioning_edit',
            ],
            [
                'id'    => 97,
                'title' => 'commissioning_show',
            ],
            [
                'id'    => 98,
                'title' => 'commissioning_delete',
            ],
            [
                'id'    => 99,
                'title' => 'commissioning_access',
            ],
            [
                'id'    => 100,
                'title' => 'approval_create',
            ],
            [
                'id'    => 101,
                'title' => 'approval_edit',
            ],
            [
                'id'    => 102,
                'title' => 'approval_show',
            ],
            [
                'id'    => 103,
                'title' => 'approval_delete',
            ],
            [
                'id'    => 104,
                'title' => 'approval_access',
            ],
            [
                'id'    => 105,
                'title' => 'permitadmin_create',
            ],
            [
                'id'    => 106,
                'title' => 'permitadmin_edit',
            ],
            [
                'id'    => 107,
                'title' => 'permitadmin_show',
            ],
            [
                'id'    => 108,
                'title' => 'permitadmin_delete',
            ],
            [
                'id'    => 109,
                'title' => 'permitadmin_access',
            ],
            [
                'id'    => 110,
                'title' => 'icra_approval_create',
            ],
            [
                'id'    => 111,
                'title' => 'icra_approval_edit',
            ],
            [
                'id'    => 112,
                'title' => 'icra_approval_show',
            ],
            [
                'id'    => 113,
                'title' => 'icra_approval_delete',
            ],
            [
                'id'    => 114,
                'title' => 'icra_approval_access',
            ],
            [
                'id'    => 115,
                'title' => 'site_id_create',
            ],
            [
                'id'    => 116,
                'title' => 'site_id_edit',
            ],
            [
                'id'    => 117,
                'title' => 'site_id_show',
            ],
            [
                'id'    => 118,
                'title' => 'site_id_delete',
            ],
            [
                'id'    => 119,
                'title' => 'site_id_access',
            ],
            [
                'id'    => 120,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
