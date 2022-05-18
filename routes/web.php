<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');
Route::get('/coba','AdminMentorController@coba');

//kelas
Route::get('/kelas','AdminkelasController@index')
    ->name('kelas.index');
Route::get('/kelas/{slug}','AdminkelasController@show')
    ->name('kelas.show');
Route::get('/kelas/kategori/{slug}','AdminkelasController@kategoribaru')
    ->name('kategori.kelas');
Route::get('/kelas/topik/{slug}','AdminkelasController@topik')
    ->name('kelas.topik');
Route::get('/search','AdminKelasController@search')
    ->name('kelas.search');
Route::get('/kelas_materi', 'AdminkelasController@filtermateri')
    ->name('kelas.materi');
Route::get('/kelas_materi_kategori', 'AdminKelasController@filmaterikategori')
    ->name('kelas.materi.kategori');
Route::get('/kelas_materi_topik', 'AdminKelasController@filmateritopik')
    ->name('kelas.materi.topik');

//mentor
Route::get('/guru','HomeMentorController@index')
    ->name('home.mentor.index');
Route::get('/guru/{kode_mentor}','HomeMentorController@show')
    ->name('home.mentor.show');
Route::get('/guru/{kode_mentor}/kuis', 'HomeMentorController@kuis')
    ->name('home.mentor.kuis');
Route::get('/s','HomeMentorController@cari')
    ->name('home.mentor.cari');

//blog
Route::get('/blog','UserBlogController@index')
    ->name('blog.index');
Route::get('/blog/{slug}','UserBlogController@show')
    ->name('blog.show');
Route::get('/b','UserBlogController@cari')
    ->name('blog.cari');
Route::post('/blog/slug','BookmarkController@store')
    ->name('bookmark.store');
Route::post('/blog/comment', 'UserBlogController@store_comment')
    ->name('blog.comment');
Route::post('/blog/reply/{id_komen}', 'UserBlogController@balas_komen')
    ->name('blog.reply');
Route::delete('/blog/comment/{id}', 'UserBlogController@delete_comment')
    ->name('blog.delcomment');
Route::delete('/blog/reply/{id}', 'UserBlogController@delete_reply')
    ->name('blog.delreply');
Route::put('/blog/{id}','BookmarkController@update')
    ->name('bookmark.update');

//drop down
Route::get('dependet-dropdown','KelasController@dropdown')
    ->name('kelas.dropdown');
Route::get('dropdown','VideoDetailsController@dependent')
    ->name('videodetails.dropdown');

//transaksi
Route::get('/checkout/pending','CheckoutController@pending')
    ->name('checkout.pending');
Route::resource('checkout', 'CheckoutController');
Route::get('/checkout/{slug}','CheckoutController@show')
    ->name('checkout.showslug');

//transaksi gratis / join
Route::get('/join/berhasil','JoinController@berhasil')
    ->name('join.berhasil');
Route::resource('join', 'JoinController');

//kuis --ricardo
Route::get('/kuis','SoalController@index')
    ->name('kuis.index');
Route::post('/ratingkuis/{slug}', 'SoalController@rating')
    ->name('kuis.rating');
Route::get('/kuis/kategori/{slug}','SoalController@kategoribaru')
    ->name('kuis.kategori');
Route::get('/filkuis', 'SoalController@filtertopik')
    ->name('kuis.topik');
Route::get('/ambilratetopik','SoalController@ambilratekuis')
    ->name('kuis.ambilratetopik');
Route::get('/searchkuis','SoalController@search')
    ->name('kuis.search');
Route::get('/kerjakuis/{id}','SoalController@menujusoal')
    ->name('kuis.menujusoal');
Route::post('/simpankuis','SoalController@simpanjawaban')
    ->name('kuis.simpankuis');
Route::get('/hasilkuis/{slug}','SoalController@jawabanuser')
    ->name('kuis.jawabanuser');
Route::get('/hasilkuis/{slug}/print','SoalController@print')
    ->name('kuis.printjawaban');
