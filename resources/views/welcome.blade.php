<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
      
    </head>
    <body id="page-top">
      @csrf
        @yield('home')


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
        <script>
            $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
////////////////////////////////////////////////////////////////////////////
           $("a.view_schedule").click(function (e) { 
        let name2 = $(this).attr("data-name");
        let id = $(this).attr("data-id");
        e.preventDefault();
        $(".popups").load("{{url('/ajax1')}}", {id},  (response, status, request) => {
            $(".popups").fadeIn();
       $(".popups .span-name").text(`${name2}`);
            
        });
      
      
        
    });
    /////////////////////////////////////////////////////
    $(".set_appointment").click(function(){
      if ($(this).hasClass('checked')) {
          $(".popups2").fadeIn();
          $(".popups2 input.hidden").val($(this).attr("data-id"))
      }else{
        location.href = "{{url("/login")}}";
      }
    })
        </script>
        <script src='{{asset("jq.js")}}'></script>

    </body>
</html>
