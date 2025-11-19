<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationCmsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('translation_cms')->insert([
            [
                'label' => 'home',
                'label_d' => 'Home',
                'name_en' => 'Home',
                'name_ar' => 'بيت',
            ],
            [
                'label' => 'dashboard',
                'label_d' => 'My Dashboard',
                'name_en' => 'My Dashboard',
                'name_ar' => 'لوحة التحكم',
            ],
            [
                'label' => 'control_panel',
                'label_d' => 'Control Panel',
                'name_en' => 'Control Panel',
                'name_ar' => 'لوحة التحكم',
            ],
            [
                'label' => 'users',
                'label_d' => 'Users',
                'name_en' => 'Users',
                'name_ar' => 'المستخدمون',
            ],
            [
                'label' => 'clients',
                'label_d' => 'Clients',
                'name_en' => 'Clients',
                'name_ar' => 'العملاء',
            ],
            [
                'label' => 'cms',
                'label_d' => 'CMS',
                'name_en' => 'CMS',
                'name_ar' => 'إدارة المحتوى',
            ],
            [
                'label' => 'translation_cms',
                'label_d' => 'Translation CMS',
                'name_en' => 'Translation CMS',
                'name_ar' => 'ترجمة CMS',
            ],
            [
                'label' => 'user_list',
                'label_d' => 'User List',
                'name_en' => 'User List',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'add_new_user',
                'label_d' => 'Add New User',
                'name_en' => 'Add New User',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'edit_user',
                'label_d' => 'Edit User',
                'name_en' => 'Edit User',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'view_user',
                'label_d' => 'View User',
                'name_en' => 'View User',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'user_name',
                'label_d' => 'User Name',
                'name_en' => 'User Name',
                'name_ar' => 'اسم المستخدم',
            ],
            [
                'label' => 'roles',
                'label_d' => 'Roles',
                'name_en' => 'Roles',
                'name_ar' => 'الأدوار',
            ],
            [
                'label' => 'action',
                'label_d' => 'Action',
                'name_en' => 'Action',
                'name_ar' => 'إجراء',
            ],
            [
                'label' => 'name',
                'label_d' => 'Name',
                'name_en' => 'Name',
                'name_ar' => 'الاسم الكامل',
            ],
            [
                'label' => 'full_name',
                'label_d' => 'Full Name',
                'name_en' => 'Full Name',
                'name_ar' => 'الاسم الكامل',
            ],
            [
                'label' => 'email_address',
                'label_d' => 'Email Address',
                'name_en' => 'Email Address',
                'name_ar' => 'البريد الإلكتروني',
            ],
            [
                'label' => 'valuation_membership_number',
                'label_d' => 'Valuation Membership Number',
                'name_en' => 'Valuation Membership Number',
                'name_ar' => 'رقم عضوية التقييم',
            ],
            [
                'label' => 'valuation_type',
                'label_d' => 'Valuation Type',
                'name_en' => 'Valuation Type',
                'name_ar' => 'نوع التقييم',
            ],
            [
                'label' => 'signature_picture',
                'label_d' => 'Signature Picture',
                'name_en' => 'Signature Picture',
                'name_ar' => 'صورة التوقيع',
            ],
            [
                'label' => 'password',
                'label_d' => 'Password',
                'name_en' => 'Password',
                'name_ar' => 'كلمة المرور',
            ],
            [
                'label' => 'confirm_password',
                'label_d' => 'Confirm Password',
                'name_en' => 'Confirm Password',
                'name_ar' => 'تأكيد كلمة المرور',
            ],
            [
                'label' => 'profile_image',
                'label_d' => 'Profile Image',
                'name_en' => 'Profile Image',
                'name_ar' => 'صورة الملف الشخصي',
            ],
            [
                'label' => 'clients_list',
                'label_d' => 'Clients List',
                'name_en' => 'Clients List',
                'name_ar' => 'قائمة العملاء',
            ],
            [
                'label' => 'add_new_client',
                'label_d' => 'Add New Client',
                'name_en' => 'Add New Client',
                'name_ar' => 'إضافة عميل جديد',
            ],
            [
                'label' => 'edit_client',
                'label_d' => 'Edit Client',
                'name_en' => 'Edit Client',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'view_client',
                'label_d' => 'View Client',
                'name_en' => 'View Client',
                'name_ar' => 'ترجمة',
            ],
            [
                'label' => 'choose_client_type',
                'label_d' => 'Choose Client Type',
                'name_en' => 'Choose Client Type',
                'name_ar' => 'اختر نوع العميل',
            ],
            [
                'label' => 'individual',
                'label_d' => 'Individuals',
                'name_en' => 'Individuals',
                'name_ar' => 'أفراد',
            ],
            [
                'label' => 'business',
                'label_d' => 'Business',
                'name_en' => 'Business',
                'name_ar' => 'شركات',
            ],
            [
                'label' => 'clients_name',
                'label_d' => 'Clients Name',
                'name_en' => 'Clients Name',
                'name_ar' => 'اسم العميل',
            ],
            [
                'label' => 'type',
                'label_d' => 'Type',
                'name_en' => 'Type',
                'name_ar' => 'النوع',
            ],
            [
                'label' => 'mobile',
                'label_d' => 'Mobile',
                'name_en' => 'Mobile',
                'name_ar' => 'رقم الجوال',
            ],
            [
                'label' => 'national_id',
                'label_d' => 'National ID',
                'name_en' => 'National ID',
                'name_ar' => 'الرقم الوطني',
            ],
            [
                'label' => 'mobile_number',
                'label_d' => 'Mobile Number',
                'name_en' => 'Mobile Number',
                'name_ar' => 'رقم الجوال',
            ],
            [
                'label' => 'address',
                'label_d' => 'Address',
                'name_en' => 'Address',
                'name_ar' => 'العنوان',
            ],
            [
                'label' => 'client_email_address',
                'label_d' => 'Client Email Address',
                'name_en' => 'Client Email Address',
                'name_ar' => 'البريد الإلكتروني للعميل',
            ],
            [
                'label' => 'documents_delegations',
                'label_d' => 'Documents Delegations',
                'name_en' => 'Documents Delegations',
                'name_ar' => 'تفويض المستندات',
            ],
            [
                'label' => 'company_name',
                'label_d' => 'Company Name',
                'name_en' => 'Company Name',
                'name_ar' => 'اسم الشركة',
            ],
            [
                'label' => 'unified_number',
                'label_d' => 'Unified Number',
                'name_en' => 'Unified Number',
                'name_ar' => 'الرقم الموحّد',
            ],
            [
                'label' => 'vat_number',
                'label_d' => 'VAT Number',
                'name_en' => 'VAT Number',
                'name_ar' => 'الرقم الضريبي',
            ],
            [
                'label' => 'ceo_name',
                'label_d' => 'CEO Name',
                'name_en' => 'CEO Name',
                'name_ar' => 'اسم المدير التنفيذي',
            ],
            [
                'label' => 'ceo_email_address',
                'label_d' => 'CEO Email Address',
                'name_en' => 'CEO Email Address',
                'name_ar' => 'البريد الإلكتروني للمدير التنفيذي',
            ],
            [
                'label' => 'representative_name',
                'label_d' => 'Representative Name',
                'name_en' => 'Representative Name',
                'name_ar' => 'اسم الممثل',
            ],
            [
                'label' => 'representative_mobile_number',
                'label_d' => 'Representative Mobile Number',
                'name_en' => 'Representative Mobile Number',
                'name_ar' => 'رقم جوال الممثل',
            ],
            [
                'label' => 'representative_email_address',
                'label_d' => 'Representative Email Address',
                'name_en' => 'Representative Email Address',
                'name_ar' => 'البريد الإلكتروني للممثل',
            ],
            [
                'label' => 'accountant_name',
                'label_d' => 'Accountant Name',
                'name_en' => 'Accountant Name',
                'name_ar' => 'اسم المحاسب',
            ],
            [
                'label' => 'accountant_mobile_number',
                'label_d' => 'Accountant Mobile Number',
                'name_en' => 'Accountant Mobile Number',
                'name_ar' => 'رقم جوال المحاسب',
            ],
            [
                'label' => 'accountant_email_address',
                'label_d' => 'Accountant Email Address',
                'name_en' => 'Accountant Email Address',
                'name_ar' => 'البريد الإلكتروني للمحاسب',
            ],
            [
                'label' => 'documents',
                'label_d' => 'Documents',
                'name_en' => 'Documents',
                'name_ar' => 'الوثائق',
            ],
            [
                'label' => 'company_logo',
                'label_d' => 'Company Logo',
                'name_en' => 'Company Logo',
                'name_ar' => 'شعار الشركة',
            ],
            [
                'label' => 'save',
                'label_d' => 'Save',
                'name_en' => 'Save',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'update',
                'label_d' => 'Update',
                'name_en' => 'Update',
                'name_ar' => 'إلغاء',
            ],
            [
                'label' => 'cancel',
                'label_d' => 'Cancel',
                'name_en' => 'Cancel',
                'name_ar' => 'إلغاء',
            ],
            [
                'label' => 'delete',
                'label_d' => 'Delete',
                'name_en' => 'Delete',
                'name_ar' => 'إجراء',
            ],
            [
                'label' => 'download',
                'label_d' => 'Download',
                'name_en' => 'Download',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'preview',
                'label_d' => 'Preview',
                'name_en' => 'Preview',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'view',
                'label_d' => 'View',
                'name_en' => 'View',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'edit',
                'label_d' => 'Edit',
                'name_en' => 'Edit',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'previous',
                'label_d' => 'Previous',
                'name_en' => 'Previous',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'next',
                'label_d' => 'Next',
                'name_en' => 'Next',
                'name_ar' => 'حفظ',
            ],
            [
                'label' => 'logout',
                'label_d' => 'Logout',
                'name_en' => 'Logout',
                'name_ar' => 'حفظ',
            ],
        ]);
    }
}
