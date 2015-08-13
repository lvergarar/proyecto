<div class="col-xs-12">  
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Proyectos</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>OT</th>
                        <th>OC</th>
                        <th>DESCRIPCIÓN DE REFERENCIA</th>
                        <th>20% TECNOCOM</th>
                        <th>DIFERENCIA DE CUBICADORA </th>
                        <th>GASTOS</th>
                         <th>CUBICADORA MENOS LOS GASTOS</th>
                 
                    </tr>
                </thead>
                <tbody>
                   <?php       foreach ($proyectos as $proyecto_item) {?>
                    <tr>                        
                        <td><?php echo $proyecto_item['proyecto_valorCubicadora']; ?></td>
                        <td>  Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
              <?php } ?>
                </tbody>
                <tfoot>
                   <th>OT</th>
                        <th>OC</th>
                        <th>DESCRIPCIÓN DE REFERENCIA</th>
                        <th>20% TECNOCOM</th>
                        <th>DIFERENCIA DE CUBICADORA </th>
                        <th>GASTOS</th>
                         <th>CUBICADORA MENOS LOS GASTOS</th>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box --> </div>

