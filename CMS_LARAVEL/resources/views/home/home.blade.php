@extends('layouts.Guest.master')

@section('content')
<div id="content" role="main" class="content-area">
    <section class="section slider-section" id="section_1824506126">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        @include('home.top.index')
        <!-- .section-content -->
        <style scope="scope">
            #section_1824506126 {
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: rgb(255, 255, 255);
            }
        </style>
    </section>
    <section class="section sp-ban-chay" id="section_701408308">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        
        <!-- .section-content -->
        <style scope="scope">
            #section_701408308 {
            padding-top: 30px;
            padding-bottom: 30px;
            background-color: rgb(241, 241, 241);
            }
        </style>
    </section>
            @include('home.center.san_pham_ban_chay')
            @include('home.center.san_pham')
        
    <section class="section tin-tuc" id="section_210666368" style="margin-left:2%">
        @include('home.bottom.index');
        <!-- .section-content -->
        <style scope="scope">
            #section_210666368 {
            padding-top: 30px;
            padding-bottom: 30px;
            }
        </style>
    </section>
</div>
@endsection
