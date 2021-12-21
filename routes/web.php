<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){
    Route::get('/', [App\Http\Controllers\WebControllers\Main\MainController::class, 'actionWebMain'])->name('actionWebMain');
    Route::get('/requsites', [App\Http\Controllers\WebControllers\Main\MainController::class, 'actionWebRequsites'])->name('actionWebRequsites');
    Route::get('/about-us', [App\Http\Controllers\WebControllers\Main\MainController::class, 'actionWebAboutUs'])->name('actionWebAboutUs');
    Route::get('/contact', [App\Http\Controllers\WebControllers\Main\MainController::class, 'actionWebContact'])->name('actionWebContact');
    Route::get('/faq', [App\Http\Controllers\WebControllers\Main\MainController::class, 'actionWebFaq'])->name('actionWebFaq');
    //LEASING
    Route::get('/leasing', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebLeasing'])->name('actionWebLeasing');
    Route::get('/backleasing', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebBackLeasing'])->name('actionWebBackLeasing');
    Route::get('/leasing/form', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebLeasingForm'])->name('actionWebLeasingForm');
    Route::get('/backleasing/form', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebBackLeasingForm'])->name('actionWebBackLeasingForm');
    Route::get('/texileasing', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebTaxiLeasing'])->name('actionWebTaxiLeasing');
    Route::get('/texileasing/form', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebTaxiLeasingForm'])->name('actionWebTaxiLeasingForm');
    Route::get('/success', [App\Http\Controllers\WebControllers\Leasing\LeasingController::class, 'actionWebSeccess'])->name('actionWebSeccess');
    //CARS
    Route::get('/cars', [App\Http\Controllers\WebControllers\Cars\CarsController::class, 'actionWebCars'])->name('actionWebCars');
    Route::get('/cars/{id}', [App\Http\Controllers\WebControllers\Cars\CarsController::class, 'actionCarsView'])->name('actionCarsView');
    //BLOG
    Route::get('/blog', [App\Http\Controllers\WebControllers\Blogs\BlogController::class, 'actionWebBlog'])->name('actionWebBlog');
    Route::get('/blog/view/{id}', [App\Http\Controllers\WebControllers\Blogs\BlogController::class, 'actionWebBlogView'])->name('actionWebBlogView');
});


Route::group(['prefix' => '/ajax'], function() {
    Route::get('/ajaxCalculetePmt', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxCalculetePmt'])->name('ajaxCalculetePmt');
    Route::get('/ajaxGetLeasingParameters', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxGetLeasingParameters'])->name('ajaxGetLeasingParameters');
    Route::get('/ajaxGetLoanData', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxGetLoanData'])->name('ajaxGetLoanData');
    Route::post('/ajaxSaveReview', [App\Http\Controllers\WebControllers\Main\MainAjaxController::class, 'ajaxSaveReview'])->name('ajaxSaveReview');
    Route::post('/ajaxLeasingFormSubmit', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxLeasingFormSubmit'])->name('ajaxLeasingFormSubmit');
    Route::post('/ajaxLeasingSubmit', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxLeasingSubmit'])->name('ajaxLeasingSubmit');
    Route::post('/ajaxBackLesingFormSubmit', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxBackLesingFormSubmit'])->name('ajaxBackLesingFormSubmit');
    Route::post('/ajaxTaxiLesingFormSubmit', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxTaxiLesingFormSubmit'])->name('ajaxTaxiLesingFormSubmit');
    Route::get('/ajaxGetCarModel', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxGetCarModel'])->name('ajaxGetCarModel');
    Route::get('/ajaxCheckPromoCode', [App\Http\Controllers\WebControllers\Leasing\LeasingAjaxController::class, 'ajaxCheckPromoCode'])->name('ajaxCheckPromoCode');
    Route::get('/ajaxCarMake', [App\Http\Controllers\WebControllers\Cars\CarsAjaxController::class, 'ajaxCarMake'])->name('ajaxCarMake');
});

Route::group(['prefix' => '/cms'], function() {

    Route::get('/login', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersLogin'])->name('actionUsersLogin');
    Route::post('/login/request', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersLoginRequest'])->name('actionUsersLoginRequest');
    Route::get('/reset', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersReset'])->name('actionUsersReset');
    Route::post('/reset/request', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersResetRequest'])->name('actionUsersResetRequest');
    Route::get('/reset/success', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersResetSuccess'])->name('actionUsersResetSuccess');
    Route::get('/reset/token/{token}/{email}', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersResetForm'])->name('actionUsersResetForm');
    Route::post('/reset/update', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersResetFormSubmit'])->name('actionUsersResetFormSubmit');

    Route::group(['middleware' => 'login'], function() {
        Route::get('/', [App\Http\Controllers\CmsControllers\Main\MainController::class, 'actionMain'])->name('actionMain');

        // USERS
        Route::group(['prefix' => '/users'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersMain'])->name('actionUsersMain');
            Route::get('/view/{id}', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersView'])->name('actionUsersView');
            Route::get('/roles', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersRoles'])->name('actionUsersRoles');
            Route::get('/permissions', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersPermissions'])->name('actionUsersPermissions');
            Route::get('/logout', [App\Http\Controllers\CmsControllers\Users\UsersController::class, 'actionUsersLogout'])->name('actionUsersLogout');
        });

        // PARAMETERS
        Route::group(['prefix' => '/parameters'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\Parameters\ParametersBasicController::class, 'actionParametersBasicMain'])->name('actionParametersBasicMain');
            Route::get('/translate', [App\Http\Controllers\CmsControllers\Parameters\ParametersBasicController::class, 'actionParametersTranslate'])->name('actionParametersTranslate');
            Route::get('/seo', [App\Http\Controllers\CmsControllers\Parameters\ParametersBasicController::class, 'actionParametersSeo'])->name('actionParametersSeo');
        });

        // PARAMETERS
        Route::group(['prefix' => '/reviews'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\Reviews\ReviewsController::class, 'actionReviews'])->name('actionReviews');
        });

        // CARS
        Route::group(['prefix' => '/cars'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\Cars\CarsController::class, 'actionCars'])->name('actionCars');
            Route::get('/add', [App\Http\Controllers\CmsControllers\Cars\CarsController::class, 'actionCarsAdd'])->name('actionCarsAdd');
            Route::get('/edit/{id}', [App\Http\Controllers\CmsControllers\Cars\CarsController::class, 'actionCarsEdit'])->name('actionCarsEdit');
            Route::get('/options', [App\Http\Controllers\CmsControllers\Cars\CarsController::class, 'actionCarsOptions'])->name('actionCarsOptions');
        });

        // BLOG
        Route::group(['prefix' => '/blog'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\Blog\BlogController::class, 'actionBlog'])->name('actionBlog');
            Route::get('/add', [App\Http\Controllers\CmsControllers\Blog\BlogController::class, 'actionBlogAdd'])->name('actionBlogAdd');
            Route::get('/edit/{id}', [App\Http\Controllers\CmsControllers\Blog\BlogController::class, 'actionBlogEdit'])->name('actionBlogEdit');
        });

        // TEXT PAGES
        Route::group(['prefix' => '/text'], function() {
            Route::get('/', [App\Http\Controllers\CmsControllers\TextPage\TextPageController::class, 'actionTextPages'])->name('actionTextPages');
            Route::get('/edit/{id}', [App\Http\Controllers\CmsControllers\TextPage\TextPageController::class, 'actionTextPagesEdit'])->name('actionTextPagesEdit');
        });

        // TEXT PAGES
        Route::group(['prefix' => '/leasing'], function() {
            Route::get('/parameters', [App\Http\Controllers\CmsControllers\Leasing\LasingController::class, 'actionLeasingParameters'])->name('actionLeasingParameters');
            Route::get('/promo', [App\Http\Controllers\CmsControllers\Leasing\LasingController::class, 'actionLeasingPromo'])->name('actionLeasingPromo');
        });
    });

    // AJAX
    Route::group(['prefix' => '/ajax'], function() {
        // USERS
        Route::post('/ajaxUserVerify', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserVerify'])->name('ajaxUserVerify');
        Route::post('/ajaxUserVerifySubmit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserVerifySubmit'])->name('ajaxUserVerifySubmit');
        Route::post('/ajaxUserStatusChange/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserStatusChange'])->name('ajaxUserStatusChange');
        Route::post('/ajaxUserDelete/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserDelete'])->name('ajaxUserDelete');
        Route::post('/ajaxUserSubmit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserSubmit'])->name('ajaxUserSubmit');
        Route::get('/ajaxUserEdit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserEdit'])->name('ajaxUserEdit');
        Route::post('/ajaxRoleSubmit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxRoleSubmit'])->name('ajaxRoleSubmit');
        Route::get('/ajaxRoleEdit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxRoleEdit'])->name('ajaxRoleEdit');
        Route::post('/ajaxRoleDelete/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxRoleDelete'])->name('ajaxRoleDelete');
        Route::get('/ajaxRolePermissions/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxRolePermissions'])->name('ajaxRolePermissions');
        Route::post('/ajaxPermissionSubmit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxPermissionSubmit'])->name('ajaxPermissionSubmit');
        Route::post('/ajaxUserRoleChangeSubmit/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserRoleChangeSubmit'])->name('ajaxUserRoleChangeSubmit');
        Route::post('/ajaxUserSendToCrm/', [App\Http\Controllers\CmsControllers\Users\UsersAjaxController::class, 'ajaxUserSendToCrm'])->name('ajaxUserSendToCrm');

        // MAIN
        Route::get('/ajaxGetMonthRegisteredUsers/', [App\Http\Controllers\CmsControllers\Main\MainAjaxController::class, 'ajaxGetMonthRegisteredUsers'])->name('ajaxGetMonthRegisteredUsers');

        // LEASING
        Route::post('/ajaxLeasingParametersSubmit/', [App\Http\Controllers\CmsControllers\Leasing\LasingAjaxController::class, 'ajaxLeasingParametersSubmit'])->name('ajaxLeasingParametersSubmit');
        Route::post('/ajaxPromoSubmit/', [App\Http\Controllers\CmsControllers\Leasing\PromoCodeAjaxController::class, 'ajaxPromoSubmit'])->name('ajaxPromoSubmit');
        Route::post('/ajaxPromoDelete/', [App\Http\Controllers\CmsControllers\Leasing\PromoCodeAjaxController::class, 'ajaxPromoDelete'])->name('ajaxPromoDelete');
        Route::post('/ajaxPromoStatusChange/', [App\Http\Controllers\CmsControllers\Leasing\PromoCodeAjaxController::class, 'ajaxPromoStatusChange'])->name('ajaxPromoStatusChange');

        // PARAMETERS
        Route::post('/ajaxTranslateSubmit/', [App\Http\Controllers\CmsControllers\Parameters\ParametersAjaxController::class, 'ajaxTranslateSubmit'])->name('ajaxTranslateSubmit');
        Route::post('/ajaxDeleteTranslate/', [App\Http\Controllers\CmsControllers\Parameters\ParametersAjaxController::class, 'ajaxDeleteTranslate'])->name('ajaxDeleteTranslate');
        Route::post('/ajaxTranslateUpdateSubmit/', [App\Http\Controllers\CmsControllers\Parameters\ParametersAjaxController::class, 'ajaxTranslateUpdateSubmit'])->name('ajaxTranslateUpdateSubmit');
        Route::post('/ajaxOptionSubmit/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxOptionSubmit'])->name('ajaxOptionSubmit');
        Route::get('/ajaxOptionValueGet/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxOptionValueGet'])->name('ajaxOptionValueGet');
        Route::post('/ajaxOptionValueSubmit/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxOptionValueSubmit'])->name('ajaxOptionValueSubmit');
        Route::post('/ajaxOptionValueDelete/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxOptionValueDelete'])->name('ajaxOptionValueDelete');
        Route::post('/ajaxOptionSort/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxOptionSort'])->name('ajaxOptionSort');
        
        // CARS
        Route::post('/ajaxCarOptionDelete/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxCarOptionDelete'])->name('ajaxCarOptionDelete');
        Route::get('/ajaxCarMake/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxCarMake'])->name('ajaxCarMake');
        Route::post('/ajaxCarsAddSubmit/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxCarsAddSubmit'])->name('ajaxCarsAddSubmit');
        Route::post('/ajaxCarStatusChange/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxCarStatusChange'])->name('ajaxCarStatusChange');
        Route::post('/ajaxCarDelete/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxCarDelete'])->name('ajaxCarDelete');
        Route::post('/ajaxDeleteGalleryPhoto/', [App\Http\Controllers\CmsControllers\Cars\CarsAjaxController::class, 'ajaxDeleteGalleryPhoto'])->name('ajaxDeleteGalleryPhoto');
        
        // BASIC PARAMETER 
        Route::post('/ajaxBasicParameterSubmit/', [App\Http\Controllers\CmsControllers\Parameters\ParametersAjaxController::class, 'ajaxBasicParameterSubmit'])->name('ajaxBasicParameterSubmit');

        // BLOG
        Route::post('/ajaxBlogSubmit/', [App\Http\Controllers\CmsControllers\Blog\BlogAjaxController::class, 'ajaxBlogSubmit'])->name('ajaxBlogSubmit');

        // REVIEWS
        Route::post('/ajaxReviewDelete/', [App\Http\Controllers\CmsControllers\Reviews\ReviewAjaxController::class, 'ajaxReviewDelete'])->name('ajaxReviewDelete');
        Route::post('/ajaxReviewStatusChange/', [App\Http\Controllers\CmsControllers\Reviews\ReviewAjaxController::class, 'ajaxReviewStatusChange'])->name('ajaxReviewStatusChange');

        // PAGE
        Route::post('/ajaxTextPageSubmit/', [App\Http\Controllers\CmsControllers\TextPage\TextPageAjaxController::class, 'ajaxTextPageSubmit'])->name('ajaxTextPageSubmit');
    });
});