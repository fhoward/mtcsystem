@extends('layouts.app')


@section('content')
    <link rel='stylesheet' href='{{ url('css/fullcalendar.min.css') }}'/>

   {{--  <link href="{{ asset('public/css/fullcalendar.print.css')}}"/>
    <link href="{{ asset('public/css/fullcalendar.css')}}"/> --}}
    <h2 class="page-title"><strong>Calendar</strong></h2>

    <div id='calendar'></div>

@endsection

@section('javascript')
    @parent
 {{--    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script> --}}
 {{--    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script> --}}
    <script src='{{url('js/moment.min.js')}}'></script>
    <script src='{{url('js/fullcalendar.min.js')}}'></script>
    <script>
        $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events)  !!};
            
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

                defaultView: 'agendaWeek',
                
                events: events,
                

            })
        });
    </script>
    <style>

/*    body {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
        background-color: #DDDDDD;
        }
        */
    #wrap {
        width: 1100px;
        margin: 0 auto;
        }
        
    #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        text-align: left;
        }
        
    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
        }
        
    .external-event { /* try to mimick the look of a real event */
        margin: 10px 0;
        padding: 2px 4px;
        background: #3366CC;
        color: #fff;
        font-size: .85em;
        cursor: pointer;
        }
        
    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
        }
        
    #external-events p input {
        margin: 0;
        vertical-align: middle;
        }

    #calendar {
/*      float: right; */
        margin: 0 auto;
        width: 100%;
        background-color: #FFFFFF;
          border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
        }

</style>
@endsection