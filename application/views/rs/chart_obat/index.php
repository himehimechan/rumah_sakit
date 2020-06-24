    <!-- Chart.js -->
    <script src="<?=base_url()?>assets_admin/vendors/Chart.js/dist/Chart.min.js"></script>
<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Chart</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pie Chart Jumlah Pemakaian Obat</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <canvas id="pieChart1"></canvas>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Bar Chart Jumlah Per Status Resep</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <canvas id="mybarChart1"></canvas>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

<script> 

var resepCanvas = document.getElementById("mybarChart1").getContext('2d');   
var IsidataResep = {     
    label: 'Status Resep',     
    data: [ <?php foreach ($data_per_status_resep as $data) { echo $data->total . ", "; } ?> ],     
    backgroundColor: '#9ED4A9',     
    borderColor: '#93C3D2',     
    yAxisID: "y-axis-data1" };    
    var dataresep = {     
        labels: [ <?php foreach ($data_per_status_resep as $data) { echo "'" .strtoupper($data->status_resep) ."',"; } ?> ],     
        datasets: [IsidataResep] };   
        var chartOptions = {     
            scales: {        
                xAxes: [{ categoryPercentage: 0.5 }],         
                yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]      }  };    
                var barChart = new Chart(resepCanvas, {     
                    type: 'bar',     data: dataresep,     options: chartOptions  }); 

var dataCanvas = document.getElementById("pieChart1").getContext('2d');   
var warna = [];
<?php foreach ($data_obat_qty as $data) { ?>
    warna.push(hexagenerate());<?php } ?>
var Isidata = {    
    label: 'Obat',    
    data: [<?php foreach ($data_obat_qty as $data) { 
        echo $data->total_obat . ", "; } ?> ],    
        backgroundColor: warna,    
        borderColor: warna,        
        yAxisID: "y-axis-data1" };

var dataobat = {  
    labels: [ <?php foreach ($data_obat_qty as $data) { 
        echo "'" .$data->nama_obat ."',"; } ?> ],  
        datasets: [Isidata] };   var chartOptions = {     
            scales: {        xAxes: [{ categoryPercentage: 0.5 }],        
            yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]     } };   
            var barChart = new Chart(dataCanvas, {  
                type: 'pie',       
                data: dataobat,       
                options: chartOptions     
                });

function hexagenerate(){
    return "#" + Math.floor(Math.random()*16777215).toString(16);
}

 </script>