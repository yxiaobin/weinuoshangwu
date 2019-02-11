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

//管理员登录模块
Route::get('/login',['as'=>"login",'uses'=>"AdminController@LoginIndex"]);
Route::post('/login',['as'=>"login",'uses'=>"AdminController@Login"]);

//设置中间件防止越权登录
Route::middleware(['web','CheckAdminLogin'])->group(function (){

//  管理员主页
    Route::get('/adminindex',['as'=>"adminindex",'uses'=>"AdminController@AdminIndex"]);
//  注销登录
    Route::get('/logout',['as'=>"logout",'uses'=>"AdminController@logout"]);

//  管理员增删改查模块
    Route::get('/memberadmin',['as'=>"memberadmin",'uses'=>"MemberController@memberindex"]);
    Route::post('/memberadmin',['as'=>"memberadmin",'uses'=>"MemberController@memberstore"]);
    Route::get('/memberadmindelete/{id}',['as'=>"memberadmindelete",'uses'=>"MemberController@memberadmindelete"]);
//  职员推荐增删改查模块
    Route::get('/membershow',['as'=>"membershow",'uses'=>"MemberController@membershowindex"]);
    Route::post('/membershow',['as'=>"membershow",'uses'=>"MemberController@membershowstore"]);
    Route::get('/membershowdelete/{id}',['as'=>"membershowdelete",'uses'=>"MemberController@membershowdelete"]);
//  人员信息修改
    Route::get('/memberinfo/{id}',['as'=>"memberinfo",'uses'=>"MemberController@memberinfoindex"]);
    Route::post('/memberinfo/{id}',['as'=>"memberinfo",'uses'=>"MemberController@memberinfostore"]);


//    幻灯片管理
    Route::get('/ppt',['as'=>"ppt",'uses'=>"PptController@PptIndex"]);
    Route::post('/addppt',['as'=>"addppt",'uses'=>"PptController@PptAdd"]);
    Route::get('/pptshow/{id}',['as'=>"pptshow",'uses'=>"PptController@PptShow"]);
    Route::get('/pptup/{id}',['as'=>"pptshow",'uses'=>"PptController@PptUp"]);
    Route::get('/pptdown/{id}',['as'=>"pptshow",'uses'=>"PptController@PptDown"]);
    Route::get('/reeditppt/{id}',['as'=>"reeditppt",'uses'=>"PptController@PptReeditIndex"]);
    Route::post('/reeditppt/{id}',['as'=>"reeditppt",'uses'=>"PptController@PptReeditStore"]);
    Route::get('/pptdelete/{id}','PptController@pptdelete');

//    商务合作管理
    Route::get('/friends',['as'=>"friends",'uses'=>"FriendsController@friendsindex"]);
    Route::post('/friends',['as'=>"friends",'uses'=>"FriendsController@friendsstore"]);
    Route::get('/friendsdelete/{id}',['as'=>"friendsdelere",'uses'=>"FriendsController@friendsdelete"]);


// 友情链接管理
    Route::get('/friendlink',['as'=>"friendlink",'uses'=>"FriendsController@friendlinkindex"]);
    Route::post('/friendlink',['as'=>"friendlink",'uses'=>"FriendsController@friendlinkstore"]);
    Route::get('/friendlinkdelete/{id}',['as'=>"friendlinkdelete",'uses'=>"FriendsController@friendlinkdelete"]);
    Route::get('/friendinfo/{id}',['as'=>"friendinfo",'uses'=>"FriendsController@friendinfoindex"]);
    Route::post('/friendinfo/{id}',['as'=>"friendinfo",'uses'=>"FriendsController@friendinfostore"]);

//页面管理
    Route::get('/page',['as'=>"page",'uses'=>"PageController@index"]); //页面列表
    Route::get('/newpage',['as'=>"newpage",'uses'=>"PageController@newpageindex"]); //新建页面
    Route::post('/newpage',['as'=>"newpage",'uses'=>"PageController@newpagestore"]); //新建页面
    Route::get('/editpage/{id}',['as'=>"editpage",'uses'=>"PageController@editpageindex"]); //修改页面
    Route::post('/editpage/{id}',['as'=>"editpage",'uses'=>"PageController@editpagestore"]); //修改页面
    Route::get('/deletepage/{id}',['as'=>"deletepage",'uses'=>"PageController@delete"]); //删除页面
//列表型页面管理
    Route::get('/pagelist',['as'=>"pagelist",'uses'=>"PageController@listindex"]); //页面列表
    Route::get('/newpagelist',['as'=>"newpagelist",'uses'=>"PageController@newlistindex"]); //新建页面
    Route::post('/newpagelist',['as'=>"newpagelist",'uses'=>"PageController@newliststore"]); //新建页面
    Route::get('/editpagelist/{id}',['as'=>"editpagelist",'uses'=>"PageController@editlistindex"]); //修改页面
    Route::post('/editpagelist/{id}',['as'=>"editpagelist",'uses'=>"PageController@editliststore"]); //修改页面
//    Route::get('/deletepagelist/{id}',['as'=>"deletepagelist",'uses'=>"PageController@listdelete"]); //删除页面

//顶部导航栏管理
    Route::get('/topmenu',['as'=>"topmenu",'uses'=>"MenuController@topmenuindex"]); //导航栏列表
    Route::get('/newtopmenu',['as'=>"newtopmenu",'uses'=>"MenuController@newtopmenuindex"]);// 新建导航栏
    Route::post('/newtopmenu',['as'=>"newtopmenu",'uses'=>"MenuController@newtopmenustore"]);// 保存导航栏
    Route::get('/edittopmenu/{id}',['as'=>"edittopmenu",'uses'=>"MenuController@edittopmenuindex"]);// 新建导航栏
    Route::post('/edittopmenu/{id}',['as'=>"edittopmenu",'uses'=>"MenuController@edittopmenustore"]);// 保存导航栏
    Route::get('/topmenudelete/{id}',['as'=>"topmenudelete",'uses'=>"MenuController@topmenudelete"]);// 删除导航栏

    Route::get('/topmenuup/{id}',['as'=>"topmenuup",'uses'=>"MenuController@topmenuup"]);// 上调
    Route::get('/topmenudown/{id}',['as'=>"topmenudown",'uses'=>"MenuController@topmenudown"]);// 下降

//    侧边导航栏管理

    Route::get('/sidemenu',['as'=>"sidemenu",'uses'=>"MenuController@sideindex"]); //侧边导航栏列表
    Route::get('/newsidemenu',['as'=>"newsidemenu",'uses'=>"MenuController@newsidemenuindex"]);// 新建导航栏
    Route::post('/newsidemenu',['as'=>"newsidemenu",'uses'=>"MenuController@newsidemenustore"]);// 新建导航栏
    Route::get('/editsidemenu/{id}',['as'=>"editsidemenu",'uses'=>"MenuController@editsidemenuindex"]);// 新建导航栏
    Route::post('/editsidemenu/{id}',['as'=>"editsidemenu",'uses'=>"MenuController@editsidemenustore"]);// 新建导航栏
    Route::get('/sidedelete/{id}',['as'=>"sidedelete",'uses'=>"MenuController@sidedelete"]); //删除导航栏
    Route::get('/sidemenuup/{id}',['as'=>"sidemenuup",'uses'=>"MenuController@sidemenuup"]);// 上调
    Route::get('/sidemenudown/{id}',['as'=>"sidemenudown",'uses'=>"MenuController@sidemenudown"]);// 下降

//    向侧边导航栏添加功能
    Route::get('/addfun',['as'=>"addfun",'uses'=>"AddfunController@index"]); //功能列表

    Route::get('/newaddfun',['as'=>"newaddfun",'uses'=>"AddfunController@newindex"]); //添加功能
    Route::post('/newaddfun',['as'=>"newaddfun",'uses'=>"AddfunController@newstore"]); //添加功能
    Route::get('/editaddfun/{id}',['as'=>"editaddfun",'uses'=>"AddfunController@editindex"]); //编辑功能
    Route::post('/editaddfun/{id}',['as'=>"editaddfun",'uses'=>"AddfunController@editstore"]); //编辑功能
    Route::get('/adddelete/{id}',['as'=>"adddelete",'uses'=>"AddfunController@delete"]); //shanchu


    //文章分类管理
    Route::get('/category',['as'=>"category",'uses'=>"ArticalController@CategoryIndex"]);
    Route::post('/category',['as'=>"category",'uses'=>"ArticalController@CategoryStore"]);
    Route::get('/category/{category}/edit','ArticalController@CategoryEdit');
    Route::post('/category/{category}','ArticalController@CategoryUpdate');
    Route::get('/deleteCategory/{id}',['as'=>"deletecategory",'uses'=>"ArticalController@CategoryDelete"]);
    //文章增删改查管理
    Route::get('/artical',['as'=>"artical",'uses'=>"ArticalController@ArticalIndex"]);
    Route::get('/addartical',['as'=>"addartical",'uses'=>"ArticalController@ArticalAdd"]);
    Route::post('/addartical',['as'=>"addarticalpost",'uses'=>"ArticalController@ArticalStore"]);
    Route::get('/deleteartical/{id}',['as'=>"deleteartical",'uses'=>"ArticalController@ArticalDelete"]);
    Route::get('/reeditartical/{id}',['as'=>"reeditartical",'uses'=>"ArticalController@ArticalReeditIndex"]);
    Route::post('/reeditartical/{id}',['as'=>"reeditarticalpost",'uses'=>"ArticalController@ArticalReeditStore"]);

//    推荐管理
    Route::get('/show/{id}',['as'=>"show",'uses'=>"ShowController@index"]);
    Route::get('/addshow/{id}',['as'=>"addshow",'uses'=>"ShowController@addindex"]);
    Route::post('/addshow/{id}',['as'=>"addshow",'uses'=>"ShowController@addstore"]);
    Route::get('/editshow/{id}/{key}',['as'=>"editshow",'uses'=>"ShowController@editindex"]);
    Route::post('/editshow/{id}/{key}',['as'=>"editshow",'uses'=>"ShowController@editstore"]);

    Route::get('/deleteshow/{id}/{key}',['as'=>"deleteshow",'uses'=>"ShowController@delete"]);

//    网站基本信息
    Route::get('/webinfo',['as'=>"webinfo",'uses'=>"HomeController@webindex"]);
    Route::post('/webinfo',['as'=>"webinfo",'uses'=>"HomeController@webstore"]);


});


//    首页
Route::get('/',['as'=>"homeindex",'uses'=>"HomeController@index"]);


//页面列表预览
Route::get('/list/{id}',['as'=>"list",'uses'=>"UrlController@listindex"]);

//新闻xiangqing预览
Route::get('/article/{id}',"UrlController@ArticleIndex");
//新闻列表预览
Route::get('/articlelist/{id}',"UrlController@ArticlelistIndex");

Route::get('/factory',"UrlController@factory");
Route::get('/financing',"UrlController@financing");
Route::get('investment',"UrlController@investment");
Route::get('private',"UrlController@private");
Route::get('chuangye1',"UrlController@chuangye1");
Route::get('chuangye2',"UrlController@chuangye2");
Route::get('dingzhi',"UrlController@dingzhi");

//手机端
Route::get('/leftside',"PhoneController@leftside");
Route::get('/search',"PhoneController@search");
Route::get('/phonenews',"PhoneController@news");
Route::get('/catlist/{id}',"PhoneController@catlist");



//页面预览
Route::get('/{url}',['as'=>"url",'uses'=>"UrlController@index"]);



//！！！！！