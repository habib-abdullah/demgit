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
|--------------------------------------------------------------------------
| Al-Chishty Engineering Routes
|--------------------------------------------------------------------------
 */
Route::get('hello', 'EmployeMaster\EmployeMasterController@hello');
Route::view('demo', 'demo_cropie');
Route::post('image_crop/upload', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@upload')->name('image_crop.upload');
// Route::get('test','EmployeeBank\EmployeeBankController@test');
// User Login And Register Authentication

Route::view("/", 'Authentication.Login')->name('Login');
Route::view("/Login", 'Authentication.Login')->name('Login');
Route::post('LoginPost', 'Authentication\AuthController@LoginPost')->name('LoginPost');
Route::get('Logout', 'Authentication\AuthController@Logout')->name('Logout');

Route::view("Register", 'Authentication.Register')->name('Register');
Route::post('RegisterPost', 'Authentication\AuthController@RegisterPost')->name('RegisterPost');


// main  user Profile Upadte
// Route::post('profile_update','Admin\AdminController@ProfileUpdate');
/** Owner Admin Routes */
Route::group(["prefix" => "Admin", "middleware" => "AdminMiddleware"], function () {

    // User Profile
    Route::get('Profile','Admin\AdminController@Profile');
    Route::post('Profile-Update','Admin\AdminController@ProfileUpdate');
    // User Profile

    Route::get("Dashboard", "Admin\AdminController@Dashboard")->name('Admin.Dashboard');

    Route::get("Users", "Admin\AdminController@Users")->name('Admin.Users');

    // Company Site
    Route::get('CompanySite','CompanySite\CompanysiteController@CompanySite');
    Route::get('CompanySite-Show','CompanySite\CompanysiteController@CompanySiteShow');
    Route::post('Company-Store', 'CompanySite\CompanysiteController@CompanyStore');
    Route::get('Company-{site_id}-Edit', 'CompanySite\CompanysiteController@ComapnyEdit')->name('Department-Edit');
    Route::post('Comapny-Update', 'CompanySite\CompanysiteController@CompanyUpdate')->name('Comapny-Update');
    Route::get('Company-Remove', 'CompanySite\CompanysiteController@CompanyRemove')->name('Company-Remove');
    Route::get('Company-{site_id}-View', 'CompanySite\CompanysiteController@ComapnyView')->name('Department-View');

    //Designation Routes
    Route::get('DesignationCreate', 'EmployeeMaster\Designation\DesignationController@Designation')->name('Designation-Create');
    Route::get('DesignationReport', 'EmployeeMaster\Designation\DesignationController@DesignationReport')->name('Designation-Report');
    Route::post('DesignationStore', "EmployeeMaster\Designation\DesignationController@DesignationStore")->name('Designation-Store');
    Route::get('DesignationEdit', "EmployeeMaster\Designation\DesignationController@DesignationEdit")->name('Designation-Edit');
    Route::post('DesignationUpdate', "EmployeeMaster\Designation\DesignationController@DesignationUpdate")->name('Designation-Update');
    Route::get('DesignationRemove', "EmployeeMaster\Designation\DesignationController@DesignationRemove")->name('Designation-Remove');

    //Employee Routes
    Route::get('EmployeMaster', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@Employee')->name('Employe-Master-Show');
    Route::get('EmployeeCreate', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeCreate')->name('Employee-Create');

    // employee details store
    Route::post('EmployeeStore', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeStore')->name('Employee-Store');
    // employee profile image update
    Route::get('Employee-{employee_id}-Profile', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeProfile')->name('Employee-Profile');
    Route::post('Employee-Profile-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeProfileStore')->name('Employee-Profile-Store');
    // employee passport update
    Route::get('Employee-{employee_id}-Passport', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeePassport')->name('Employee-Passport');
    Route::post('Employee-Passport-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeePassportStore')->name('Employee-Passport-Store');
    // employee residency update
    Route::get('Employee-{employee_id}-Residency', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeResidency')->name('Employee-Residency');
    Route::post('Employee-Residency-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeResidencyStore')->name('Employee-Residency-Store');
    // employee mol record update
    Route::get('Employee-{employee_id}-Mol-Record', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeMolRecord')->name('Employee-Mol-Record');
    Route::post('Employee-Mol-Record-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeMolRecordStore')->name('Employee-Mol-Record-Store');
    // employee health update
    Route::get('Employee-{employee_id}-Health', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeHealth')->name('Employee-Health');
    Route::get('Height-Edit', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@HeightEdit')->name('Height-Edit');
    Route::post('Employee-Health-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeHealthStore')->name('Employee-Health-Store');
    // employee contact update
    Route::get('Employee-{employee_id}-Contact', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeContact')->name('Employee-Contact');
    Route::post('Employee-Contact-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeContactStore')->name('Employee-Contact-Store');
    // employee bank update
    Route::get('Employee-{employee_id}-Bank', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeBank')->name('Employee-Bank');
    Route::post('Employee-Bank-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeBankStore')->name('Employee-Bank-Store');
    // employee login detail update
    Route::get('Employee-{employee_id}-Login-Detail', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeLoginDetail')->name('Employee-Login-Detail');
    Route::post('Employee-Login-Detail-Store', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeLoginDetailStore')->name('Employee-Login-Detail-Store');

    Route::get('Employee-{employee_id}-Edit-Detail', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeePersonalDetails')->name('Employee-Edit-Detail');

    Route::get('EmployeeReport', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeReport')->name('Employee-Report');
    Route::get('Employee-{id}-Edit', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeEdit')->name('Employee-Edit');
    Route::post('EmployeeUpdate', "EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeUpdate")->name('Employee-Update');
    Route::get('EmployeeRemove', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeRemove')->name('Employee-Remove');
    Route::get('Employee-{id}-Profile-Details', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@EmployeeDetails')->name('Employee-Profile-Details');
    
    Route::get('testExpire', 'EmployeeMaster\EmployeeDetail\EmployeMasterController@testExpire');


    //Visitors Routes
    Route::get('Visitor-Log', 'Visitor\VisitorController@Visitor')->name('Visitor-Log');
    Route::post('Visitor-Log-Store', 'Visitor\VisitorController@VisitorStore')->name('Visitor-Log-Store');
    Route::get('Visitor-Log-Show', 'Visitor\VisitorController@VisitorShow')->name('Visitor-Log-Show');
    Route::get('Visitor-Log-{visitor_id}-Edit', 'Visitor\VisitorController@VisitorEdit')->name('Visitor-Log-Edit');
    Route::post('Visitor-Log-Update', "Visitor\VisitorController@VisitorUpdate")->name('Visitor-Log-Update');
    Route::get('Visitor-Log-{visitor_id}-View', 'Visitor\VisitorController@VisitorView')->name('Visitor-Log-View');
    Route::get('Visitor-Log-Attachemnt-Remove', 'Visitor\VisitorController@VisitorAttachemntRemove')->name('Visitor-Log-Attachemnt-Remove');

    //Employee Bank
    Route::get('Employee-Bank-Show', 'EmployeeMaster\EmployeeBank\EmployeeBankController@BankShow')->name('Employee-Bank-Show');
    Route::get('Employee-Bank-Create', 'EmployeeMaster\EmployeeBank\EmployeeBankController@BankCreate')->name('Employee-Bank-Create');
    // Route::post('Employee-Bank-Store', 'EmployeeMaster\EmployeeBank\EmployeeBankController@BankStore')->name('Employee-Bank-Store');
    Route::get('Bank-Report', 'EmployeeMaster\EmployeeBank\EmployeeBankController@BankReport')->name('Bank-Report');
    Route::get('Bank-Account-Detail', 'EmployeeMaster\EmployeeBank\EmployeeBankController@BankAccontDetail')->name('Bank-Account-Detail');
    Route::get('EmployeeBank/{emp_bank_id}/Edit', "EmployeeMaster\EmployeeBank\EmployeeBankController@EmployeeBankEdit")->name('Employee-Bank-Edit');
    Route::post('Employee-Bank-Detail-Update', 'EmployeeMaster\EmployeeBank\EmployeeBankController@EmployeeBankDetailUpdate')->name('Employee-Bank-Detail-Update');
    Route::get('GetEmployeeProfilePicture/{id}', 'EmployeeMaster\EmployeeBank\EmployeeBankController@GetEmployeeProfilePicture');
    Route::get('EmployeeBankRemove', 'EmployeeMaster\EmployeeBank\EmployeeBankController@EmployeeBankRemove')->name('Employee-Bank-Remove');

    //Employee-Contact-detail-Routes
    Route::get('Employee-Contact-Detail-Show', 'EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactShow')->name('Employee-Contact-Detail-Show');
    Route::get('Employe-Contact-Detail-Create', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactCreate")->name('Employe-Contact-Detail-Create');
    Route::post('Employee-Contact-Store-oldRoute-checkthis', 'EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactStore')->name('Employee-Contact-Store-oldRoute-checkthis');
    Route::get('Employee-Contact-Report', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@ContactReport")->name('Employee-Contact-Report');
    Route::get('EmployeeContactRemove', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactRemove")->name('Employee-Contact-Remove');

    Route::get('EmployeeContact/{id}/Edit', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactEdit")->name('Employee-Contact-Edit');

    Route::post('Employee-Contact-Detail-Update', 'EmployeeMaster\EmployeeDetail\EmployeeContactDetail@EmployeeContactUpdate')->name('Employee-Contact-Detail-Update');
    
    // Main  Employee Additional Inormation
    Route::get('Addtional-Info-Show', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@AddtionalInfoShow")->name('Addtional-Info-Show');
    Route::post('Additionalinfo-Store', 'EmployeeMaster\EmployeeDetail\EmployeeContactDetail@AdditionalinfoStore')->name('Additionalinfo-Store');
    Route::get('AdditionalInfo-{contact_id}-Edit', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@AddtionalInfoEdit")->name('AdditionalInfo-Edit');
    Route::post('AdditionalInfo-Update', 'EmployeeMaster\EmployeeDetail\EmployeeContactDetail@AdditionalinfoUpdate')->name('AdditionalInfo-Update');
    Route::get('AdditionalInfo-Remove', "EmployeeMaster\EmployeeDetail\EmployeeContactDetail@AddtionalInfoRemove")->name('AdditionalInfo-Remove');


    // document crud
    Route::get('Employee-Document', 'EmployeeMaster\DocumentController@Document')->name('Employee-Document');
    Route::get('Employee-List', 'EmployeeMaster\DocumentController@EmployeeList')->name('Employee-List');
    Route::get('Employee-Document-Create', 'EmployeeMaster\DocumentController@DocumentCreate')->name('Employee-Document-Create');

    Route::get('Employee/{employee_id}/Document-Create', 'EmployeeMaster\DocumentController@DocumentCreateId');
    Route::post('Employee-Document-Store', 'EmployeeMaster\DocumentController@DocumentStore')->name('Employee-Document-Store');

    Route::get('Employee/{employee_id}/Documents', 'EmployeeMaster\DocumentController@EmployeeDocuments');
    Route::get('Employee-Documents-Show', 'EmployeeMaster\DocumentController@EmployeeDocumentsShow')->name('Employee-Documents-Show');
    Route::get('Employee-Document-Remove', 'EmployeeMaster\DocumentController@EmployeeDocumentsRemove')->name('Employee-Document-Remove');

    // document category crud
    Route::get('Employee-Document-Category', 'EmployeeMaster\DocumentController@DocumentCategory')->name('Employee-Document-Category');
    Route::get('Document-Category-Show', 'EmployeeMaster\DocumentController@DocumentCategoryShow')->name('Document-Category-Show');
    Route::post('Document-Category-Store', 'EmployeeMaster\DocumentController@DocumentCategoryStore')->name('Document-Category-Store');
    Route::get('Document-Category-Remove', 'EmployeeMaster\DocumentController@DocumentCategoryRemove')->name('Document-Category-Remove');


    // employee shift
    Route::get('Employee-Shifts', 'EmployeeMaster\EmployeeShiftController@Shift')->name('Employee-Shifts');
    Route::get('Employee-Shift-Show', 'EmployeeMaster\EmployeeShiftController@ShiftShow')->name('Employee-Shift-Show');

    // clients management
    Route::get('Client-Countries', 'Client\ClientController@ClientCountries')->name('Client-Countries');

    Route::get('Client', 'Client\ClientController@Client')->name('Client');
    Route::get('Client-Show', 'Client\ClientController@ClientShow')->name('Client-Show');
    Route::get('Client-Create', 'Client\ClientController@ClientCreate')->name('Client-Create');
    Route::post('Client-Store', 'Client\ClientController@ClientStore')->name('Client-Store');
    Route::get('Client-{client_id}-Edit', 'Client\ClientController@ClientEdit')->name('Client-Edit');
    Route::post('Client-Update', 'Client\ClientController@ClientUpdate')->name('Client-Update');
    Route::get('Client-Remove', 'Client\ClientController@ClientRemove')->name('Client-Remove');
    Route::get('ClientDocument-{document_id}-Remove', 'Client\ClientController@ClientdocumentRemove')->name('Client-document-Remove');

    // client documents management
    Route::get('Client-{client_id}-Documents', 'Client\ClientController@ClientDocuments')->name('Client-Documents');
    Route::post('Client-Document-Store', 'Client\ClientController@ClientDocumentStore')->name('Client-Document-Store');

    // client profile view
    Route::get('Client-{client_id}-Profile', 'Client\ClientController@ClientProfile')->name('Client-Profile');

    // client contact managent
    Route::post('Client-Contact-Store', 'Client\ContactController@ClientContactStore')->name('Client-Contact-Store');
    Route::get('Client-Contact-Show', 'Client\ContactController@ClientContactShow')->name('Client-Contact-Show');
    Route::get('Client-Contact-{client_id}-Edit', 'Client\ContactController@ClientContactEdit')->name('Client-Contact-Edit');
    Route::post('Client-Contact-Update', 'Client\ContactController@ClientContactUpdate')->name('Client-Contact-Update');
    Route::get('Client-Contact-Remove', 'Client\ContactController@ClientContactRemove')->name('Client-Contact-Remove');

    // client bank management
    Route::post('Client-Bank-Store', 'Client\BankController@ClientBankStore')->name('Client-Bank-Store');
    Route::get('Client-Bank-Show', 'Client\BankController@ClientBankShow')->name('Client-Bank-Show');
    Route::get('Client-Bank-{client_id}-Edit', 'Client\BankController@ClientBankEdit')->name('Client-Bank-Edit');
    Route::post('Client-Bank-Update', 'Client\BankController@ClientBankUpdate')->name('Client-Bank-Update');
    Route::get('Client-Bank-Remove', 'Client\BankController@ClientBankRemove')->name('Client-Bank-Remove');

    /** Setup management */
    // UOM management
    Route::get('UOM', 'Setup\UOMController@UOM')->name('UOM');
    Route::get('UOM-Show', 'Setup\UOMController@UOMShow')->name('UOM-Show');
    Route::post('UOM-Store', 'Setup\UOMController@UOMStore')->name('UOM-Store');
    Route::get('UOM-{uom_id}-Edit', 'Setup\UOMController@UOMEdit')->name('UOM-Edit');
    Route::post('UOM-Update', 'Setup\UOMController@UOMUpdate')->name('UOM-Update');
    Route::get('UOM-Remove', 'Setup\UOMController@UOMRemove')->name('UOM-Remove');
    Route::get('UOM-{uom_id}-View', 'Setup\UOMController@UOMView')->name('UOM-View');

    // Operations management
    Route::get('Operation', 'Setup\OperationController@Operation')->name('Operation');
    Route::get('Operation-Show', 'Setup\OperationController@OperationShow')->name('Operation-Show');
    Route::post('Operation-Store', 'Setup\OperationController@OperationStore')->name('Operation-Store');
    Route::get('Operation-{operation_id}-Edit', 'Setup\OperationController@OperationEdit')->name('Operation-Edit');
    Route::post('Operation-Update', 'Setup\OperationController@OperationUpdate')->name('Operation-Update');
    Route::get('Operation-Remove', 'Setup\OperationController@OperationRemove')->name('Operation-Remove');
    Route::get('Operation-{operation_id}-View', 'Setup\OperationController@OperationView')->name('Operation-View');

    // Department management
    Route::get('Department', 'Setup\DepartmentController@Department')->name('Department');
    Route::get('Department-Show', 'Setup\DepartmentController@DepartmentShow')->name('Department-Show');
    Route::post('Department-Store', 'Setup\DepartmentController@DepartmentStore')->name('Department-Store');
    Route::get('Department-{department_id}-Edit', 'Setup\DepartmentController@DepartmentEdit')->name('Department-Edit');
    Route::post('Department-Update', 'Setup\DepartmentController@DepartmentUpdate')->name('Department-Update');
    Route::get('Department-Remove', 'Setup\DepartmentController@DepartmentRemove')->name('Department-Remove');
    Route::get('Department-{department_id}-View', 'Setup\DepartmentController@DepartmentView')->name('Department-View');

    // Machine management
    Route::get('Machine', 'Setup\MachineController@Machine')->name('Machine');
    Route::get('Machine-Show', 'Setup\MachineController@MachineShow')->name('Machine-Show');
    Route::post('Machine-Store', 'Setup\MachineController@MachineStore')->name('Machine-Store');
    Route::get('Machine-{machine_id}-Edit', 'Setup\MachineController@MachineEdit')->name('Machine-Edit');
    Route::post('Machine-Update', 'Setup\MachineController@MachineUpdate')->name('Machine-Update');
    Route::get('Machine-Remove', 'Setup\MachineController@MachineRemove')->name('Machine-Remove');
    Route::get('Machine-{machine_id}-View', 'Setup\MachineController@MachineView')->name('Machine-View');

    // Shift management
    Route::get('Shift', 'Setup\ShiftController@Shift')->name('Shift');
    Route::get('Shift-Show', 'Setup\ShiftController@ShiftShow')->name('Shift-Show');
    Route::post('Shift-Store', 'Setup\ShiftController@ShiftStore')->name('Shift-Store');
    Route::get('Shift-{shift_id}-Edit', 'Setup\ShiftController@ShiftEdit')->name('Shift-Edit');
    Route::post('Shift-Update', 'Setup\ShiftController@ShiftUpdate')->name('Shift-Update');
    Route::get('Shift-Remove', 'Setup\ShiftController@ShiftRemove')->name('Shift-Remove');
    Route::get('Shift-{shift_id}-View', 'Setup\ShiftController@ShiftView')->name('Shift-View');

    /**Inventory management */

    // items grade management
    Route::get('Items-Grades', 'Inventory\GradesController@Grades')->name('Items-Grades');
    Route::get('Grades-Show', 'Inventory\GradesController@GradesShow')->name('Grades-Show');
    Route::post('Grades-Store', 'Inventory\GradesController@GradesStore')->name('Grades-Store');
    Route::get('Grades-{grades_id}-Edit', 'Inventory\GradesController@GradesEdit')->name('Grades-Edit');
    Route::post('Grades-Update', 'Inventory\GradesController@GradesUpdate')->name('Grades-Update');
    Route::get('Grades-Remove', 'Inventory\GradesController@GradesRemove')->name('Grades-Remove');
    Route::get('Grades-{grades_id}-View', 'Inventory\GradesController@GradesView')->name('Grades-View');

    // items grade management
    Route::get('Items-Sizes', 'Inventory\SizeController@Size')->name('Items-Sizes');
    Route::get('Size-Show', 'Inventory\SizeController@SizeShow')->name('Size-Show');
    Route::post('Size-Store', 'Inventory\SizeController@SizeStore')->name('Size-Store');
    Route::get('Size-{size_id}-Edit', 'Inventory\SizeController@SizeEdit')->name('Size-Edit');
    Route::post('Size-Update', 'Inventory\SizeController@SizeUpdate')->name('Size-Update');
    Route::get('Size-Remove', 'Inventory\SizeController@SizeRemove')->name('Size-Remove');
    Route::get('Size-{size_id}-View', 'Inventory\SizeController@SizeView')->name('Size-View');

    // items management
    Route::get('Items', 'Inventory\ItemController@Item')->name('Items');
    Route::get('Item-Show', 'Inventory\ItemController@ItemShow')->name('Item-Show');
    Route::post('Item-Store', 'Inventory\ItemController@ItemStore')->name('Item-Store');
    Route::get('Item-{item_id}-Edit', 'Inventory\ItemController@ItemEdit')->name('Item-Edit');
    Route::post('Item-Update', 'Inventory\ItemController@ItemUpdate')->name('Item-Update');
    Route::get('Item-Remove', 'Inventory\ItemController@ItemRemove')->name('Item-Remove');
    Route::get('Item-{item_id}-View', 'Inventory\ItemController@ItemView')->name('Item-View');

    // Purchase 
    Route::get('Purchase', 'Purchase\PurchaseController@purchase')->name('Purchase');
    Route::get('Purchase-Show', 'Purchase\PurchaseController@PurchaseShow')->name('Purchase-Show');
    Route::post('Purchase-Store', 'Purchase\PurchaseController@PurchaseStore')->name('Purchase-Store');
    Route::get('Purchase-Edit', 'Purchase\PurchaseController@PurchaseEdit')->name('Purchase-Edit');
    Route::get('Purchase-View', 'Purchase\PurchaseController@PurchaseView')->name('Purchase-View');
    Route::post('Purchase-Update', 'Purchase\PurchaseController@PurchaseUpdate')->name('Purchase-Update');
    Route::get('Purchase-Remove', 'Purchase\PurchaseController@PurchaseRemove')->name('Purchase-Remove');
    
    // Salse and Order
    Route::get('Sales-Order-Create', 'SalesOrder\SalesOrderController@SaleOrder')->name('Sale-Order');
    Route::get('Sales-Order', 'SalesOrder\SalesOrderController@SalesOrder')->name('Sales-Order');
    Route::get('SalesOrder-Show', 'SalesOrder\SalesOrderController@SalesOrderShow')->name('SalesOrder-Show');
    Route::post('SalesOrder-Store', 'SalesOrder\SalesOrderController@SalesOrderStore')->name('SalesOrder-Store');
    Route::get('SalesOrder-{sales_order_id}-Edit', 'SalesOrder\SalesOrderController@SalesOrderEdit');
    Route::post('SalesOrder-Update', 'SalesOrder\SalesOrderController@SalesOrderUpdate')->name('SalesOrder-Update');
    Route::get('SalesOrderItem-Show', 'SalesOrder\SalesOrderController@SalesOrderItemShow')->name('SalesOrderItem-Show');
    Route::post('SalesOrderItem-Store', 'SalesOrder\SalesOrderController@SalesOrderItemStore')->name('SalesOrderItem-Store');
    Route::get('SalesOrderItem-Edit', 'SalesOrder\SalesOrderController@SalesOrderItemEdit')->name('SalesOrderItem-Edit');
    Route::post('SalesOrderItem-Update', 'SalesOrder\SalesOrderController@SalesOrderItemUpdate')->name('SalesOrderItem-Update');
    Route::get('SalesOrderItem-Remove', 'SalesOrder\SalesOrderController@SalesOrderItemRemove')->name('SalesOrderItem-Remove');
    Route::get('SalesOrder-{sales_order_id}-View', 'SalesOrder\SalesOrderController@SalesOrderView')->name('SalesOrder-View');
    Route::get('SalesOrde-Remove', 'SalesOrder\SalesOrderController@SalesOrderRemove')->name('SalesOrde-Remove');
    Route::get('SalesOrderItem-Details', 'SalesOrder\SalesOrderController@SalesOrderDetails')->name('SalesOrderItem-Details');


    // Sales Order File Crud
    Route::get('SalesOrderItemFile-Show', 'SalesOrder\SalesOrderController@SalesOrderItemFileShow')->name('SalesOrderItemFile-Show');
    Route::post('SalesOrderItemFile-Store', 'SalesOrder\SalesOrderController@SalesOrderItemFileStore')->name('SalesOrderItemFile-Store');
    Route::get('SalesOrderItemFile-Remove', 'SalesOrder\SalesOrderController@SalesOrderItemFileRemove')->name('SalesOrderItemFile-Remove');

    /******************** Pre-Sales Inquiry Routes ******************************/

    //Pre-Sales Inquiry Routes
    Route::get('Sales-Inquiry','SalesInquiry\SalesInquiryController@SalesInquiry')->name('Sales-Inquiry');
    Route::get('Sales-Inquiry/Create','SalesInquiry\SalesInquiryController@SalesInquiryCreate')->name('SalesInquiry-Create');
    Route::get('SalesInquiry-Show', 'SalesInquiry\SalesInquiryController@SalesInquiryShow')->name('SalesInquiry-Show');
    Route::post('SalesInquiry-Store', 'SalesInquiry\SalesInquiryController@SalesInquiryStore')->name('SalesInquiry-Store');
    Route::post('SalesInquiry-Update', 'SalesInquiry\SalesInquiryController@SalesInquiryUpdate')->name('SalesInquiry-Update');
    Route::get('SalesInquiry-Remove', 'SalesInquiry\SalesInquiryController@SalesInquiryRemove')->name('SalesInquiry-Remove');
    Route::get('Calc', 'SalesInquiry\EstimateMaterialController@Calc');
    // inquiry file upload route
    Route::get('SalesInquiry-File-Show', 'SalesInquiry\SalesInquiryController@SalesInquiryFileShow')->name('SalesInquiry-File-Show');
    Route::post('SalesInquiry-File-Store', 'SalesInquiry\SalesInquiryController@SalesInquiryFileStore')->name('SalesInquiry-File-Store');
    Route::get('SalesInquiry-File-Remove', 'SalesInquiry\SalesInquiryController@SalesInquiryFileRemove')->name('SalesInquiry-File-Remove');

    // Inquiery Items Estimation Routes
    Route::get('Sales-Inquiry-{inquiry_id}-Estimation', 'SalesInquiry\EstimateMaterialController@Estimation')->name('Sales-Inquiry-Estimation');
    Route::get('Estimation-Item-Show', 'SalesInquiry\EstimateMaterialController@EstimationItemShow')->name('Estimation-Item-Show');
    Route::get('Estimation-{item_id}-Setup', 'SalesInquiry\EstimateMaterialController@EstimationSetup')->name('Sales-Inquiry-Estimation-Setup');
    // Inquiery Material Estimation Routes
    Route::get('Estimation-Material-Show', 'SalesInquiry\EstimateMaterialController@EstimationMaterialShow')->name('Estimation-Material-Show');
    Route::post('Estimation-Material-Store', 'SalesInquiry\EstimateMaterialController@EstimationMaterialStore')->name('Estimation-Material-Store');
    Route::get('Estimation-Material-{estimate_id}-Edit', 'SalesInquiry\EstimateMaterialController@EstimationMaterialEdit');
    Route::post('Estimation-Material-Update', 'SalesInquiry\EstimateMaterialController@EstimationMaterialUpdate')->name('Estimation-Material-Update');
    Route::get('Estimation-Material-Remove', 'SalesInquiry\EstimateMaterialController@EstimationMaterialRemove')->name('Estimation-Material-Remove');
    // Inquiery Hour Estimation Routes
    Route::get('Estimation-Hour-Show', 'SalesInquiry\EstimateHourController@EstimationHourShow')->name('Estimation-Hour-Show');
    Route::post('Estimation-Hour-Store', 'SalesInquiry\EstimateHourController@EstimationHourStore')->name('Estimation-Hour-Store');
    Route::get('Estimation-Hour-{estimate_id}-Edit', 'SalesInquiry\EstimateHourController@EstimationHourEdit');
    Route::post('Estimation-Hour-Update', 'SalesInquiry\EstimateHourController@EstimationHourUpdate')->name('Estimation-Hour-Update');
    Route::get('Estimation-Hour-Remove', 'SalesInquiry\EstimateHourController@EstimationHourRemove')->name('Estimation-Hour-Remove');

    Route::get('SalesInquiry-{inquiry_id}-Edit', 'SalesInquiry\SalesInquiryController@SalesInquiryEdit')->name('SalesInquiry-Edit');
    
    Route::get('SalesInquiryItem-Show', 'SalesInquiry\SalesInquiryController@SalesInquiryItemShow')->name('SalesInquiryItem-Show');
    Route::post('SalesInquiryItem-Store', 'SalesInquiry\SalesInquiryController@SalesInquiryItemStore')->name('SalesInquiryItem-Store');
    
    Route::get('SalesInquiryItem-Edit', 'SalesInquiry\SalesInquiryController@SalesInquiryItemEdit')->name('SalesInquiryItem-Edit');
    Route::get('SalesInquiryItem-View', 'SalesInquiry\SalesInquiryController@SalesInquiryItemView')->name('SalesInquiryItem-View');
    Route::post('SalesInquiryItem-Update', 'SalesInquiry\SalesInquiryController@SalesInquiryItemUpdate')->name('SalesInquiryItem-Update');
    
    Route::get('SalesInquiryItem-Remove', 'SalesInquiry\SalesInquiryController@SalesInquiryItemRemove')->name('SalesInquiryItem-Remove');
    Route::get('SalesInquiryItemDocument-Remove', 'SalesInquiry\SalesInquiryController@SalesInquiryItemDocumentRemove')->name('SalesInquiryItemDocument-Remove');
    

});
// Master Routes
Route::group(["prefix" => "Master", "middleware" => "MasterMiddleware"], function () {
    Route::get("Dashboard", "Master\MasterController@Dashboard")->name('Master.Dashboard');

});
// Distributor Routes
Route::group(["prefix" => "Distributor", "middleware" => "DistributorMiddleware"], function () {
    Route::get("Dashboard", "Distributor\DistributorController@Dashboard")->name('Distributor.Dashboard');
});
//Retailer Routes
Route::group(["prefix" => "Retailer", "middleware" => "RetailerMiddleware"], function () {
    Route::get("Dashboard", "Retailer\RetailerController@Dashboard")->name('Retailer.Dashboard');
});