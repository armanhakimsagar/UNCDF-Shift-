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

/*
  |---------------------------------------------------------------------------
  | Landing Url
  |---------------------------------------------------------------------------

 */
Route::get('/', function () {
    return view('frontend.home');
});
/*
  |---------------------------------------------------------------------------
  | Research Url
  |---------------------------------------------------------------------------

 */

Route::get('/research', 'Frontend\Research\Research_Front_Controller@Front_file_view');
Route::get('/research_details/{id}', 'Frontend\Research\Research_Front_Controller@Front_file_details_view');
Route::get('/research_ajax_file_view/{id}','Frontend\Research\Research_Front_Controller@research_ajax_file_view');
/*
  |---------------------------------------------------------------------------
  | Training Url
  |---------------------------------------------------------------------------

 */

Route::get('/training', 'Frontend\training\training_Front_Controller@Front_file_view');
Route::get('/training_ajax_file_view/{id}','Frontend\training\training_Front_Controller@training_ajax_file_view');



/*
  |---------------------------------------------------------------------------
  | Auth
  |---------------------------------------------------------------------------

 */
Auth::routes();

/*
  |---------------------------------------------------------------------------
  | Admin Dashboard
  |---------------------------------------------------------------------------

 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('dashbord', 'Dashboard@index')->name('dashbord');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::get('csv_uploader', 'CsvuploaderController@importCsv');
    Route::get('csv_correction/{offset_id}', 'CsvuploaderController@csvCorrection');
    Route::get('seperateColumnValue/{offset_id}', 'CsvuploaderController@seperateColumnValue');
    Route::get('updateSortingValue/{offset_id}', 'CsvuploaderController@updateSortingValue');
    Route::get('insertTempTable/{offset_id}/{column_name}', 'CsvuploaderController@insertTempTable');
    Route::get('getNameCountFromCSV', 'CsvuploaderController@getNameCountFromCSV');
    /*
      |--------------------------------------------------------------------------
     * research controller
      | -------------------------------------------------------------------------
     */
    Route::get('research', 'Research\ResearchController@DataView')->name('research_view');
    Route::get('research_form', 'Research\ResearchController@Research_Form')->name('research_form');

    Route::post('ResearchValidation', 'Research\ResearchController@Validation')->name('ResearchValidation');

    Route::get('research_edit/{id}', 'Research\ResearchController@Research_Edit');

    Route::post('research_update', 'Research\ResearchController@research_update')->name('Research_Update');

    Route::get('research_delete/{id}', 'Research\ResearchController@research_delete');

    Route::get('research_ajax_delete/{id}', 'Research\ResearchController@research_ajax_delete');
    Route::get('addLocationIds/{offset_id}', 'CsvuploaderController@addLocationIds');
    Route::get('showLocationIds', 'CsvuploaderController@showLocationIds');
    Route::get('updateUpazilaName/{district}/{loc_name_en}', 'CsvuploaderController@updateUpazilaName');


    /*
      |--------------------------------------------------------------------------
     * training controller
      | -------------------------------------------------------------------------
     */

    Route::get('/training', 'training\training_controller@form_view');

    Route::get('/training_view', 'training\training_controller@training_view');

    Route::post('/training_insert', 'training\training_controller@training_insert');

    Route::get('/training_edit/{id}', 'training\training_controller@training_edit');

    Route::get('/training_ajax_delete/{id}', 'training\training_controller@training_ajax_delete');

    Route::post('/training_update', 'training\training_controller@training_update');

    Route::get('/training_delete/{id}', 'training\training_controller@training_delete');
    
    
    /*
      |--------------------------------------------------------------------------
     * databank controller
      | -------------------------------------------------------------------------
     */
    
    Route::get('/databankform', 'databank\DatabankController@form');
    Route::post('/MetarialInsert', 'databank\DatabankController@MetarialInsert');
    Route::post('/StudyInsert', 'databank\DatabankController@StudyInsert');
    Route::post('/DirectoryInsert', 'databank\DatabankController@DirectoryInsert');
    
    Route::get('/databank', 'databank\DatabankController@view');
    
    Route::post('/DatasetInsert', 'databank\DatabankController@DatasetInsert');
    
    Route::get('/DatasetEdit/{id}', 'databank\DatabankController@DatasetEdit');
    
    Route::get('DatasetEdit/dataset/{id}','databank\DatabankController@SpecficDataset');
    Route::get('DatasetEdit/metarial/{id}','databank\DatabankController@SpecficMetarial');
    Route::get('DatasetEdit/study/{id}','databank\DatabankController@SpecficStudy');
    Route::get('DatasetEdit/directory/{id}','databank\DatabankController@SpecficDirectory');
    Route::post('CollectionUpdate','databank\DatabankController@CollectionUpdate');
    Route::post('DatasetUpdate','databank\DatabankController@DatasetUpdate');
    Route::post('MetarialUpdate','databank\DatabankController@MetarialUpdate');
    Route::post('StudyUpdate','databank\DatabankController@StudyUpdate');
    Route::post('DirectoryUpdate','databank\DatabankController@DirectoryUpdate');
    
    Route::post('/CollectionInsert', 'databank\DatabankController@CollectionInsert');

    Route::get('/map_color_range_view', 'MapRange\MapRangeController@maprange_view');
    Route::get('/map_color_range_form', 'MapRange\MapRangeController@maprange_form_view');
    Route::post('/map_color_range_data_insert', 'MapRange\MapRangeController@maprange_data_insert');

    Route::get('/general_post_view', 'GeneralPost\GeneralPostController@general_post_view');
    Route::get('/general_post_form', 'GeneralPost\GeneralPostController@general_post_form_view');
    Route::post('/general_post_data_insert', 'GeneralPost\GeneralPostController@general_post_data_insert');
    Route::get('/general_post_data_edit/{id}', 'GeneralPost\GeneralPostController@general_post_data_edit');
    Route::post('/general_post_data_update', 'GeneralPost\GeneralPostController@general_post_data_update');
    Route::get('general_post_data_delete/{id}', 'GeneralPost\GeneralPostController@general_post_data_delete');
});

