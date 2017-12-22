@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="row">
        <div class="col-md-10">
            <h2 style="margin-top: 0;">{{ $reportTitle }}</h2>

            <canvas id="myChart"></canvas>

            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> --}}
            <script src="{{url('js/chart.min.js')}}"></script>
            <script src="{{url('js/Chart.bundle.js')}}"></script>
            <script>
                var ctx = document.getElementById("myChart");
                 // Chart.defaults.global.defaultFontColor = 'black';
                 // Chart.defaults.global.defaultFontSize = 16;
                var myChart = new Chart(
                    ctx, {
                    type: '{{ $chartType }}',
                    data: {
                        labels: [
                            @foreach ($results as $group => $result)
                                "{{ $group }}",
                            @endforeach
                        ],

                        datasets: [{
                            label: '{{ $reportLabel }}',
                            data: [
                                @foreach ($results as $group => $result)
                                    {!! $result !!},
                                @endforeach
                            ],
                            borderWidth: 1,
                            pointBackgroundColor: ['red', 'green', 'blue','yellow'],
                            backgroundColor: ['rgb(131, 208, 242)'],

                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                   stacked: true // beginAtZero:true
                                }
                            }]
                        }
                    },

                        options: {
                      elements: {
                        line: {
                         tension: 2, // disables bezier curves
              }
        }
    }
                });
            </script>
        </div>
    </div>
    </div>
@stop
