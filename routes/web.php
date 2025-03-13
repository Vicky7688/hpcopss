<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HeadOfficeBranchMasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\SessionMasterController;
use App\Http\Controllers\Master\GroupMasterController;
use App\Http\Controllers\Master\LedgerMasterController;
use App\Http\Controllers\Master\BranchMasterController;
use App\Http\Controllers\Master\UserAgentController;
use App\Http\Controllers\Transactions\JournalVoucharController;
use App\Http\Controllers\Transactions\MemberAccountController;
use App\Http\Controllers\Transactions\KycController;
use App\Http\Controllers\Transactions\ContributionFormController;
use App\Http\Controllers\Report\CashBookController;
use App\Http\Controllers\Report\DayBookController;
use App\Http\Controllers\Report\GerenalLedgerController;
use App\Http\Controllers\Report\ProfitLossController;
use App\Http\Controllers\Report\BalancesheetController;
use App\Http\Controllers\Paginationcontroller;
use App\Http\Controllers\CacheController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'index'])->name('login')->middleware('adminMiddleware');
Route::post('/authlogin',[AuthController::class,'authlogin'])->name('authlogin');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::middleware('adminMiddlewarelogin')->group(function () {
//     Route::get('/clearcache', [CacheController::class, 'clearCache'])->name('clearcache');

//     //______________Head Office && Branches Routes
//     Route::get('/headofficeindex',[HeadOfficeBranchMasterController::class, 'headofficeindex'])->name('headofficeindex');
//     Route::post('/headofficesubmit',[HeadOfficeBranchMasterController::class, 'headofficesubmit'])->name('headofficesubmit');
//     Route::post('/editheadofficesubmit',[HeadOfficeBranchMasterController::class, 'editheadofficesubmit'])->name('editheadofficesubmit');
//     Route::post('/getheadoffice',[HeadOfficeBranchMasterController::class, 'getheadoffice'])->name('getheadoffice');
//     Route::post('/deleteheadoffice',[HeadOfficeBranchMasterController::class, 'deleteheadoffice'])->name('deleteheadoffice');



//     Route::get('/branchindex',[HeadOfficeBranchMasterController::class, 'branchindex'])->name('branchindex');
//     Route::post('/branchsubmit',[HeadOfficeBranchMasterController::class, 'branchsubmit'])->name('branchsubmit');
//     Route::post('/editbranchsubmit',[HeadOfficeBranchMasterController::class, 'editbranchsubmit'])->name('editbranchsubmit');
//     Route::post('/getbranch',[HeadOfficeBranchMasterController::class, 'getbranch'])->name('getbranch');
//     Route::post('/deletebranch',[HeadOfficeBranchMasterController::class, 'deletebranch'])->name('deletebranch');



//     Route::any('/sharemaster',[HeadOfficeBranchMasterController::class, 'sharemaster'])->name('sharemaster');
//     Route::any('/sharesubmit',[HeadOfficeBranchMasterController::class, 'sharesubmit'])->name('sharesubmit');
//     Route::any('/getshare',[HeadOfficeBranchMasterController::class, 'getshare'])->name('getshare');
//     Route::any('/deleteshare',[HeadOfficeBranchMasterController::class, 'deleteshare'])->name('deleteshare');
//     Route::any('/editsharesubmit',[HeadOfficeBranchMasterController::class, 'editsharesubmit'])->name('editsharesubmit');


//     //______________Dashboard and Auth

//     Route::get('/form', [Paginationcontroller::class, 'form'])->name('form');
//     Route::get('/formget', [Paginationcontroller::class, 'formget'])->name('formget');


//     //_________Branch Master Routes
//     // Route::get('/branchindex', [BranchMasterController::class, 'branchindex'])->name('branchindex');



//     //_________User's / Agents Master Routes
//     Route::get('/useragentindex', [UserAgentController::class, 'useragentindex'])->name('useragentindex');




//     //_________Session Master
//     Route::get('/session', [SessionMasterController::class, 'session'])->name('session');
//     Route::post('/sessioninsert', [SessionMasterController::class, 'sessioninsert'])->name('sessioninsert');
//     Route::post('/editsession', [SessionMasterController::class, 'editsession'])->name('editsession');
//     Route::post('/sessionupdate', [SessionMasterController::class, 'sessionupdate'])->name('sessionupdate');

//     //__________Group Master
//     Route::get('/groupindex', [GroupMasterController::class, 'groupindex'])->name('groupindex');
//     Route::post('/generategroupcode', [GroupMasterController::class, 'generategroupcode'])->name('generategroupcode');
//     Route::post('/groupinsert', [GroupMasterController::class, 'groupinsert'])->name('groupinsert');
//     Route::post('/editgroup', [GroupMasterController::class, 'editgroup'])->name('editgroup');
//     Route::post('/groupupdate', [GroupMasterController::class, 'groupupdate'])->name('groupupdate');
//     Route::post('/deletegroup', [GroupMasterController::class, 'deletegroup'])->name('deletegroup');

//     //________Ledger Master
//     Route::get('/ledgerindex', [LedgerMasterController::class, 'ledgerindex'])->name('ledgerindex');
//     Route::post('/generateledgercode', [LedgerMasterController::class, 'generateledgercode'])->name('generateledgercode');
//     Route::post('/ledgerInsert', [LedgerMasterController::class, 'ledgerInsert'])->name('ledgerInsert');
//     Route::post('/editledger', [LedgerMasterController::class, 'editledger'])->name('editledger');
//     Route::post('/updateledger', [LedgerMasterController::class, 'updateledger'])->name('updateledger');
//     Route::post('/deleteledger', [LedgerMasterController::class, 'deleteledger'])->name('deleteledger');



//     //________Member Account Routes
//     Route::get('/memberaccountindex', [MemberAccountController::class, 'memberaccountindex'])->name('memberaccountindex');
//     Route::get('/get-kyc-suggestions', [MemberAccountController::class, 'getkycsuggestions'])->name('get-kyc-suggestions');
//     Route::get('/get-kyc-details', [MemberAccountController::class, 'getkycdetails'])->name('getkycdetails');
//     // Route::any('/sharelistget', [MemberAccountController::class, 'sharelistget'])->name('sharelistget');
//     Route::any('/submitmembershipform', [MemberAccountController::class, 'submitmembershipform'])->name('submitmembershipform');





//     //________KYC  Routes
//     Route::get('/kycindex', [KycController::class, 'kycindex'])->name('kycindex');
//     Route::post('/getcities',[KycController::class, 'getcities'])->name('getcities');
//     Route::post('/kycdatainsert',[KycController::class, 'kycdatainsert'])->name('kycdatainsert');
//     Route::post('/editkyc',[KycController::class, 'editkyc'])->name('editkyc');
//     Route::post('/kycdataupdate',[KycController::class, 'kycdataupdate'])->name('kycdataupdate');
//     Route::post('/deletekyc',[KycController::class, 'deletekyc'])->name('deletekyc');



//     //____________Contributions Form Routes
//     Route::get('/contributionIndex',[ContributionFormController::class, 'contributionIndex'])->name('contributionIndex');



//     //________________________________Reports Routes____________________________

//     //____________Cash Book
//     // Route::get('/cashbookindex', [CashBookController::class, 'cashbookindex'])->name('cashbookindex');

//     //____________Day Book
//     // Route::get('/daybookindex', [DayBookController::class, 'daybookindex'])->name('daybookindex');

//     //____________Gerenal Ledgers
//     // Route::get('/gerenalledgerIndex', [GerenalLedgerController::class, 'gerenalledgerIndex'])->name('gerenalledgerIndex');

//     //____________Trail Balance Routes
//     // Route::get('/trailbalanceIndex', [TrailBalanceController::class, 'trailbalanceIndex'])->name('trailbalanceIndex');


//     //____________Profit & Loss Routes
//     // Route::get('/profitlossIndex', [ProfitLossController::class, 'profitlossIndex'])->name('profitlossIndex');


//      //____________Profit & Loss Routes
//     //  Route::get('/balancesheetIndex', [BalancesheetController::class, 'balancesheetIndex'])->name('balancesheetIndex');



// });

