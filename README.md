###Config Master Layout
````
1. parent page
<title>@yield('title')</title>
@yield('content')

2. child page
@extends('front.layout.master')
@section('title')
About
@endsection
````

####Active menu
````
#nested menu
request()->is('companies/*')

#single menu
{{ url()->current() == url('/') ? 'active' : '' }}
````

````
//Admin block
Route::middleware('auth')->group(function () {
    //protect rout block
}

//login
Route::get('/login', 'App\Http\Controllers\Admin\LoginController@index')->name('login');
Route::post('/do_login', 'App\Http\Controllers\Admin\LoginController@do_login')->name('do_login');
Route::get('/logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('logout');

````
