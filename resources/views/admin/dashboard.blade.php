@extends('admin.app')
@section('admin_content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SDMGA</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Welcome!</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Welcome!</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-app-store-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total App</h6>
                        <h2 class="my-2">{{$totalApp}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-profile-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total Website</h6>
                        <h2 class="my-2">{{$totalWebsite}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-info">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-route-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total Training</h6>
                        <h2 class="my-2">{{$totalTraining}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-primary">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-file-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total File</h6>
                        <h2 class="my-2">{{$totalProjectFile}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                    <div class="card-body">
                        <div class="float-end">
                            <i class=" ri-newspaper-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">News</h6>
                        <h2 class="my-2">{{$totalNews}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-wallet-2-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Project</h6>
                        <h2 class="my-2">{{$totalProject}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-info">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-2-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Team Member</h6>
                        <h2 class="my-2">{{$totalTeamMember}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-primary">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-drag-move-fill widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Showcase</h6>
                        <h2 class="my-2">{{$totalShowcase}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Pie Chart</h4>
                        <div style="width: 380px;height:380px; margin: 0 auto;">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('pieChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: @json($data['labels']),
                                    datasets: [{
                                        data: @json($data['value']),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)',
                                            'rgba(153, 102, 255, 0.7)',


                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',

                                        ],
                                        borderWidth: 1
                                    }]
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Bar Chart</h4>
                        <div class="text-center">
                            <div id="bars_basic" style="width: 600px;height:380px; margin: 0 auto;"></div>
                        </div>
                        <script type="text/javascript">
                            var bars_basic_element = document.getElementById('bars_basic');
                            if (bars_basic_element) {
                                var bars_basic = echarts.init(bars_basic_element);
                                bars_basic.setOption({
                                    color: ['#3398DB'],
                                    tooltip: {
                                        trigger: 'axis',
                                        axisPointer: {
                                            type: 'shadow'
                                        }
                                    },
                                    xAxis: {
                                        type: 'category',
                                        data: ['News', 'Project', 'Team', 'Showcase', 'Venue']
                                    },
                                    yAxis: {
                                        type: 'value'
                                    },
                                    series: [
                                        {
                                            data: [
                                                    {{$totalNews}},
                                                    {{$totalProject}},
                                                    {{$totalTeamMember}},
                                                    {{$totalShowcase}},
                                                    {{$venue}}
                                            ],
                                            type: 'bar'
                                        }
                                    ]


                                    {{--xAxis: [--}}
                                    {{--    {--}}
                                    {{--        type: 'category',--}}
                                    {{--        //data: ['News', 'Project','TEAM MEMBER'],--}}
                                    {{--        data: ['News', 'Project','TEAM MEMBER', 'Showcase','Venue'],--}}
                                    {{--        axisTick: {--}}
                                    {{--            alignWithLabel: true--}}
                                    {{--        }--}}
                                    {{--    }--}}
                                    {{--],--}}
                                    {{--yAxis: [--}}
                                    {{--    {--}}
                                    {{--        type: 'value'--}}
                                    {{--    }--}}
                                    {{--],--}}
                                    {{--series: [--}}
                                    {{--    {--}}
                                    {{--        name: 'Total',--}}
                                    {{--        type: 'bar',--}}
                                    {{--        barWidth: '20%',--}}
                                    {{--        data: [--}}
                                    {{--            {{$totalNews}},--}}
                                    {{--            {{$totalProject}},--}}
                                    {{--            {{$totalTeamMember}}--}}

                                    {{--        ]--}}
                                    {{--    }--}}
                                    {{--]--}}
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Doughnut Chart</h4>
                        <div style="width: 380px;height:380px; margin: 0 auto;">
                            <canvas id="doughnut"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('doughnut').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: @json($data['labels']),
                                    datasets: [{
                                        data: @json($data['value']),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)',
                                            'rgba(153, 102, 255, 0.7)',


                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',

                                        ],
                                        borderWidth: 1
                                    }]
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Polar Chart</h4>
                        <div style="width: 380px;height:380px; margin: 0 auto;">
                            <canvas id="polar"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('polar').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'polarArea',
                                data: {
                                    labels: @json($data['labels']),
                                    datasets: [{
                                        data: @json($data['value']),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)',
                                            'rgba(153, 102, 255, 0.7)',


                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>


@endsection
