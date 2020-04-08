<?php

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'admin']], function () {
    Route::get('/product-bulk-upload', function(){
        return view('productbulkupload::upload');
    })->name('productbulkupload.upload');


    Route::post('/upload-products-csv', '\ProductBulkUpload\Controllers\ProductBulkUploadController@importCSV')->name('productbulkupload.import');
});