Route::get('/getKategori','SoalController@getKategori')
    ->name('kuis.kategorinya');
Route::get('/kuis/{id}','SoalController@detailkuis')
    ->name('kuis.detailnya');
Route::get('/kuis/{id}/leaderboard','SoalController@leader')
    ->name('kuis.leaderboardnya');

//contact us
Route::post('/request','ContactUsController@reqkelas')
    ->name('contact-us.reqkelas');
Route::resource('/contact-us','ContactUsController');
//Request kelas
//Route::resource('/request-kelas','RequestKelasController');


// Route::get('/admin','PagesController@admin');
//route halaman admin
Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/','DashboardController@admin')
            ->name('dashboard');

        Route::get('/adminkelas/{id}/gallery','AdminkelasController@gallery')
            ->name('adminkelas.gallery');
        Route::patch('/admin/adminkelas/{adminkelas}','AdminkelasController@ubah')
            ->name('adminkelas.ubah');
        Route::delete('/admin/videogratis/{id}','AdminkelasController@hapus')
            ->name('adminkelas.hapus');
        Route::resource('adminkelas','AdminkelasController');
        Route::resource('videogratis', 'VideoGratisController');
        Route::resource('videobayar', 'VideoBayarController');
        Route::patch('/admin/adminguru/{adminguru}','UploadGuruController@ubah')
            ->name('adminguru.ubah');
        Route::resource('adminguru', 'UploadGuruController');
        Route::patch('/admin/adminkelaspremium/{kelaspremium}','KelaspremiumController@ubah')
            ->name('adminkelaspremium.ubah');
        Route::get('/adminkelaspremium/{id}/gallery','KelaspremiumController@gallery')
            ->name('adminkelaspremium.gallery');
        Route::delete('/admin/videobayar/{id}','KelaspremiumController@hapus')
            ->name('adminkelaspremium.hapus');
        Route::resource('adminkelaspremium','KelaspremiumController');
        Route::patch('/admin/paketkelas/{paketkela}','PaketkelasController@ubah')
            ->name('adminpaket.ubah');
        Route::resource('adminpaket','PaketkelasController');
        Route::delete('/admin/videopaket/{id}','PaketkelasController@hapus')
            ->name('adminpaket.hapus');
        Route::get('/paketkelas/{id}/gallery','PaketkelasController@gallery')
            ->name('adminpaket.gallery');
        Route::resource('videopaket', 'VideoPaketController');

        Route::get('transactions/{id}/set-status','TransactionController@setStatus')
            ->name('transactions.status');
        Route::resource('transactions', 'TransactionController');

        //kelas
        Route::patch('/admin/adminkelasbaru/{id}','KelasController@ubah')
            ->name('adminkelasbaru.ubah');
        Route::get('/adminkelasbaru/{slug}/gallery','KelasController@gallery')
            ->name('adminkelasbaru.gallery');
        Route::delete('/admin/video/{id}','KelasController@hapus')
            ->name('adminkelasbaru.hapus');
        Route::get('adminkelasbaru/{id}/set-status','KelasController@setStatus')
            ->name('kelas.status');
        //Route::get('/adminkelasbaru','KelasController@index')
        //    ->name('adminkelasbaru.index');
        Route::resource('adminkelasbaru', 'KelasController');

        //video
        Route::resource('video', 'VideoController');
        //kategori
        Route::get('/kategori/{slug}/gallery','KategoriController@gallery')
            ->name('kategori.gallery');
        Route::delete('admin/kategori/{id}','KategoriController@hapus')
            ->name('kategori.hapus');
        //kategori
        Route::resource('kategori', 'KategoriController');
        //topik
        Route::resource('topik', 'TopikController');
        //mentor
        Route::resource('mentor','MentorController');
        //set status mentor
        Route::get('mentor/{id}/set-status','MentorController@setStatus')
            ->name('mentor.status');
        //search function mentor
        Route::get('/cari','MentorController@cari')
            ->name('mentor.cari');
        Route::get('/cariuser','MentorController@cariuser')
            ->name('mentor.user.cari');

        //video details
        Route::resource('videodetails','VideoDetailsController');
        Route::get('/videodetails/download/{modul}','VideoDetailsController@download')
            ->name('videodetails.download');

        //bank
        Route::resource('bank', 'BankController');
        Route::patch('/bank/{id}','BankController@update')
            ->name('bank.update');

        //contact us
        Route::get('/contact','ContactAdminController@index')
            ->name('admin.contact.index');
        Route::get('contact/{id}/set-status','ContactAdminController@setStatus')
            ->name('admin.contact.status');
    });

