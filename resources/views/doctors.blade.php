@extends('welcome')

@section('home')
   @include('nav')
   <?php
    $name = '';
   
   ?>
  
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Doctor's</h3>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>
	
	<section class="page-section" id="doctors" >
        <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
						
						@foreach ($rows as $item)
						
						
						
					
				
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src='{{asset("img/$item->img_path")}}' alt="">
					</div>
					<div class="col-md-6">
						 <p>Name: <b>{{$item->name}}</b></p>
						 <p><small>Email: <b>{{$item->email}}</b></small></p>
						 <p><small>Clinic Address: <b>{{$item->clinic_address}}</b></small></p>
						 <p><small>Contac #: <b>{{$item->contact}}</b></small></p>
						 <p><small><a data-name="{{$item->name}}" href="" class="view_schedule" data-id="{{$item->id}}" ><i class='fa fa-calendar'></i> Schedule</a></b></small></p>
						 <p><b>Specialties: </b></p>
						
						
						 
						 	
                         <div>  
						 	@foreach ($arr as $key => $val)
                           
                                @if ($item->id === $key)
                                <?php  $valarr = explode(" ",trim($val)) ?>
                                @foreach ($valarr as $item2)
                                    
                               
                                

                                    <span class="badge badge-light" style="padding: 10px"><large><b>{{$item2}}</b></large></span>
						 	
						
                         @endforeach
                                @endif
                            @endforeach
                        </div>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
                        @if (Auth::check())
                        <button class="btn-outline-danger checked  btn  mb-4 set_appointment" type="button" data-id="{{$item->id}}"  data-name="">Set Appointment</button>
                        @else
                            
                     
						<button class="btn-outline-primary nochecked  btn  mb-4 set_appointment" type="button" data-id="{{$item->id}}"  data-name="">Set Appointment</button>
                        @endif
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				@endforeach
				</div>
				</div>
        	</div>
        </div>
    </section>
    <style>
    	#doctors img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
    </style>

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
        <div class="popups">
           
                
           <!--
            <div class="popup">
                
               DR\ <span class="span-name"></span>- scedule
               <table class="table table-striped">
                <thead>
                  <tr>
                   
                    <th scope="col">Day</th>
                    <th scope="col">Schedule</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   
                    <td>monady</td>
                    <td>2pm to 1 am</td>
                   
                  </tr>
                  <tr>
                    <td>monady</td>
                    <td>2pm to 1 am</td>
                  </tr>
                
                </tbody>
              </table>
            </div>
        -->
        </div>
        <div class="popups2">
            <div class="popup2">
                <h2 class="text-center mt-3">set appoiment with doctor</h2>
               
                   

                </p>
               <form method="post" action="{{route("requestapp")}}">
                @csrf
                @method("post")
                <div class="form-group mb-3">
                    <label>Date: </label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Time: </label>
                    <input required type="time" name="time" class="form-control">
                </div>
                <div class="form-group mb-3">
                   
                    <input required type="hidden" name="hidden" class="hidden form-control">
                </div>
                <div class="form-group mb-3">
                   <input type="submit" value="request" class="btn btn-primary"/>
                </div>
               </form>
            </div>
        </div>
        @if($errors->any())
        <h4 class="error">{{$errors->first()}}</h4>
        @endif
@endsection