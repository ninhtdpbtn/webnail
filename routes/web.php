<?php

use Illuminate\Support\Facades\Route;
Route::permanentRedirect('here', 'there');
    Route::get('/', 'WebController@home')->name('home');
//liên hệ
    Route::get('lien-he', 'WebController@contact')->name('contact');
    Route::post('postcontact', 'WebController@postcontact')->name('postcontact');
//Bài viết
    Route::get('tin-tuc', 'WebController@bog')->name('bog');
    Route::get('bai-viet/{slug}', 'WebController@detailBog')->name('detailBog');
// Sản phẩm
    Route::get('danh-sach-san-pham', 'WebController@products')->name('products');
    Route::get('san-pham/{slug}', 'WebController@oderProduct')->name('oderProduct');
    Route::get('search', 'WebController@search')->name('search');
//Chuyên gia
    Route::get('chuyen-gia', 'WebController@staff')->name('staff');
// Combo
    Route::get('danh-sach-combo', 'WebController@combo')->name('combo');
//Giỏ hàng
    Route::get('gio-hang', 'WebController@giohang')->name('Home.giohang');
    Route::get('addbooking/{id}', 'WebController@addbooking')->name('Home.addbooking');
    Route::post('updatebook', 'WebController@updatebook')->name('Home.updatebook');
    Route::post('savebooking', 'WebController@savebooking')->name('Home.savebooking');
    Route::post('oder_booking', 'WebController@oder_booking')->name('oder_booking');
    Route::get('removecart/{id}', 'WebController@removebook')->name('Home.remove');
// Đặt lịch
    Route::get('dat-lich', 'WebController@datlich')->name('datlich');
    Route::get('datlich_combo', 'WebController@datlich_combo')->name('datlich_combo');
    Route::get('datlich_user', 'WebController@datlich_user')->name('datlich_user');
//login
    Route::get('dang-nhap', 'User\UserController@login')->name('login');
    Route::post('getlogin', 'User\UserController@getlogin')->name('getlogin');
    Route::get('dang-ky-tai-khoan', 'User\UserController@addLogin')->name('addLogin');
    Route::post('saveLogin', 'User\UserController@saveLogin')->name('saveLogin');
    Route::get('logout', 'User\UserController@logout')->name('logout');
    Route::get('test', 'WebController@test')->name('test');
    Route::post('test_validate', 'WebController@test_validate')->name('test_validate');

    // user
    Route::middleware('auth')->group(function () {
        Route::get('danh-sach-gio-hang', 'WebController@giohang_user')
            ->name('giohang_user');
        Route::get('addbooking_gio_hang/{id}', 'WebController@addbooking_gio_hang')
            ->name('addbooking_gio_hang');
        Route::get('addbooking_combo_user/{id}', 'WebController@addbooking_combo_user')
            ->name('addbooking_combo_user');
        Route::get('delete_gio_hang/{id}', 'WebController@delete_gio_hang')
            ->name('delete_gio_hang');
        Route::get('danh-sach-dat-lich', 'User\UserController@dat_lich_user')
            ->name('dat_lich_user');
        Route::get('detlete_booking_user/{id_product}/{id_booking}', 'Booking\BookingController@detlete_booking_user')
            ->name('detlete_booking_user');
    });




