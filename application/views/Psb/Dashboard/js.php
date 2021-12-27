
<script>
    $(document).ready(function() {

        $(document).ready(function(){
            doAjax();
            setInterval(doAjax, 10000);
        });
        
        function doAjax()
        {
            $.ajax({
                url : "<?php echo site_url('dashboardpsb/home_data') ?>/",
                type: "POST",
                dataType: "JSON",
                beforeSend: function()
                {
                    Swal.fire({
                        title: "<div class='spinner-border text-primary' role='status'></div>",
                        html: "Mendapatkan Data Terbaru",
                        timer: 800,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timerProgressBar: true

                    });
                },
                success: function(data)
                {
                    $.each(data.result,function(key,value){
                        var keys_id = "#"+key;
                        $(keys_id).html(value); 
                    });
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    mySwalalert('Gagal Mendapatkan Data', 'error');
                }
            });
        }


        $(function () {
            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })
        })

    });
</script>