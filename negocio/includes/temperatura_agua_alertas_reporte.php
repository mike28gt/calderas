<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/temperatura_agua_alertas_reporte.php');
?>

<div class="screen-calderas">
    <div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 text-start">
                <label class="form-label">Seleccione una caldera:&nbsp;&nbsp;</label><?php echo $calderasFiltrosHtml ?>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto text-start">
                <div class="input-group input-daterange">
                    <label class="form-label">Seleccione el rango de fechas:&nbsp;&nbsp;</label>
                    <input type="text" id="fechaInicio" class="form-control">
                    <div class="input-group-addon">&nbsp;a&nbsp;&nbsp;</div>
                    <input type="text" id="fechaFin" class="form-control">
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div id="chart"></div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function refrescarGrafica(chart) {
        $.ajax({
            method: "POST",
            url: "<?php echo $ajaxUrl ?>",
            data: {"calderaId": $("input[name='filtroCaldera']:checked").val(), "fechaInicio": $("#fechaInicio").val(), "fechaFin": $("#fechaFin").val(), "temperaturaMaxima": $("input[name='filtroCaldera']:checked").attr("temp_max"), "temperaturaMinima": $("input[name='filtroCaldera']:checked").attr("temp_min")}
	    }).done(function(msg) {
            //console.log(msg);
            var responseJsonObject = JSON.parse(msg);
            chart.load({
                    json: responseJsonObject
            });
        })
        .fail(function(jqXHR, textStatus) {
            console.log(textStatus);
        });
    }

    $(document).ready(function() {
        
        var fechaActual = new Date();
        var fechaInicio = new Date();
        
        fechaInicio.setDate(fechaActual.getDate() - <?php echo $intervaloDias ?>);

        var fechaFinStr = String(fechaActual.getDate()).padStart(2,'0') + "/" + 
                          String(fechaActual.getMonth()+1).padStart(2, '0') + "/" + 
                          String(fechaActual.getFullYear()).padStart(2, '0');
        var fechaInicioStr = String(fechaInicio.getDate()).padStart(2,'0') + "/" + 
                             String(fechaInicio.getMonth()+1).padStart(2, '0') + "/" + 
                             String(fechaInicio.getFullYear()).padStart(2, '0');
        $("#fechaInicio").val(fechaInicioStr);
        $("#fechaFin").val(fechaFinStr);
        $("input[name='filtroCaldera']").first().prop('checked', true);

        $('.input-daterange input').each(function() {
            $(this).datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                todayBtn: true,
                todayHighlight: true
            });
        });

        var chart = c3.generate({
            bindto: '#chart',
            data: {
                x: 'x',
                json: {
                    x: [],
                    'Alertas superiores al máximo': [],
                    'Alertas inferiores al mínimo': []
                }
            },
            axis: {
                x: {
                    type: 'category',
                    label: {
                        text: 'Fechas',
                        position: 'outer-center'
                    },
                    tick: {
                        rotate: 75,
                        multiline: false
                    }
                },
                y: {
                    label: {
                        text: 'Cantidad de Alertas',
                        position: 'outer-middle'
                    }
                }
            },
            grid: {
                x: {
                    show: true
                },
                y: {
                    show: true
                }
            }
        });

        $("#fechaInicio, #fechaFin, input[name='filtroCaldera']").change(function() {
            refrescarGrafica(chart);
        });

        refrescarGrafica(chart);
    });
</script>
