<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{url('../js/jquery-3.2.1.min.js')}}"></script>

<body class="hold-transition skin-green-light sidebar-mini" >
<style>
            html, body {

            }
            .content-wrapper{
                background-color: whitesmoke;
            }
</style>
<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content" id="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                      {{--   <div class="note note-info alert alert-info">

                            <p>{{ Session::get('message') }}</p>
                        </div> --}}

                         <div class="box box-solid box-info">
                           <div class="box-header with-border">
                            <h3 class="box-title">Note :</h3>
                            <div class="box-tools pull-right">
                                
                              </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                             <p>{{ Session::get('message') }}</p>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                              
                            </div><!-- box-footer -->
                          </div><!-- /.box -->
                    @endif
                    @if ($errors->count() > 0)
               {{--          <div class="note note-danger alert alert-warning">

                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> --}}

                        <div class="box box-solid box-warning">
                           <div class="box-header with-border">
                            <h3 class="box-title">Warning</h3>
                            <div class="box-tools pull-right">
                                
                              </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                              
                            </div><!-- box-footer -->
                          </div><!-- /.box -->
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>
<script type="text/javascript"> 
function copyToClipboard() {
  // Create a "hidden" input
  var aux = document.createElement("input");
  // Assign it the value of the specified element
  aux.setAttribute("value", "Você não pode mais dar printscreen. Isto faz parte da nova medida de segurança do sistema.");
  // Append it to the body
  document.body.appendChild(aux);
  // Highlight its content
  aux.select();
  // Copy the highlighted text
  document.execCommand("copy");
  // Remove it from the body
  document.body.removeChild(aux);
  alert("PrintScreen is Disabled :D.");
}

$(window).keyup(function(e){
  if(e.keyCode == 44){
    copyToClipboard();
  }
}); 

// $(window).focus(function() {
//   $("body").show();
// }).blur(function() {
//   $("body").hide();
// });




</script>
