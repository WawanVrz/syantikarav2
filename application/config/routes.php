<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/* FRONTEND PANEL */

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['public/auth/login']['post'] = 'SignIn/do_Login';
$route['public/auth/logout']['get'] = 'SignIn/do_Logout';

$route['about'] = 'AboutUs';
$route['facilities'] = 'Facilities';
$route['news'] = 'Blogs';
$route['news/detail/(:any)'] = 'Blogs/Detail/$1';
$route['gallery'] = 'Galleries';
$route['contact'] = 'Contacts';
$route['contact/success/sendmail'] = 'Contacts/sukses';
$route['signin'] = 'SignIn';
$route['signup'] = 'SignUp';
$route['forget/password'] = 'ForgetPassword';
$route['mail'] = 'SignUp/mailtemp';
$route['list/reservation'] = 'MyReservation';
$route['list/reservation/detail/(:any)'] = 'MyReservation/detail/$1';
$route['profile'] = 'MyProfileUser';

/* ADMINISTRATOR PANEL */
$route['panel/admin'] = 'LoginAdminController';

$route['dashboard/admin'] = 'DashboardAdminController';
$route['dashboard/admin/profile'] = 'DashboardAdminController/profileuser';
$route['dashboard/admin/profile/edit'] = 'DashboardAdminController/editprofileuser';
$route['dashboard/admin/profile/changepassword'] = 'DashboardAdminController/ubahpassword';

$route['panel/auth/login']['post'] = 'LoginAdminController/do_Login';
$route['panel/auth/logout']['get'] = 'LoginAdminController/do_Logout';

$route['dashboard/admin/data/jenistamu'] = 'JenisTamuController';
$route['dashboard/admin/data/jenistamu/add'] = 'JenisTamuController/tambah_jenistamu';
$route['dashboard/admin/data/jenistamu/edit/(:any)'] = 'JenisTamuController/edit_jenistamu/$1';
$route['dashboard/admin/data/jenistamu/bin'] = 'JenisTamuController/viewbin';

$route['dashboard/admin/data/jenistarif'] = 'JenisTarifController';
$route['dashboard/admin/data/jenistarif/add'] = 'JenisTarifController/tambah_jenistarif';
$route['dashboard/admin/data/jenistarif/edit/(:any)'] = 'JenisTarifController/edit_jenistarif/$1';
$route['dashboard/admin/data/jenistarif/bin'] = 'JenisTarifController/viewbin';

$route['dashboard/admin/data/additional'] = 'AdditionalController';
$route['dashboard/admin/data/additional/add'] = 'AdditionalController/tambah_additional';
$route['dashboard/admin/data/additional/edit/(:any)'] = 'AdditionalController/edit_additional/$1';
$route['dashboard/admin/data/additional/bin'] = 'AdditionalController/viewbin';

$route['dashboard/admin/data/tarif'] = 'TarifController';
$route['dashboard/admin/data/tarif/add'] = 'TarifController/tambah_tarif';
$route['dashboard/admin/data/tarif/edit/(:any)'] = 'TarifController/edit_tarif/$1';
$route['dashboard/admin/data/tarif/bin'] = 'TarifController/viewbin';

$route['dashboard/admin/data/ruang'] = 'RuangController';
$route['dashboard/admin/data/ruang/add'] = 'RuangController/tambah';
$route['dashboard/admin/data/ruang/edit/(:any)'] = 'RuangController/edit/$1';
$route['dashboard/admin/data/ruang/bin'] = 'RuangController/viewbin';

$route['dashboard/admin/data/ruangan'] = 'RuanganController';
$route['dashboard/admin/data/ruangan/add'] = 'RuanganController/tambah_ruangan';
$route['dashboard/admin/data/ruangan/edit/(:any)'] = 'RuanganController/edit_ruang/$1';
$route['dashboard/admin/data/ruangan/bin'] = 'RuanganController/viewbin';

