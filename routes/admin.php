<?php

use Illuminate\Support\Facades\Route;
// ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'User\UserController@admin')->name('admin');
    //user
    Route::get('listUser', 'User\UserController@listUser')->name('listUser');
    Route::get('addUser', 'User\UserController@addUser')->name('addUser');
    Route::post('saveUser', 'User\UserController@saveUser')->name('saveUser');
    Route::post('updateUser{id}', 'User\UserController@updateUser')->name('updateUser');;
    Route::get('editUser/{id}', 'User\UserController@editUser')->name('editUser');
    Route::get('deleteUser/{id}', 'User\UserController@deleteUser');
    Route::get('search_user', 'User\UserController@search_user')->name('search_user');
    Route::post('tra_cuu_don_hang', 'User\UserController@tra_cuu_don_hang')->name('tra_cuu_don_hang');
    Route::get('tra_cuu_that_bai', 'User\UserController@tra_cuu_that_bai')->name('tra_cuu_that_bai');
    //Category
    Route::get('listCategory', 'Category\CategoryController@listCategory')->name('listCategory');
    Route::get('addCategory', 'Category\CategoryController@addCategory')->name('addCategory');
    Route::post('saveCategory', 'Category\CategoryController@saveCategory')->name('saveCategory');
    Route::get('editCategory/{id}', 'Category\CategoryController@editCategory')->name('editCategory');
    Route::post('updateCategory{id}', 'Category\CategoryController@updateCategory')->name('updateCategory');
    Route::get('deleteCategory/{id}', 'Category\CategoryController@deleteCategory');
    //Category
    Route::get('danh-sach-danh-muc-bai-viet', 'Category_news\Category_newsController@list_category_news')
        ->name('list_category_news');
    Route::get('trang-them-danh-muc-bai-viet', 'Category_news\Category_newsController@list_add_category_news')
        ->name('list_add_category_news');
    Route::get('trang-sua-danh-muc-bai-viet/{id}', 'Category_news\Category_newsController@list_edit_category_news')
        ->name('list_edit_category_news');
    Route::post('them_category_news', 'Category_news\Category_newsController@add_category_news')
        ->name('add_category_news');
    Route::post('sua-danh-muc-bai-viet/{id}', 'Category_news\Category_newsController@edit_category_news')
        ->name('edit_category_news');
    Route::get('xoa-danh-muc-bai-viet/{id}', 'Category_news\Category_newsController@delete_category_news');
    //Product
    Route::get('listProduct', 'Product\ProductController@listProduct')->name('listProduct');
    Route::get('addProduct', 'Product\ProductController@addProduct')->name('addProduct');
    Route::post('saveProduct', 'Product\ProductController@saveProduct')->name('saveProduct');
    Route::get('editProduct/{id}', 'Product\ProductController@editProduct')->name('editProduct');
    Route::post('updateProduct{id}', 'Product\ProductController@updateProduct')->name('updateProduct');
    Route::get('deleteProduct/{id}', 'Product\ProductController@deleteProduct');
    Route::get('search_product', 'Product\ProductController@search_product')->name('search_product');
    Route::get('chi-tiet-san-pham/{id}', 'Product\ProductController@detail_product')->name('detail_product');
    //Expert
    Route::get('listExpert', 'Expert\ExpertController@listExpert')->name('listExpert');
    Route::get('addExpert', 'Expert\ExpertController@addExpert')->name('addExpert');
    Route::post('saveExpert', 'Expert\ExpertController@saveExpert')->name('saveExpert');
    Route::post('updateExpert/{id}', 'Expert\ExpertController@updateExpert')->name('updateExpert');
    Route::get('editExpert/{id}', 'Expert\ExpertController@editExpert')->name('editExpert');
    Route::get('deleteExpert/{id}', 'Expert\ExpertController@deleteExpert');
    // News
    Route::get('listNews', 'News\NewsController@listNews')->name('listNews');
    Route::get('cho-dang-bai-viet', 'News\NewsController@cho_dang_bai')->name('cho_dang_bai');
    Route::get('dang-bai-viet/{id}', 'News\NewsController@dang_bai_viet')->name('dang_bai_viet');
    Route::get('chi-tiet-bai-viet/{id}', 'News\NewsController@detail_news')->name('detail_news');
    Route::post('saveNews', 'News\NewsController@saveNews')->name('saveNews');
    Route::get('addNews', 'News\NewsController@addNews')->name('addNews');
    Route::get('editNews/{id}', 'News\NewsController@editNews')->name('editNews');
    Route::post('updateNews{id}', 'News\NewsController@updateNews')->name('updateNews');
    Route::get('deleteNews/{id}', 'News\NewsController@deleteNews');
    Route::get('xoa-bai-viet-cho-dang/{id}', 'News\NewsController@cho_dang_deleteNews');
    Route::get('search_news', 'News\NewsController@search_news')->name('search_news');
    // Booking
    Route::get('listBooking', 'Booking\BookingController@listBooking')
        ->name('listBooking');
    Route::get('booking_finish', 'Booking\BookingController@booking_finish')
        ->name('booking_finish');
    Route::get('updateBooking/{id_product}/{id_booking}', 'Booking\BookingController@updateBooking');
    Route::get('deleteBooking/{id_product}/{id_booking}', 'Booking\BookingController@deleteBooking');
    Route::get('deleteBooking_finish/{id_product}/{id_booking}', 'Booking\BookingController@deleteBooking_finish');

    Route::get('search_booking', 'Booking\BookingController@search_booking')
        ->name('search_booking');
    // Liên hệ
    Route::get('danh-sach-lien-he','Contact\ContactController@list_contact')->name('list_contact');
    Route::get('chi-tiet-lien-he/{id}','Contact\ContactController@detail_contact')->name('detail_contact');
    Route::get('chi-tiet-thu-da-doc/{id}','Contact\ContactController@detail_watched_contact')->name('detail_watched_contact');
    Route::get('danh-sach-lien-he-da-doc','Contact\ContactController@watched_contact')->name('watched_contact');
    Route::get('xoa-lien-he/{id}','Contact\ContactController@delete_contact')->name('delete_contact');
    Route::get('xoa-het-thu-lien-he','Contact\ContactController@delete_all_contact')->name('delete_all_contact');
});




