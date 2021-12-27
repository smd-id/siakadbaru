
<script>
    $(document).ready(function() {

        $(document).ready(function(){
            doAjax();
            setInterval(doAjax, 30000);
        });
        
        function doAjax()
        {
            $.ajax({
                url : "<?php echo site_url('dashboardpsb/home_data') ?>/",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {

                    var randomR = Math.floor((Math.random() * 130) + 100);
                    var randomG = Math.floor((Math.random() * 130) + 100);
                    var randomB = Math.floor((Math.random() * 130) + 100);


                    console.log(data);
                    
                    var label_undangan = [];
                    var value_undangan = [];
                    var random_rgb_undangan = [];
                    for (var i in data.chart_undangan) {
                        label_undangan.push(data.chart_undangan[i].nama);
                        value_undangan.push(data.chart_undangan[i].total);
                        random_rgb_undangan.push(data.chart_undangan[i].rgb);
                    }
                    
                    var ctx = document.getElementById('chart_undangan').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: label_undangan,
                            datasets: [{
                                label: 'Peserta Jalur Undangan',
                                backgroundColor: random_rgb_undangan,
                                borderColor: 'rgb(255, 255, 255)',
                                data: value_undangan
                            }]
                        },
                        hoverOffset: 4,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision:0
                                    }
                                }]
                            }
                        }
                    });
                
                    var label_reguler = [];
                    var value_reguler = [];
                    var random_rgb_reguler = [];
                    for (var i in data.chart_reguler) {
                        label_reguler.push(data.chart_reguler[i].nama);
                        value_reguler.push(data.chart_reguler[i].total);
                        random_rgb_reguler.push(data.chart_reguler[i].rgb);
                    }
                    
                    var ctx1 = document.getElementById('chart_reguler').getContext('2d');
                    var chart1 = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: label_reguler,
                            datasets: [{
                                label: 'Peserta Jalur Reguler',
                                backgroundColor: random_rgb_reguler,
                                borderColor: 'rgb(255, 255, 255)',
                                data: value_reguler
                            }]
                        },
                        hoverOffset: 4,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision:0
                                    }
                                }]
                            }
                        }
                    });

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
    });
</script>