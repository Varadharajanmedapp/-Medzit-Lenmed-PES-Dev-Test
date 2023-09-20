<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Location: https://github.com/yllumi/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Edited:   June 21st 2014 :D
*
* Deskripsi: File bahasa Inggris untuk pesan dan kesalahan Ion Auth
*
*/

// Account creation // Pembuatan akun
$lang['account_creation_successful'] 	  	 = 'Akun Berhasil Dibuat';
$lang['account_creation_unsuccessful'] 	 	 = 'Tidak Dapat Membuat Akun';
$lang['account_creation_duplicate_email'] 	 = 'Email Sudah Digunakan atau Tidak Valid';
$lang['account_creation_duplicate_username'] 	 = 'Username Sudah Digunakan atau Tidak Valid';
$lang['account_creation_missing_default_group'] = 'Grup default tidak disetel';
$lang['account_creation_invalid_default_group'] = 'Set nama grup default tidak valid';


// Password // kata sandi
$lang['password_change_successful'] 	 	 = 'Kata Sandi Berhasil Diubah';
$lang['password_change_unsuccessful'] 	  	 = 'Tidak Dapat Mengubah Kata Sandi';
$lang['forgot_password_successful'] 	 	 = 'Atur Ulang Kata Sandi Email Terkirim';
$lang['forgot_password_unsuccessful'] 	 	 = 'Tidak Dapat Mengatur Ulang Kata Sandi';

// Activation // Aktivasi
$lang['activate_successful'] 		  	 = 'Akun Diaktifkan';
$lang['activate_unsuccessful'] 		 	 = 'Tidak Dapat Mengaktifkan Akun';
$lang['deactivate_successful'] 		  	 = 'Akun Dinonaktifkan';
$lang['deactivate_unsuccessful'] 	  	 = 'Tidak Dapat Menonaktifkan Akun';
$lang['activation_email_successful'] 	  	 = 'Email Aktivasi Terkirim';
$lang['activation_email_unsuccessful']   	 = 'Tidak Dapat Mengirim Email Aktivasi';

// Login / Logout   // Masuk / Keluar
$lang['login_successful'] 		  	 = 'Login Berhasil';
$lang['login_unsuccessful'] 		  	 = 'Login Salah';
$lang['login_unsuccessful_not_active'] 		 =  'Akun tidak aktif';
$lang['login_timeout']                       = 'Terkunci Sementara. Coba lagi nanti.';
$lang['logout_successful'] 		 	 = 'Berhasil Keluar';

// Account Changes  //Perubahan Akun
$lang['update_successful'] 		 	 = 'Informasi Akun Berhasil Diperbarui';
$lang['update_unsuccessful'] 		 	 = 'Tidak Dapat Memperbaharui Informasi Akun';
$lang['delete_successful'] 		 	 = 'Pengguna Telah Dihapus';
$lang['delete_unsuccessful'] 		 	 = 'Tidak Dapat Menghapus Pengguna';

// Groups  // Grup
$lang['group_creation_successful']  = 'Grup Berhasil dibuat';
$lang['group_already_exists']       = 'Nama grup sudah digunakan';
$lang['group_update_successful']    = 'Detail grup diperbarui';
$lang['group_delete_successful']    = 'Grup dihapus';
$lang['group_delete_unsuccessful'] 	= 'Tidak dapat menghapus grup';
$lang['group_delete_notallowed']    = 'Tidak dapat menghapus grup administrator';
$lang['group_name_required'] 		= 'Nama grup harus diisi';
$lang['group_name_admin_not_alter'] = 'Nama grup admin tidak dapat diubah';

// Activation Email   // Email Aktivasi
$lang['email_activation_subject']            = 'Aktivasi Akun';
$lang['email_activate_heading']    = 'Aktifkan akun untuk %s';
$lang['email_activate_subheading'] = 'Silakan klik tautan ini ke %s.';
$lang['email_activate_link']       = 'Aktifkan Akun Anda';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Lupa Verifikasi Kata Sandi';
$lang['email_forgot_password_heading']    = 'Setel Ulang Kata Sandi untuk %s';
$lang['email_forgot_password_subheading'] = 'Silakan klik tautan ini ke %s.';
$lang['email_forgot_password_link']       = 'Setel Ulang Kata Sandi Anda';
// New Password Email
$lang['email_new_password_subject']          = 'Kata Sandi Baru';
$lang['email_new_password_heading']    = 'Kata Sandi Baru untuk %s';
$lang['email_new_password_subheading'] = 'Kata sandi Anda telah disetel ulang ke: %s';