$route['dashboard/admin/data/kamar'] = 'KamarController';
$route['dashboard/admin/data/kamar/add'] = 'KamarController/tambah_kamar';
$route['dashboard/admin/data/kamar/edit/(:any)'] = 'KamarController/edit_kamar/$1';
$route['dashboard/admin/data/kamar/bin'] = 'KamarController/viewbin';

$route['dashboard/admin/data/jasa'] = 'JasaController';
$route['dashboard/admin/data/jasa/add'] = 'JasaController/tambah_jasa';
$route['dashboard/admin/data/jasa/edit/(:any)'] = 'JasaController/edit_jasa/$1';
$route['dashboard/admin/data/jasa/bin'] = 'JasaController/viewbin';

$route['dashboard/admin/denah/ruangan'] = 'denahruangan';

$route['dashboard/admin/data/user'] = 'UsersController';
$route['dashboard/admin/data/user/add'] = 'UsersController/tambah_user';
$route['dashboard/admin/data/user/edit/(:any)'] = 'UsersController/edit_user/$1';
$route['dashboard/admin/data/user/bin'] = 'UsersController/viewbin';

$route['dashboard/admin/data/reservasi'] = 'ReservationController';
$route['dashboard/admin/data/reservasi/add'] = 'ReservationController/reservation';
$route['dashboard/admin/data/reservasi/detail/(:any)'] = 'ReservationController/detail_reservasi/$1';
$route['dashboard/admin/data/reservasi/edit/(:any)'] = 'ReservationController/update_reservasi/$1';
$route['dashboard/admin/data/reservasi/update/(:any)'] = 'ReservationController/edit_transaksi/$1';
$route['dashboard/admin/data/reservasi/detail/checkin/'] = 'ReservationController/detail_reservasi_checkin';
$route['dashboard/admin/data/reservasi/detail/checkout/'] = 'ReservationController/detail_reservasi_checkiout';
$route['dashboard/admin/data/tes'] = 'ReservationController/testing';
$route['dashboard/admin/data/reservasi/pembayaran'] = 'ReservationController/payment';
$route['dashboard/admin/data/reservasi/pembayaran/(:any)'] = 'ReservationController/paymentbyID/$1';

$route['dashboard/admin/data/konfirmasi/checkin'] = 'KonfirmasiController/checkin';
$route['dashboard/admin/data/konfirmasi/checkin/detail/(:any)'] = 'ReservationController/detail_reservasi_checkin/$1';
$route['dashboard/admin/data/konfirmasi/checkout'] = 'KonfirmasiController/checkout';
$route['dashboard/admin/data/konfirmasi/checkout/detail/(:any)'] = 'ReservationController/detail_reservasi_checkiout/$1';

$route['dashboard/admin/data/laporan/harian'] = 'Reporting';
$route['dashboard/admin/data/laporan/bulanan'] = 'Reporting/indexbulanan';
$route['dashboard/admin/data/laporan/tahunan'] = 'Reporting/indextahunan';
$route['dashboard/admin/data/laporan/export'] = 'Reporting/pdf';

$route['dashboard/admin/data/nota'] = 'NotaController';

$route['dashboard/admin/data/berita/kategori'] = 'KategoriBeritaController';
$route['dashboard/admin/data/berita/kategori/add'] = 'KategoriBeritaController/tambah_kategori';
$route['dashboard/admin/data/berita/kategori/edit/(:any)'] = 'KategoriBeritaController/edit_kategori/$1';
$route['dashboard/admin/data/berita/kategori/bin'] = 'KategoriBeritaController/viewbin';

$route['dashboard/admin/data/berita'] = 'NewsController';
$route['dashboard/admin/data/berita/add'] = 'NewsController/tambah_berita';
$route['dashboard/admin/data/berita/edit/(:any)'] = 'NewsController/edit_berita/$1';
$route['dashboard/admin/data/berita/detail/(:any)'] ='NewsController/detail_berita/$1';
$route['dashboard/admin/data/berita/bin'] = 'NewsController/viewbin';

