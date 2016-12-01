<?php $__env->startSection('content'); ?>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<body>
    <div class="image-container set-full-height" style="background-image: url('img/madera.jpg')">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 100px">
                        <div class="fresh-table">
                            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->
                            <div class="toolbar">
                                <h3 class="wizard-title centrar">Administración de Usuarios</h3>
                            </div>

                            <table id="fresh-table" class="table" >
                                <thead>
                                
                                <th data-field="nameu" data-sortable="true">Nombre</th>
                                <th data-field="apellidos" data-sortable="true">Apellidos</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="celular" data-sortable="true">Celular</th>
                                <th data-field="titulos" data-sortable="true">Titulos</th>
                                <th data-field="tiporol" data-sortable="true">Rol</th>
                                <th data-field="">Proyectos Asociados</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="centrar">
                                            
                                            <td><?php echo e($row->nameu); ?></td>
                                            <td><?php echo e($row->apellidos); ?></td>
                                            <td><?php echo e($row->email); ?></td>
                                            <td><?php echo e($row->celular); ?></td>
                                            <td><?php echo e($row->titulos); ?></td>
                                            <td><?php echo e($row->tiporol); ?></td>
                                            <td><a href="usuariosshow/<?php echo e($row->id); ?>">Ver</a><td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script>
    //Script Tabla Dinamica
    var $table = $('#fresh-table'),
//            $alertBtn = $('#alertBtn'),
//            full_screen = false,
            window_height;

    $().ready(function(){

        window_height = $(window).height();
        table_height = window_height - 20;

        $table.bootstrapTable({
            toolbar: ".toolbar",
//            showRefresh: true,
            search: true,
//            showToggle: true,
            showColumns: true,
            pagination: true,
//            striped: true,
            sortable: true,
//            height: table_height,
            pageSize: 3,
            pageList: [3,6,9],

            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });
    });
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>