<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
    <canvas id="doughnut-chart" width="100px" height="100px"></canvas>
</div>

<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/chartjs-adapter-moment.min.js')}}"></script>


<script>
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: ["done", "doing", "todo"],
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#3cba9f","#8e5ea2",],
                    data: [
                        {{\Modules\Core\Helpers\Time::makeRoundTime($time['done'])}},
                        {{\Modules\Core\Helpers\Time::makeRoundTime($time['doing'])}},
                        {{\Modules\Core\Helpers\Time::makeRoundTime($time['todo'])}}
                    ]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Book Time Chart'
            }
        }
    });
</script>