/*
  |--------------------------------------------------------------------------
 * Fronend controller
  | -------------------------------------------------------------------------
 */

Route::get('getalldistrict', 'Frontend\FrontendController@getalldistrict');
Route::get('getalldivision', 'Frontend\FrontendController@getalldivision');
/*
  |--------------------------------------------------------------------------
 * all filter ajax call will go here:
  |--------------------------------------------------------------------------
 */
Route::get('districthoverwiseresult', 'Frontend\FrontendController@districthoverwiseresult');
Route::get('upazila_hoverwise_result', 'Frontend\FrontendController@upazila_hoverwise_result');
Route::get('filter_wise_result', 'Frontend\FrontendController@filter_wise_result');
Route::get('getdistrictresult', 'Frontend\FrontendController@getdistrictresult');
Route::get('heatmapcolor', 'Frontend\FrontendController@heatmapcolor');
Route::get('heat_map_color_upazila', 'Frontend\FrontendController@heat_map_color_upazila');

//Dynamic Chart Design
//1st explorer ** Profile **

Route::get('/get_chart_data', 'Frontend\ChartController@get_table_data');
Route::get('/get_box_chart_data', 'Frontend\ChartController@get_box_chart_data');

//GuideLine view
Route::get('/guideline_view', 'Frontend\ViewController@guideline_view');

//Databank View
Route::get('/databank_view', 'Frontend\ViewController@databank_view');
Route::get('/databank_details/{id}', 'Frontend\ViewController@databank_details');
Route::get('/dataset_details/{id}', 'Frontend\ViewController@dataset_details');

//Background View
Route::get('/background_view', 'Frontend\ViewController@background_view');


Route::get('error',function(){

  abort(404);

});

//Contact Us View
Route::get('/contact_us_view', 'Frontend\ViewController@contact_us_view');
//Test for data retrieve

Route::get('/test-data-retrieve', 'Frontend\ViewController@data_retrieve');

//Test 
//Route::get('/test_floating', 'Frontend\ViewController@calculation');
//Search
Route::get('/get_search_data', 'Frontend\SearchController@serach_data_retrieve');

