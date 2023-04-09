@extends('welcome')
@section('home')
@include('nav')
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Welcome to </h3>
                        <hr class="divider my-4" />
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/doctors')}}">Find a Doctor</a>

                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="menu">
        
    </section>
    <div id="portfolio" class="container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 text-center">
                    <h2 class="mb-4">Medical Specialties</h2>
                    <hr class="divider">

                    </div>
                </div>
                <div class="row no-gutters mt-4">
                @foreach ($rows as $item)
                    
                   <div class="col-md-4 mb-4">
                    <div class="item-jo">
                        <div class="overlay"></div>
                        
                    <img src='{{asset("img/$item->img_path")}}' />
                    <h5>{{$item->name}}</h5>
                    
                        <button class="btn btn-primary" ><a href="{{url("/specialities/$item->id")}}">get a doctor</a></button>
                       
                    </div>
                   </div>
                  
                @endforeach
                   
                    
                </div>
            </div>
        </div>
     

        <footer class="bg-light py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:"></a>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 -  | <a href="https://www.sourcecodester.com/" target="_blank">Sourcecodester</a></div></div>
        </footer>
        @if($errors->any())
        <h4 class="error">{{$errors->first()}}</h4>
        @endif
@endsection