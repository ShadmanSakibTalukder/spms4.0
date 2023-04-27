@extends('layouts.app')

@push('css')
    <style>
        body {
            font-family: 'Amazon Ember';
        }

        .responsive-wrap {
            position: relative;
            margin: 40px auto 0;
            max-width: 800px;
            width: 100%;
            height: 0;
            padding-bottom: 50%;

            .chart-wrap {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        }

        canvas {
            height: auto;
            max-width: 100%;
        }

        .info {
            display: none;

            &.active {
                display: block;
            }
        }
    </style>
@endpush

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card">
                        {{-- notify --}}
                        @if (Session::get('notify'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('notify') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- notify --}}
                        <div class="card-header">
                            Your Result
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->year }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ $item->section }}</td>
                                            <td>{{ $item->course ? $item->course->name : '' }}({{ $item->course ? $item->course->course_id : '' }})
                                            </td>
                                            <td>{{ $item->grade }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Check CO
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student.co.check') }}">
                                <div class="row">
                                    <div class="col-6 py-2">
                                        <label for="">Course</label>
                                        <select name="course" id="" class="form-control" required>
                                            <option value="">--select one--</option>
                                            @foreach ($course as $item)
                                                <option value="{{ $item->id }}">{{ $item->course_id }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="col-6 py-2">
                                        <label for="">Section</label>
                                        <input type="text" name="section" class="form-control">
                                    </div>
                                    <div class="col-6 py-2">
                                        <label for="">Semester</label>
                                        <input type="text" name="semester" class="form-control">
                                    </div>
                                    <div class="col-6 py-2">
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control">
                                    </div>
                                    <div class="col-12 py-2 text-center">
                                        <button type="submit" class="btn btn-success">Check CO</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (Session::get('grade'))
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="chart-wrap">
                                    <canvas id="myChart" style="height: 600px;"></canvas>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div>
        @php
            $grade = Session::get('grade');
            $mark = '';
            
            if ($grade == 'A') {
                $mark = 90;
            } elseif ($grade == 'A-') {
                $mark = 85;
            } elseif ($grade == 'B+') {
                $mark = 80;
            } elseif ($grade == 'B') {
                $mark = 75;
            } elseif ($grade == 'B-') {
                $mark = 70;
            }elseif ($grade == 'C+') {
                $mark = 65;
            }elseif ($grade == 'C') {
                $mark = 60;
            }elseif ($grade == 'C-') {
                $mark = 55;
            }elseif ($grade == 'D+') {
                $mark = 50;
            }elseif ($grade == 'D') {
                $mark = 45;
            }elseif ($grade == 'F') {
                $mark = 00;
            }
        @endphp
        <input type="hidden" value="{{ $mark }}" id='mark_data'>
    </div>
@endsection



@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = $("#myChart");
        var mark = $('#mark_data').val();


        var colors = {
            red: "#DF3312",
            black: "#232F3E",
            green : "#009933",
        };

        var chart = new Chart(ctx, {
            type: "radar",
            data: {
                labels: ["CO1", "CO2", "CO3","CO4"],
                datasets: [{
                    label: false,


                    data: [mark, mark, mark, mark, mark],
                    fill: false,
                    pointRadius: 4,
                    backgroundColor: colors.green,
                    borderColor: colors.red,
                    pointBackgroundColor: colors.green,
                    pointBorderColor: "transparent",
                    pointHoverBackgroundColor: colors.green,
                    pointHoverBorderColor: colors.green,
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        // useful tip!
                        // you can write functions that dip into the context of what's happening
                        // and update stuff dynamically

                        // trip hover state of label now we're storing the state as a variabel
                        color: function(context) {
                            return context.hovered ? colors.red : colors.black;
                        },
                        font: {
                            family: 'Amazon Ember',
                            size: 30,
                            style: 'normal'
                        },
                        // to push the inline label out to the extremity of the graph we need to fake it
                        // by initially setting the anchor and alignment to 'end'
                        align: 'end',
                        anchor: 'end',
                        // then taking the data value, (between 0 and 100), finding the remainder from 100
                        // and using this as an inline label, but offset by the correct amount
                        offset: function(context) {
                            // using the height of the canvas as a base
                            // our segment lines are a little short of half the height (look at the top vertical line)
                            // so there's a magic number here of height/2.5 as the pixel range for one segment bar
                            // so if 100% = this length, our offset is the remaining % (100 - value) of the segment length
                            var offset = (context.chart.height / 2.5) * ((100 - context.dataset.data[context
                                .dataIndex]) * 0.01);
                            return offset;
                        },
                        // then reformatting the label content from the 
                        //  value to the label set with the dataset
                        formatter: function(value, context) {
                            return context.chart.data.labels[context.dataIndex];
                        },
                        listeners: {
                            enter: function(context) {
                                // Receives `enter` events for any labels of any dataset. Indices of the
                                // clicked label are: `context.datasetIndex` and `context.dataIndex`.
                                // For example, we can modify keep track of the hovered state and
                                // return `true` to update the label and re-render the chart.
                                context.hovered = true;
                                return true;
                            },
                            leave: function(context) {
                                context.hovered = false;
                                return true;
                            },
                            click: function(context) {
                                var target = context.chart.data.labels[context.dataIndex] + '';
                                target = target.replace(' ', '-').toLowerCase();
                                var fadeSpeed = 150;
                                $('.info.active').fadeOut(fadeSpeed, function() {
                                    $('.info.active').removeClass('active');
                                    $('#' + target).fadeIn(fadeSpeed, function() {
                                        $('#' + target).addClass('active');
                                    });
                                });
                                //console.log('clicked: ' + target);
                                return true;
                            }
                        },
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    mode: 'point',
                    titleFontSize: 13,
                    titleFontFamily: 'Amazon Ember',
                    titleFontStyle: 'normal',
                    titleMarginBottom: 2,
                    cornerRadius: 0,
                    backgroundColor: colors.black,
                    xPadding: 12,
                    yPadding: 8,
                    yAlign: 'bottom',
                    xAlign: 'center',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return data.labels[tooltipItem[0].index] + ': ' + tooltipItem[0].yLabel + '%';
                        },
                        label: function(tooltipItem, data) {
                            return false;
                        },
                    }
                },
                // NOTE!!! as there is only one scale on radar
                // plot, the user 'scales' key is instead 'scale'
                // scale options here: http://www.chartjs.org/docs/latest/axes/radial/linear.html#linear-radial-axis
                scale: {
                    // the diagonal segment lines
                    angleLines: {
                        display: true,
                        color: colors.black,
                        lineWidth: 1,
                    },
                    gridLines: {
                        lineWidth: 1,
                        color: colors.black,
                    },
                    // the labels at the tip of each data point (we're disabling the default ones)
                    // and adding our own hacky ones so we can attach click events
                    pointLabels: {
                        display: false,
                        fontColor: colors.black,
                        fontFamily: 'Amazon Ember',
                        fontSize: 14,
                        callback: function(label) {
                            return label;
                        },
                    },
                    // the segment lines
                    ticks: {
                        display: false, // toggle this on hover!
                        fontColor: colors.red,
                        fontFamily: 'Amazon Ember',
                        fontSize: 14,
                        backdropPaddingX: 0,
                        backdropPaddingY: 0,
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        //maxTicksLimit: 5,
                        stepSize: 20,
                        //suggestedMax: 100,
                        //suggestedMin: 0,
                        showLabelBackdrop: false,
                    },
                },
                elements: {
                    line: {
                        tension: 0,
                        borderWidth: 1
                    }
                },
                maintainAspectRatio: false,
                // because we're using hacky labels we have to 
                // pad the canvas area a bit to make sure text doesn't run off the edge
                layout: {
                    padding: {
                        left: 30,
                        right: 30,
                        top: 30,
                        bottom: 30
                    }
                }
            },
        });
    </script>
@endpush
