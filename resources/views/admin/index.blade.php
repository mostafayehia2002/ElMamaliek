@extends('admin.layouts.dashboard')
@section('title')
   الصفحة الرئيسية
@endsection
@section('page address')
   الصفحة الرئيسية
@endsection
@section('content')
    <div class="page-boxes">
   <a href="{{route('admin.showAdmins')}}" class="box" >
       <div class="box-icon"><span class="fa-solid fa-user-secret"></span></div>
       <div class="box-count">{{$admins}}</div>
     <div class="box-name">الادمن</div>
    </a>
    <a href="{{route('admin.showUsers')}}" class="box">
        <div class="box-icon"><span class="fa-solid fa-users"></span></div>
        <div class="box-count">{{$users}}</div>
        <div class="box-name">المستخدمين </div>
   </a>
        <a href="{{route('admin.showOrderCharges')}}" class="box">
            <div class="box-icon"><span class="fa-solid fa-cart-shopping"></span></div>
            <div class="box-count">{{$order_charges}}</div>
            <div class="box-name"> طلبات الشحن الجديدة </div>
        </a>
        <a href="{{route('admin.showOrders')}}" class="box">
            <div class="box-icon"><span class="fa-solid fa-cart-shopping"></span></div>
            <div class="box-count">{{$orders}}</div>
            <div class="box-name"> طلبات الاكواد الجديدة </div>
        </a>
    </div>
@endsection