//route halaman users
Route::prefix('users')
    ->middleware(['auth','users'])
    ->group(function () {
        Route::pattern('id', '[0-9]+');
        Route::get('/','OrangController@index')
            ->name('orang.index');
        Route::get('/notification','NotificationController@index')
            ->name('notification.index');
        Route::put('/notifkomen/{id}', 'NotificationController@update_status')
            ->name('notifkomen.checked');
        Route::get('/notification/{id}/show','NotificationController@show')
            ->name('notification.show');
        Route::get('/myclass', 'KelasSayaController@index')
            ->name('myclass.index');

        Route::get('/play_course/{slug}','KelasSayaController@belajar')
            ->name('play.course');
        Route::get('/play_course/{slug}/sertifikat','KelasSayaController@sertifikat')
            ->name('play.sertifikat');
        Route::get('/play_course/{id}/{slug?}/','KelasSayaController@belajarcourse')
            ->name('play.show');
        Route::post('/rate_course/{slug}','KelasSayaController@ratingcourse')
            ->name('play.rate');
        Route::put('/done_course/{id}','KelasSayaController@selesaicourse')
            ->name('play.done');
        Route::put('/alert_course/{id}','KelasSayaController@alert')
            ->name('alert.course');
        Route::put('/reset_course/{slug}','KelasSayaController@resetCourse')
            ->name('reset.course');
        //request sertifikat
        Route::post('/req-serti','SertifikatController@store')
            ->name('request.serti');
        //berhasil request
        Route::get('/sertifikat','SertifikatController@index')
            ->name('berhasil.serti');

        //favourite blog
        Route::get('/blog-favorite','UserProfileController@blog')
            ->name('blog.favorite');
        Route::put('/blog-favorite/{id}','BookmarkController@update_user')
            ->name('blog.update.favorite');
        //profile
        Route::get('/profile','UserProfileController@index')
            ->name('user.profile.index');
        Route::get('/profile/{id}/profile_edit','UserProfileController@edit')
            ->name('user.profile.edit');
        Route::get('/profile/{id}/upload_foto','UserProfileController@updatefoto')
            ->name('user.updatefoto.edit');
        Route::patch('/profile/{id}','UserProfileController@update')
            ->name('user.profile.update');

        // nilaikuis --ricardo
        Route::get('/nilai','KelasSayaController@historykuis')
            ->name('user.history.index');
});