$route['dashboard/admin/data/fasilitas'] = 'FasilitasController';
$route['dashboard/admin/data/fasilitas/add'] = 'FasilitasController/tambah_fasilitas';
$route['dashboard/admin/data/fasilitas/edit/(:any)'] = 'FasilitasController/edit_fasilitas/$1';
$route['dashboard/admin/data/fasilitas/bin'] = 'FasilitasController/viewbin';

$route['dashboard/admin/data/gallery'] = 'GalleryController';
$route['dashboard/admin/data/gallery/add'] = 'GalleryController/tambah_gallery';
$route['dashboard/admin/data/gallery/edit/(:any)'] = 'GalleryController/edit_gallery/$1';
$route['dashboard/admin/data/gallery/bin'] = 'GalleryController/viewbin';

$route['dashboard/admin/data/setting'] = 'SettingController';
$route['dashboard/admin/data/setting/add'] = 'SettingController/tambah_setting';
$route['dashboard/admin/data/setting/edit/(:any)'] = 'SettingController/edit_setting/$1';
$route['dashboard/admin/data/setting/detail/(:any)'] = 'SettingController/detail_setting/$1';

$route['dashboard/admin/data/member'] = 'MemberController';

$route['dashboard/admin/data/pesan'] = 'PesanController';
$route['dashboard/admin/data/pesan/detail/(:any)'] = 'PesanController/detail/$1';
$route['dashboard/admin/data/pesan/bin'] = 'PesanController/viewbin';


// =============================== API SYANTIKARA FOR WEB BACKEND=================================
$route['api/tarif']['get'] = 'TarifController/getTarif';
$route['api/ruang']['get'] = 'ReservationController/getRuang';
$route['api/countkamar']['get'] = 'ReservationController/getCountKamar';
$route['api/kamar']['get'] = 'ReservationController/GetRuangKamar';
$route['api/transaksi/kamar']['get'] = 'ReservationController/GetTransaksiKamar';
$route['api/transaksi']['get'] = 'ReservationController/GetIDTrx';
$route['api/transaksi/update']['get'] = 'ReservationController/GetIDTrxUpdate';
$route['api/transaksi/room']['get'] = 'ReservationController/getTKamar';
$route['api/transaksi/room/detil']['get'] = 'ReservationController/getTDetKamar';
$route['api/transaksi/total']['get'] = 'ReservationController/getTotalTransaksiKamar';
$route['api/pesan/all']['get'] = 'PesanController/getPesan';
$route['api/tarif/ruang/pertemuan']['get'] = 'ReservationController/getHargaRuangPertemuan';
$route['api/tarif/additional']['get'] = 'ReservationController/getHargaAdditional';
$route['api/transaksi/pembayaran']['get'] = 'ReservationController/getTransaksiPembayaran';
$route['api/count/ruang/makan']['get'] = 'ReservationController/GetRuangMakan';
$route['api/count/ruang/pertemuan']['get'] = 'ReservationController/GetRuangPertemuan1';
$route['api/count/ruang/pertemuan/yayasan']['get'] = 'ReservationController/GetRuangPertemuanyayasan';
$route['api/denah/ruang']['get'] = 'DenahRuanganController/getTRuang';

// =============================== API SYANTIKARA FOR MOBILE=================================
$route['api/v1/list/reservasi']['GET'] = 'ApiV1/ListReservasiController/getListreservasi';
$route['api/v1/list/detail/reservasi']['GET'] = 'ApiV1/ListReservasiController/getListreservasiDetail';
$route['api/v1/account/login']['POST'] = 'ApiV1/AccountController/loginAccounts';
$route['api/v1/account/profile']['GET'] = 'ApiV1/AccountController/getProfileDetail';
$route['api/v1/account/logout']['POST'] = 'ApiV1/AccountController/logoutAccounts';
$route['api/v1/list/testing']['GET'] = 'ApiV1/testing/getdataku';
$route['api/v1/account/update/profile']['POST'] = 'ApiV1/AccountController/UpdateProfileDetail';
$route['api/v1/notification']['GET'] = 'ApiV1/PushNotifController/pushnotiffcm';
$route['api/v1/account/reset/password']['POST'] = 'ApiV1/AccountController/resetpassword';
