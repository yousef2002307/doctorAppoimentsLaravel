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
        @foreach ($sval as $item)
            
       
       <tr>
       
        <td>{{$item->day}}</td>
        <td >{{$item->time_from}} to {{$item->time_to}}</td>
        
       </tr>
      
       @endforeach
     </tbody>
   </table>
 </div>
