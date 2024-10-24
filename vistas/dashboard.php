
 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h2 class="m-0">Tablero Principal</h2>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                     <li class="breadcrumb-item active">Tablero Principal</li>
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">

     <div class="container-fluid">

         <!-- row Tarjetas Informativas -->
         <div class="row">

             <div class="col-lg-2">
                 <!-- small box -->
                 <div class="small-box bg-info">
                     <div class="inner">
                         <h4 id="totalProductos"></h4>

                         <p>Productos</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-clipboard"></i>
                     </div>
                     <a style="cursor:pointer;" class="small-box-footer"></a>
                 </div>
             </div>

             <!-- TARJETA TOTAL COMPRAS -->
          
                
                

             <div class="col-lg-3">
                 <!-- small box -->
                 <div class="small-box bg-warning">
                     <div class="inner">
                         <h4 id="totalVentas">S./ 1,200.00</h4>

                         <p>Total Ventas Mes</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-ios-cart"></i>
                     </div>
                     <a style="cursor:pointer;" class="small-box-footer"></a>
                 </div>
             </div>

             <!-- TARJETA TOTAL GANANCIAS -->
             <div class="col-lg-2">
                 <!-- small box -->
                 <div class="small-box bg-danger">
                     <div class="inner">
                         <h4 id="totalGanancias">Sdd./ 470.00</h4>

                         <p>Total Ganancias</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-ios-pie"></i>
                     </div>
                     <a style="cursor:pointer;" class="small-box-footer"></a>
                 </div>
             </div>

             <!-- TARJETA PRODUCTOS POCO STOCK -->
             <div class="col-lg-2">
                 <!-- small box -->
                 <div class="small-box bg-primary">
                     <div class="inner">
                         <h4 id="totalProductosMinStock">15</h4>

                         <p>Productos poco stock</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-android-remove-circle"></i>
                     </div>
                     <a style="cursor:pointer;" class="small-box-footer"></a>
                 </div>
             </div>

             <!-- TARJETA TOTAL VENTAS DIA ACTUAL -->
             <div class="col-lg-3">
                 <!-- small box -->
                 <div class="small-box bg-secondary">
                     <div class="inner">
                         <h4 id="totalVentasHoy">S./ 250.00</h4>

                         <p>Ventas del dia</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-android-calendar"></i>
                     </div>
                     <a style="cursor:pointer;" class="small-box-footer"></a>
                 </div>
             </div>


         </div> <!-- ./row Tarjetas Informativas -->

         <!-- VENTAS DEL MES-->
         <div class="row">

             <div class="col-12">

                 <div class="card card-info shadow">

                     <div class="card-header">

                         <h3 class="card-title" id="title-header"></h3>

                         <div class="card-tools">

                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                            

                         </div> <!-- ./ end card-tools -->

                     </div> <!-- ./ end card-header -->


                     <div class="card-body">

                         <div class="chart">

                             <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                             </canvas>

                         </div>

                     </div> <!-- ./ end card-body -->

                 </div>

             </div>

             <!-- COMPRAS DE MES -->

             <div class="col-12">

                <div class="card card-warning shadow">

                    <div class="card-header">

                        <h3 class="card-title" id="title-header-compras"></h3>

                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                           

                        </div> <!-- ./ end card-tools -->

                    </div> <!-- ./ end card-header -->


                    <div class="card-body">

                        <div class="chart">

                            <canvas id="barChart-compras" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                            </canvas>

                        </div>

                    </div> <!-- ./ end card-body -->

                </div>

                </div>






             <!-- POR CATEGORIAS -->
             <div class="col-12">

                 <div class="card card-success shadow">

                     <div class="card-header">

                         <h3 class="card-title" id="title-header"> TOP VENTAS POR CATEGORÍA</h3>

                         <div class="card-tools">

                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i>
                             </button>

                         </div> <!-- ./ end card-tools -->

                     </div> <!-- ./ end card-header -->


                     <div class="card-body">

                         <div class="chart">

                             <div id="chartContainer" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;"></div>

                         </div>

                     </div> <!-- ./ end card-body -->

                 </div>

             </div>

         </div><!-- ./row Grafico de barras y doughnut -->

         <!-- Productos mas vendidos y con poco stock -->
         <div class="row">
             <div class="col-lg-6">
                 <div class="card card-primary shadow">
                     <div class="card-header">
                         <h3 class="card-title">LOS 10 PRODUCTOS MAS VENDIDOS</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div> <!-- ./ end card-tools -->
                     </div> <!-- ./ end card-header -->
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_productos_mas_vendidos">
                                 <thead>
                                     <tr class="text-danger">
                                         <!-- <th>Cod. producto</th> -->
                                         <th>Producto</th>
                                         <th class="text-center">Cantidad</th>
                                         <th class="text-center">Ventas</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div> <!-- ./ end card-body -->
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="card card-danger shadow">
                     <div class="card-header">
                         <h3 class="card-title">PRODUCTOS CON POCO STOCK</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div> <!-- ./ end card-tools -->
                     </div> <!-- ./ end card-header -->
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_productos_poco_stock">
                                 <thead>
                                     <tr class="text-danger">
                                         <!-- <th>Cod. producto</th> -->
                                         <th>Producto</th>
                                         <th class="text-center">Stock Actual</th>
                                         <th class="text-center">Mín. Stock</th>
                                     </tr>
                                 </thead>
                                 <tbody></tbody>
                             </table>
                         </div>
                     </div> <!-- ./ end card-body -->
                 </div>
             </div>
         </div>

     </div><!-- /.container-fluid -->



 </div>
 <!-- /.content -->

 <script>
     $(document).ready(function() {

         cargarTarjetasInformativas();
         cargarGraficoBarras();
         cargarGraficoBarrasCompras();
         cargarGraficoDoughnut();
         cargarProductosMasVendidos();
         cargarProductosPocoStock();


     })

     /* =======================================================
     SOLICITUD AJAX TARJETAS INFORMATIVAS
     =======================================================*/
     function cargarTarjetasInformativas() {

         $.ajax({
             url: "ajax/dashboard.ajax.php",
             method: 'POST',
             dataType: 'json',
             success: function(respuesta) {
                //console.log("respuesta", respuesta);
                //$("#totalProductos").html(respuesta[0]['totalProductos']);
                 $("#totalProductos").html(respuesta[0]['totalProductos']);
                 $("#totalCompras").html("" + respuesta[0]['totalCompras'])
                 $("#totalVentas").html(respuesta[0]['moneda'] + " " + respuesta[0]['totalVentas'])
                 $("#totalGanancias").html(respuesta[0]['moneda']+ " " +respuesta[0]['ganancias'])
                 $("#totalProductosMinStock").html(respuesta[0]['productosPocoStock'])
                 $("#totalVentasHoy").html(respuesta[0]['moneda']+ " " + respuesta[0]['ventasHoy'])
                
             }
         });

     }


     /* =======================================================
     SOLICITUD AJAX GRAFICO DE BARRAS DE VENTAS DEL MES
     =======================================================*/
     function cargarGraficoBarras() {

         $.ajax({
             url: "ajax/dashboard.ajax.php",
             method: 'POST',
             data: {
                 'accion': 1 //parametro para obtener las ventas del mes
             },
             dataType: 'json',
             success: function(respuesta) {
                 // console.log("respuesta", respuesta);

                var fecha_venta = [];
                var total_venta = [];
                var total_venta_ant = [];
                var total_abonos = [];
                var date = new Date();
                
                var total_ventas_mes = 0;

                 for (let i = 0; i < respuesta.length; i++) {

                     //fecha_venta.push(respuesta[i]['fecha_venta']);
                     total_venta.push(respuesta[i]['total_venta']);
                     total_venta_ant.push(respuesta[i]['total_venta_ant']);
                     total_abonos.push(respuesta[i]['suma_abonos']);
                     total_ventas_mes = parseFloat(total_ventas_mes) + parseFloat(respuesta[i]['total_venta'] ) + parseFloat(respuesta[i]['abonos'] );

                 }

                 total_venta.push(0);

                 $("#title-header").html('VENTAS DEL MES: ' + total_ventas_mes.toFixed(2).toString().replace(/\d(?=(\d{3})+\.)/g, "$&,"));

                 var barChartCanvas = $("#barChart").get(0).getContext('2d');

                 var areaChartData = 
                 {
                     labels: fecha_venta,
                    datasets: [
                         /*{
                         label: 'Ventas del mes Anterior - ' + Number(date.getMonth()) + '/' + date.getFullYear(),
                         backgroundColor: 'rgb(255, 140, 0,0.9)',
                         data: total_venta_ant
                     }, */
                     {
                         label: 'Ventas del Mes - ' + Number(date.getMonth()+1) + '/' + date.getFullYear(),
                         backgroundColor: 'rgba(60,141,188,0.9)',
                         data: total_abonos
                     }]
                 }

                 var barChartData = $.extend(true, {}, areaChartData);

                 var temp0 = areaChartData.datasets[0];

                 barChartData.datasets[0] = temp0;

                 var barChartOptions = {
                     maintainAspectRatio: false,
                     responsive: true,
                     events: false,
                     legend: {
                         display: true
                     },
                     scales: {
                         xAxes: [{
                             stacked: true,
                         }],
                         yAxes: [{
                             stacked: true
                         }]
                     },
                     animation: {
                         duration: 500,
                         easing: "easeOutQuart",
                         onComplete: function() {
                             var ctx = this.chart.ctx;
                             ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                             ctx.textAlign = 'center';
                             ctx.textBaseline = 'bottom';

                             this.data.datasets.forEach(function(dataset) {
                                 for (var i = 0; i < dataset.data.length; i++) {
                                     var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                         scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                                     ctx.fillStyle = '#fff';
                                     var y_pos = model.y + 15;
                                     // Make sure data value does not get overflown and hidden
                                     // when the bar's value is too close to max value of scale
                                     // Note: The y value is reverse, it counts from top down
                                     if ((scale_max - model.y) / scale_max >= 0.93)
                                         y_pos = model.y + 20;
                                     ctx.fillText(dataset.data[i], model.x, y_pos);
                                 }
                             });
                         }
                     }
                 }

                 new Chart(barChartCanvas, {
                     type: 'bar',
                     data: barChartData,
                     options: barChartOptions
                 })


             }
         });

     }



      /* =======================================================
     SOLICITUD AJAX GRAFICO DE BARRAS DE VENTAS DEL MES
     =======================================================*/
     function cargarGraficoBarrasCompras() {

        $.ajax({
            url: "ajax/dashboard.ajax.php",
            method: 'POST',
            data: {
                'accion': 5 //parametro para obtener las ventas del mes
            },
            dataType: 'json',
            success: function(respuesta) {
                // console.log("respuesta", respuesta);

            var fecha_compra = [];
            var total_compra = [];
            var total_compra_ant = [];
            var date = new Date();
            
            var total_compra_mes = 0;

                for (let i = 0; i < respuesta.length; i++) {

                    fecha_compra.push(respuesta[i]['fecha_compra']);
                    total_compra.push(respuesta[i]['total_compra']);
                    total_compra_ant.push(respuesta[i]['total_compra_ant']);
                    total_compra_mes = parseFloat(total_compra_mes) + parseFloat(respuesta[i]['total_compra']);

                }

                total_compra.push(0);

                $("#title-header-compras").html('COMPRAS DEL MES:  ' + total_compra_mes.toFixed(2).toString().replace(/\d(?=(\d{3})+\.)/g, "$&,"));

                var barChartCanvas = $("#barChart-compras").get(0).getContext('2d');

                var areaChartData = {
                    labels: fecha_compra,
                    datasets: [
                         /*{
                        label: 'Compras del mes Anterior - ' + Number(date.getMonth()) + '/' + date.getFullYear(),
                        backgroundColor: 'rgb(255, 140, 0,0.9)',
                        data: total_compra_ant
                    }, */
                    {
                        label: 'Compras del Mes - ' + Number(date.getMonth()+1) + '/' + date.getFullYear(),
                        backgroundColor: 'rgba(255, 140, 0,0.9)',
                        data: total_compra
                    }]
                }

                var barChartData = $.extend(true, {}, areaChartData);

                var temp0 = areaChartData.datasets[0];

                barChartData.datasets[0] = temp0;

                var barChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    events: false,
                    legend: {
                        display: true
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function() {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            this.data.datasets.forEach(function(dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                        scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                                    ctx.fillStyle = '#fff';
                                    var y_pos = model.y + 15;
                                    // Make sure data value does not get overflown and hidden
                                    // when the bar's value is too close to max value of scale
                                    // Note: The y value is reverse, it counts from top down
                                    if ((scale_max - model.y) / scale_max >= 0.93)
                                        y_pos = model.y + 20;
                                    ctx.fillText(dataset.data[i], model.x, y_pos);
                                }
                            });
                        }
                    }
                }

                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })


            }
        });

        }




     /* =======================================================
     SOLICITUD AJAX GRAFICO DE DOUGHNUT
     =======================================================*/
     function cargarGraficoDoughnut() {

        $.ajax({
            url: "ajax/dashboard.ajax.php",
            method: 'POST',
            data: {
                'accion': 4 //parametro para obtener las ventas del mes
            },
            dataType: 'json',
            success: function(respuesta) {
            
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    // title:{
                    //     text: "Email Categories",
                    //     horizontalAlign: "left"
                    // },
                    data: [{
                        type: "doughnut",
                        startAngle: 60,
                        //innerRadius: 60,
                        indexLabelFontSize: 17,
                        indexLabel: "{label} - #percent%",
                        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                        dataPoints: respuesta
                    }]
                });
                chart.render();

            }
        });
        
        

     }


     /* =======================================================
     SOLICITUD AJAX PRODUCTOS MAS VENDIDOS
     =======================================================*/
     function cargarProductosMasVendidos() {

         $.ajax({
             url: "ajax/dashboard.ajax.php",
             type: "POST",
             data: {
                 'accion': 2 // listar los 10 productos mas vendidos
             },
             dataType: 'json',
             success: function(respuesta) {
                 // console.log("respuesta",respuesta);

                 for (let i = 0; i < respuesta.length; i++) {
                     filas = '<tr>' +
                         // '<td>'+ respuesta[i]["codigo_producto"] + '</td>'+
                         '<td>' + respuesta[i]["descripcion_producto"] + '</td>' +
                         '<td class="text-center">' + respuesta[i]["cantidad"] + '</td>' +
                         '<td class="text-center"> ' + respuesta[i]["total_venta"] + '</td>' +
                         '</tr>'
                     $("#tbl_productos_mas_vendidos tbody").append(filas);
                 }

             }
         });

     }


     /* =======================================================
     SOLICITUD AJAX PRODUCTOS CON POCO STOCK
     =======================================================*/
     function cargarProductosPocoStock() {

         $.ajax({
             url: "ajax/dashboard.ajax.php",
             type: "POST",
             data: {
                 'accion': 3 // listar los  productos con poco stock
             },
             dataType: 'json',
             success: function(respuesta) {
                 // console.log("respuesta",respuesta);

                 for (let i = 0; i < respuesta.length; i++) {
                     filas = '<tr>' +
                         // '<td>'+ respuesta[i]["codigo_producto"] + '</td>'+   
                         '<td>' + respuesta[i]["descripcion_producto"] + '</td>' +
                         '<td class="text-center">' + respuesta[i]["stock_producto"] + '</td>' +
                         '<td class="text-center">' + respuesta[i]["minimo_stock_producto"] + '</td>' +
                         '</tr>'
                     $("#tbl_productos_poco_stock tbody").append(filas);
                 }

             }
         });

     }
 </script>