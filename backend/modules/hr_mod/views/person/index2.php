<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $personData backend\modules\hr_mod\personDatas\Person */
/* @var $form ActiveForm */
?>
<div class="row">
  <div class="col-md-12">
    <div ui-view="" class="fade-in-up ng-scope">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption ">
            <!-- <i class="fa fa-cogs"></i>
            <span >Genera una nueva cuenta para una empresa</span> -->
            <i class="fa fa-institution"></i>
            <span class="caption-subject bold uppercase"> Crear Nueva Persona </span>
          </div>
        </div>
    <div class="portlet-body form">

                        <div class="portlet-body">
                            <div class="table-container">
                            <div class="col-md-6 col-sm-12"><div id="sample_1_filter" class="dataTables_filter"><label>My search: <input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div>
                                <!-- <div class="table-actions-wrapper">
                                    <span>
                                    </span>
                                    <select class="table-group-action-input form-control input-inline input-small input-sm">
                                        <option value="">Select...</option>
                                        <option value="Cancel">Cancel</option>
                                        <option value="Cancel">Hold</option>
                                        <option value="Cancel">On Hold</option>
                                        <option value="Close">Close</option>
                                    </select>
                                    <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
                                </div> -->
                                <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="2%">
                                        <input type="checkbox" class="group-checkable">
                                    </th>
                                    <th width="5%">
                                         Record&nbsp;#
                                    </th>
                                    <th width="15%">
                                         Date
                                    </th>
                                    <th width="15%">
                                         Customer
                                    </th>
                                    <th width="10%">
                                         Ship&nbsp;To
                                    </th>
                                    <th width="10%">
                                         Price
                                    </th>
                                    <th width="10%">
                                         Amount
                                    </th>
                                    <th width="10%">
                                         Status
                                    </th>
                                    <th width="10%">
                                         Actions
                                    </th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="order_id">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
<!--                                 <tr role="row" class="filter">
                                    <td>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="order_id">
                                    </td>
                                    <td>
                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
                                            <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                        <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
                                            <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="order_customer_name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="order_ship_to">
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5">
                                            <input type="text" class="form-control form-filter input-sm" name="order_price_from" placeholder="From"/>
                                        </div>
                                        <input type="text" class="form-control form-filter input-sm" name="order_price_to" placeholder="To"/>
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5">
                                            <input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_quantity_from" placeholder="From"/>
                                        </div>
                                        <input type="text" class="form-control form-filter input-sm" name="order_quantity_to" placeholder="To"/>
                                    </td>
                                    <td>
                                        <select name="order_status" class="form-control form-filter input-sm">
                                            <option value="">Select...</option>
                                            <option value="pending">Pending</option>
                                            <option value="closed">Closed</option>
                                            <option value="hold">On Hold</option>
                                            <option value="fraud">Fraud</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5">
                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                    </td>
                                </tr> -->
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Names</th>
                                <th>Last Names</th>
                                <th>Genero</th>
                                <th>Dni</th>
<!--                                 <th>Start date</th>
                                <th>Salary</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Names</th>
                                <th>Last Names</th> 
                                <th>Genero</th>
                                <th>Dni</th>
<!--                                 <th>Start date</th>
                                <th>Salary</th> -->
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End: life time stats -->

</div><!-- index2 -->
</div>
        </div>
      </div> <!-- create_account -->

      <script type="text/javascript">
    $(document).ready(function () {
        oTable = $("#dataCategory").dataTable({
            "bDestroy": true,
            "aLengthMenu": [[10,15, 30, 50, 100, 200, 500], [10,15, 30, 50, 100, 200, 500]],
            "iDisplayLength": 10,
            "bServerSide": true,
            "sAjaxSource": "script/catAll.php",
            "bProcessing": true,
            "bSortable": true,
            "aaSorting": [[ 0, "desc" ]],
            "sPagination": "full_numbers",
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ por página",
                "sZeroRecords": "No se ha encontrado ningún registro con el criterio de búsqueda",
                "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                "sInfoEmpty": "",
                "sInfoFiltered": "",
                "sSearch": "Buscar: ",
                "sProcessing": "<img src='images/loading.gif' height='50px' width='50px'>",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sPrevious": "<span class='glyphicon glyphicon-chevron-left'></span> <a style='cursor:pointer'>Anterior</a>  ",
                    "sNext": "  <a style='cursor:pointer'>Siguiente</a> <span class='glyphicon glyphicon-chevron-right'></span>",
                    "sLast": "Último"
                }
            },
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                  oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "type": "GET",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                  } );
                },
           "aoColumns": [
                        { "mData": "name_cate"},
                   { "sDefaultContent": "", "bSortable":false, "mData": null, "mRender": function (data, type, full) {
                        return '<a href="cat_edit.php?id='+full.id_cate+'" title="Modificar"><span class="glyphicon glyphicon-edit"></span></a> &nbsp;&nbsp; <a  onClick="showConfirmDel('+full.id_cate+', \''+full.name_cate+'\');" style="cursor:pointer; color:#F00" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>';
                    }
                    }
                                      
            ],
            "bPaginate": true,

            "sDom": '<"top"lf><"clear"><"title">t<"bottom"pi>r',
            "fnDrawCallback": function () {
                if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1) {
                    $('.dataTables_paginate').css("display", "block");
                } else {
                    $('.dataTables_paginate').css("display", "none");
                }
            }
        });

        $(".first.paginate_button, .last.paginate_button").hide();
    });

</script>
