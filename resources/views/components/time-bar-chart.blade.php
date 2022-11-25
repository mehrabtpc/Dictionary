<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
    <canvas id="ctx" width="300px"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['statistics'],
            datasets: [{
                label: 'done',
                data: [{{$statusCounts['doneCount']}}],
                backgroundColor: '#3e95cd'
            }, {
                label: 'doing',
                data: [{{$statusCounts['doingCount']}}],
                backgroundColor: '#3cba9f'
            },{
                label: 'todo',
                data: [{{$statusCounts['todoCount']}}],
                backgroundColor: '#8e5ea2'
            }]
        },
        options: {
            responsive: false,
            legend: {
                position: 'right'
            },
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });

</script>