//route halaman admin mentor
Route::prefix('amentor')
    ->middleware(['auth','mentor'])
    ->group(function(){
        Route::get('/','AdminMentorController@dex')
            ->name('amentor.index');
        //sertifikat
        Route::get('/sertifikat','AdminMentorController@sertifikat')
            ->name('amentor.sertifikat');
        //status sertifikat
        Route::get('/sertifikat/{id}/status','AdminMentorController@setStatus')
            ->name('amentor.status');
        //profile
        Route::get('/profile','ProfileMentorController@index')
            ->name('amentor.profile.index');
        Route::get('/profile/{id}/profile_edit','ProfileMentorController@edit')
            ->name('amentor.profile.edit');
        Route::patch('/profile/{id}','ProfileMentorController@update')
            ->name('amentor.profile.update');

        //khusus update foto profile
        Route::get('/profile/{id}/update_foto','ProfileMentorController@updatefoto')
            ->name('amentor.updatefoto.edit');

        //kelas
        Route::get('/kelas','MentorKelasController@index')
            ->name('amentor.kelas.index');
        Route::get('/kelas/{id}','MentorKelasController@show')
            ->name('amentor.kelas.show');
        Route::get('/kelas/{slug}/gallery','MentorKelasController@gallery')
            ->name('amentor.kelas.gallery');
        Route::get('/kelas/{id}/edit','MentorKelasController@edit')
            ->name('amentor.kelas.edit');
        Route::patch('/kelas/{id}','MentorKelasController@update')
            ->name('amentor.kelas.update');
        Route::get('/kelas/{id}/set-status','MentorKelasController@setStatus')
            ->name('amentor.kelas.status');

        //video
        Route::get('/materi','MentorVideoController@index')
            ->name('amentor.video.index');

        Route::get('/materi/create','MentorVideoController@create')
            ->name('amentor.video.create');

        Route::post('/materi','MentorVideoController@store')
            ->name('amentor.video.store');

        Route::get('/filtervideosaja','MentorVideoController@filtervideo')
            ->name('amentor.video.filter');

        Route::get('/materi/{id}/edit','MentorVideoController@edit')
            ->name('amentor.video.edit');

        Route::patch('/materi/{id}','MentorVideoController@update')
            ->name('amentor.video.update');

        Route::delete('/materi/{id}','MentorVideoController@destroy')
            ->name('amentor.video.destroy');

        Route::delete('/materi-create/{id}','MentorVideoController@destroy_create')
            ->name('amentor.video.destroy-create');


        //video_details
        Route::get('/videodetails','MentorVideoDetailsController@index')
            ->name('amentor.videodetails.index');

        Route::get('/videodetails/create','MentorVideoDetailsController@create')
            ->name('amentor.videodetails.create');

        Route::get('/ambilnomorviddetail', 'MentorVideoDetailsController@getNumber')
            ->name('amentor.videodetails.getNumber');

        Route::get('/getkuisviddetail', 'MentorVideoDetailsController@getKuis')
            ->name('amentor.videodetails.getKuis');

        Route::post('/videodetails','MentorVideoDetailsController@store')
            ->name('amentor.videodetails.store');

        Route::get('/amentor/{id}','MentorVideoDetailsController@show')
            ->name('amentor.videodetails.show');

        Route::get('/filterdetailsvideo','MentorVideoDetailsController@filter')
            ->name('amentor.videodetails.filter');

        Route::get('/videodetails/{id}/edit','MentorVideoDetailsController@edit')
            ->name('amentor.videodetails.edit');

        Route::patch('/videodetails/{id}','MentorVideoDetailsController@update')
            ->name('amentor.videodetails.update');

        Route::delete('/videodetails/{id}','MentorVideoDetailsController@destroy')
            ->name('amentor.videodetails.destroy');

        Route::delete('/des_create/{id}','MentorVideoDetailsController@destroy_create')
            ->name('amentor.videodetails.destroy-create');

        Route::get('/videodetails/{id}/modul','MentorVideoDetailsController@modul')
            ->name('amentor.videodetails.modul');

        Route::post('/videodetails/modul','MentorVideoDetailsController@addmodul')
            ->name('amentor.videodetails.addmodul');

        //Modul
        Route::get('/modul','ModulController@index')
            ->name('amentor.modul.index');
        Route::get('/getkelmodul', 'ModulController@getKelas')
            ->name('amentor.modul.getKelas');
        Route::get('/modul/{id}/edit','ModulController@edit')
            ->name('amentor.modul.edit');
        Route::patch('/modul/{id}','ModulController@update')
            ->name('amentor.modul.update');
        Route::delete('/modul/{id}','ModulController@destroy')
            ->name('amentor.modul.destroy');

        //blog
        Route::get('/blog','BlogController@index')
            ->name('amentor.blog.index');
        Route::get('/ambilkelasblog', 'BlogController@getkelas')
            ->name('amentor.blog.getKelas');
        Route::get('/blog/{id}','BlogController@show')
            ->name('amentor.blog.show');
        Route::get('/blog/{id}/edit','BlogController@edit')
            ->name('amentor.blog.edit');
        Route::patch('/blog/{id}/update','BlogController@update')
            ->name('amentor.blog.update');
        Route::get('/blog/notification', 'BlogController@notifblog')
            ->name('amentor.blog.notif');
        Route::put('/blog/notifkomen/{id}', 'BlogController@update_status')
            ->name('amentor.blog.notifkomen');
        //Route::get('/blog/{id}/view','BlogController@view')
        Route::get('/blog/create','BlogController@create')
            ->name('amentor.blog.create');
        Route::get('/filterblog','BlogController@filter')
            ->name('amentor.blog.filter');
        Route::post('/blog','BlogController@store')
            ->name('amentor.blog.store');
        Route::get('/blog/{id}/edit','BlogController@edit')
            ->name('amentor.blog.edit');
        //Route::patch('/blog/{id}','BlogController@update')
        //    ->name('amentor.blog.update');
        Route::delete('/blog/{id}','BlogController@destroy')
            ->name('amentor.blog.destroy');
        Route::get('drup-down','BlogController@dropdown')
            ->name('amentor.blog.dropdown');
        Route::get('/blog/{id}/isi','BlogController@viewblog')
            ->name('amentor.blog.view');
        Route::patch('/blog/{id}','BlogController@blog')
            ->name('amentor.blog.blog');
        Route::put('/blog/{id}/set-status','BlogController@setStatus')
            ->name('amentor.blog.status');

        //buatInputsoal -Ricardo
        Route::get('/inputsoal', 'FormSoalController@insSoal')
            ->name('amentor.soal.index');
        Route::get('/ambilnumbersoal', 'FormSoalController@ambilNumber')
            ->name('amentor.soal.ambilNumber');
        Route::post('/simpansoal',"FormSoalController@store")
            ->name('amentor.soal.simpan');
        Route::get('/tabelsoal/{kode_mentor}',"FormSoalController@index")
            ->name('amentor.soal.listSoal');
        Route::get('/ambiltabelsoal','FormSoalController@create')
            ->name('amentor.soal.tampilkantabel');
        Route::put('/updatesoal/{id}',"FormSoalController@update")
            ->name('amentor.soal.update');
        Route::delete('/tabelsoal',"FormSoalController@destroy")
            ->name('amentor.soal.hapus');
        //buatInputkuis -ricardo
        Route::get('/formkuis','KuisController@index')
            ->name('amentor.kuis.index');
        Route::get('/ambilKelas','KuisController@ambilkelas')
            ->name('amentor.kuis.ambilkelas');
        Route::get('/topik','KuisController@topik')
            ->name('amentor.kuis.ambilTopik');
        Route::post('/inputkuis','KuisController@store')
            ->name('amentor.kuis.store');
        Route::get('/listkuis','KuisController@create')
            ->name('amentor.kuis.listKuis');
        Route::get('/listdetailkuis/{id}', 'KuisController@show')
            ->name('amentor.kuis.listdetail');
        Route::get('/filterlistkuis','KuisController@filterkuismentor')
            ->name('amentor.kuis.filterkuis');
        Route::get('/historynilai','KuisController@hisSiswa')
            ->name('amentor.kuis.history');
        Route::get('/filterhisnilai', 'KuisController@hisfilter')
            ->name('amentor.kuis.filterhistory');
        Route::get('/listkuis/{id}','KuisController@edit')
            ->name('amentor.kuis.editKuis');
        Route::put('/updatekuis/{id}','KuisController@update')
            ->name('amentor.kuis.updateKuis');
        Route::get('/updatestatuskuis/{id}/status','KuisController@status')
            ->name('amentor.kuis.updatestatus');
        Route::delete('/deletekuis/{id}','KuisController@destroy')
            ->name('amentor.kuis.deletekuis');
    });

Auth::routes();
