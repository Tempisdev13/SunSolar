<div class="section">
            <main class="container-fluid">
                <div class="ps-3 pt-4 pb-5">

                </div>

                <form class="wizard" id="formWizard">

                    <aside class="wizard-content container" id="ubicacion">
                        <div class="wizard-step ubicacion" data-title="Ubicación sucursal">
                            <div class="form-card">

                                <div class="row js-appear-enabled animated fadeIn" data-toggle="appear"
                                    style="margin-bottom:20px;" ;>
                                    <!-- Row #1 -->

                                    <?php if ($b_seccion_filtro_negocio) { ?>
                                    <div class="col-4 col-sm-4" <?=($id_ticket > 0)?"style='display:none'":'' ?>>
                                        <div class="">
                                            <label for="material-text">Negocio</label>
                                            <select class="form-control" id="cmbNegocio"
                                                onchange="cambiarNegocioTicket(2);" name="cmbNegocio">
                                                <option data-id_marca="0" value="0" disabled>Selecciona un negocio
                                                </option>
                                                <?php
foreach ($lista_negocios as $negocio) {
$selected = "";
if ($negocio['id_negocio'] == $id_negocio) {
$selected = "selected";
$nombre_negocio = $negocio['vc_nombre'];

}
?>
                                                <option data-id_marca="<?=$negocio['id_marca']?>"
                                                    value="<?=$negocio['id_negocio']?>" <?=$selected?>>
                                                    <?=$negocio['vc_nombre']?></option>
                                                <?php
}
?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php }else{ 
foreach ($lista_negocios as $negocio) {
if ($negocio['id_negocio'] == $id_negocio) {
$nombre_negocio = $negocio['vc_nombre'];
break;
}
}
?>
                                    <input type="hidden" id="txtIdNegocio" value="<?=$id_negocio?>">
                                    <?php } if ($b_seccion_filtro_negocio) { ?>
                                    <div class="col-4 col-sm-4" <?=($id_ticket > 0)?"style='display:'":'' ?>>
                                        <div class="">
                                            <label for="cmbPaises">Países</label>
                                            <select class="form-control" id="cmbPaises"
                                                onchange="cambiarPaisRegistroTicket(this)" name="cmbPaises">
                                                <option data-id_marca="0" value="0" disabled>Selecciona un pais</option>
                                                <?php

foreach ($lista_paises as $pais) {
$selected = "";
if ($negocio['id_pais'] == $id_pais) {
$selected = "selected";
$nombre_pais = $negocio['vc_nombre'];
}
?>
                                                <option data-vc_codigo_pais="<?=$pais['vc_codigo']?>"
                                                    value="<?=$pais['id_pais']?>" <?=$selected?>><?=$pais['vc_nombre']?>
                                                </option>
                                                <?php
}
?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php }if($b_seccion_filtro_sucursal) { ?>
                                    <div class="col-4 col-sm-4">
                                        <div class="">
                                            <label for="material-text">Sucursal</label>
                                            <select class="form-control" id="cmbSucursales" name="cmbSucursales"
                                                onchange="cambioSucursal(2);">
                                                <option value="0" selected disabled>
                                                    Selecciona una sucursal</option>
                                                <?php
foreach ($lista_sucursales as $sucursal) {
$selected = "";
if ($sucursal['id_sucursal'] == $id_sucursal) {
$selected = "selected";
$nombre_sucursal = $sucursal['vc_nombre'];
}
if ($sucursal['id_negocio'] == $id_negocio) {
?>
                                                <option value="<?=$sucursal['id_sucursal']?>" <?=$selected?>>
                                                    <?=$sucursal['vc_nombre']?>
                                                </option>
                                                <?php
}
}
?>
                                            </select>
                                            <input type="hidden" id="txtIdPais" value="<?=$id_pais?>">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>




                        <div class="wizard-step" data-title="Usuario">
                            <div class="form-card">
                                <div class="col-md-4 justify-content-center align-self-center d-none">
                                    <label class="css-control css-control-sm css-control-primary css-switch">
                                        <input type="checkbox" class="css-control-input" id="chkClienteNuevo"
                                            checked="true" name="chkClienteNuevo">
                                        <span class="css-control-indicator"></span> ¿Es un
                                        cliente nuevo?
                                        <input type="hidden" id="txtIdCliente" name="txtIdCliente" disabled=""
                                            value="<?= isset($id_cliente)?$id_cliente:0; ?>">
                                        <input type="hidden" id="txtIdClienteDet" name="txtIdClienteDet" disabled=""
                                            value="<?= isset($id_cliente_detalle)?$id_cliente_detalle:0; ?>">
                                        <input type="hidden" id="txtIdClienteDir" name="txtIdClienteDir" disabled=""
                                            value="<?= isset($id_cliente_direccion)?$id_cliente_direccion:0; ?>">
                                    </label>
                                </div>

                                <div class="row" style="display:flex; align-items:end;">
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="form-material">
                                            <input type="text" class="input-cliente form-contol " id="txtNombre"
                                                name="txtNombre" value="<?=$cliente_nombre?>"
                                                placeholder="Ingresa el nombre">
                                            <label for="txtNombre">Nombre*</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <label for="txtApellidos">Apellidos</label>
                                        <input type="text" class="input-cliente form-control" id="txtApellidos"
                                            name="txtApellidos" value="<?=$cliente_apellidos?>"
                                            placeholder="Ingresa los apellidos">
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="input-cliente form-control" id="txtTelCelular"
                                            name="txtTelCelular" value="<?=$cliente_tel_celular?>"
                                            placeholder="Ingresa Teléfono celular a 10 digitos">
                                    </div>

                                    <div class="col-md-3 d-none">
                                        <div class="form-material input-group">
                                            <input type="text" class="form-control" id="txtTelFijo" name="txtTelFijo"
                                                value="<?=$cliente_tel_casa?>"
                                                placeholder="Ingresa Teléfono fijo o casa">
                                            <label for="txtTelFijo">Teléfono Fijo*</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa fa fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-material input-group">
                                            <input type="text" class="input-cliente" id="txtEmail" name="txtEmail"
                                                value="<?=$cliente_email?>" placeholder="ejemplo@ejemplo.com">
                                            <label for="txtEmail">Email*</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-material">
                                            <input type="text" class="input-cliente" id="txtTelOficina"
                                                name="txtTelOficina" value="<?=$cliente_tel_oficina?>"
                                                placeholder="Ingresa Teléfono de oficina">
                                            <label for="txtTelOficina">Otro teléfono</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <label for="txtExtension">Extension</label>
                                        <input type="text" name="txtExtension" placeholder="051" minlength="10"
                                            maxlength="10" id="txtExtension" value="<?=$cliente_extencion_tel?>"
                                            class="input-cliente">
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-xs-12">
                                        <div class="form-material">
                                            <input type="text" class="input-cliente" id="txtRFC" name="txtRFC"
                                                value="<?=$cliente_rfc?>" placeholder="">
                                            <label for="txtRFC">RFC</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="display:flex; align-items:end;">
                                    <div class="col-12">
                                        <div id="flotante-2" style="display:none;">
                                            <div class="alertr-2 alert-danger" role="alertr-2">
                                                <button type="button" class="close" data-dismiss="alertr-2"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                No se encuentra registrado este usuario
                                            </div>

                                        </div>

                                        <div id="flotante" style="display:none;">
                                            <div class="alertr alert-success" role="alertr">
                                                <button type="button" class="close" data-dismiss="alertr"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                Se ha encontrado 1 coincidencia!
                                            </div>
                                            <table class="table  table-hover" id="infoTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col">Municipio</th>
                                                        <th scope="col">Colonia</th>
                                                        <th scope="col">Calle</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr data-wizard="next">
                                                        <td scope="row">1</td>
                                                        <td scope="row">Tamaulipas</td>
                                                        <td scope="row">El mante</td>
                                                        <td scope="row">Enrique Cardenas
                                                            Gonzalez</td>
                                                        <td scope="row">Antonio Casso</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="wizard-step" data-title="Dirección">
                            <div class="container-fluid text-left">
                                <div id="ok" class="alert alert-success" style="display:none" role="alert">Registro
                                    precargado
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group" id="colCalle">
                                        <div class="">
                                            <label for="txtCalle" id="txtCalleL">Calle*</label>
                                            <input type="text" class="form-control validaDireccionMapa" id="txtCalle"
                                                name="txtCalle" value="<?=$direccion_calle?>"
                                                placeholder="Ingresa el nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group" id="colNumExt">
                                        <div class="">
                                            <label for="txtNumExt" id="txtNumExtL">Número
                                                Exterior*</label>
                                            <input type="text" class="form-control validaDireccionMapa" id="txtNumExt"
                                                name="txtNumExt" value="<?=$direccion_num_ext?>"
                                                placeholder="Ingresa el numero exterior">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group " id="colNumInt">
                                        <div class="">
                                            <label for="txtNumInt" id="txtNumIntL">Número
                                                Interior</label>
                                            <input type="text" class="form-control" id="txtNumInt" name="txtNumInt"
                                                value="<?=$direccion_num_int?>"
                                                placeholder="Ingresa el numero interior">
                                        </div>
                                    </div>


                                    <div class="col-md-3 form-group" id="colColonia">
                                        <div class="">
                                            <!--input type="text" class="form-control validaDireccionMapa" id="txtColonia" name="txtColonia" value="<?=$direccion_colonia?>" placeholder="Ingresa el nombre de la colonia"-->
                                            <label for="cmbColonia" id="cmbColoniaL">Colonia*</label>
                                            <select class="form-control selectpicker" id="cmbColonia" name="cmbColonia"
                                                onchange="cambiarColonia(this, 'txtCodigoPostal','cmbColonia','txtMunicipio','cmbEstados')">
                                                <option value="0">Selecciona una Colonia
                                                </option>
                                                <?php if ($direccion_colonia != "") { ?>
                                                <option value="<?=$direccion_colonia?>" selected>
                                                    <?=$direccion_colonia?></option>
                                                <?php } ?>
                                                <option value='-1' data-icon='fa fa-plus'>
                                                    Agregar Colonia
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/div>
                                            <div class="form-group row"-->
                                    <div class="col-md-3 form-group " id="colEntreCalles">
                                        <div class="">
                                            <label for="txtEntreCalles " id="txtEntreCallesL">Entre Calles</label>
                                            <input type="text" class="form-control" id="txtEntreCalles"
                                                name="txtEntreCalles" value="<?=$direccion_entre_calles?>"
                                                placeholder="Ingresa entre que calles">
                                        </div>
                                    </div>

                                    <div class="col-md-3 form-group " id="colManzana">
                                        <div class="">
                                            <label for="txtManzana" id="txtManzanaL">Manzana</label>
                                            <input type="text" class="form-control" id="txtManzana" name="txtManzan"
                                                value="<?=$direccion_manzana?>" placeholder="Ingresa la manzana">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group " id="colLote">
                                        <div class="">
                                            <label for="txtLote" id="txtLoteL">Lote</label>
                                            <input type="text" class="form-control" id="txtLote" name="txtLote"
                                                value="<?=$direccion_municipio?>" placeholder="Ingresa el lote">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group" id="colEdificio">
                                        <div class="">
                                            <label for="txtEdificio" id="txtEdificioL">Edificio</label>
                                            <input type="text" class="form-control" id="txtEdificio" name="txtEdificio"
                                                value="<?=$direccion_edificio?>"
                                                placeholder="Ingresa el nombre del edificio">
                                        </div>
                                    </div>
                                    <!--/div>
                                            <div class="row"-->
                                    <div class="col-md-3 form-group" id="colReferencia">
                                        <div class="">
                                            <label for="txtReferencias" id="txtReferenciasL">Referencias*</label>
                                            <input type="text" class="form-control" id="txtReferencias"
                                                name="txtReferencias" value="<?=$direccion_referencias?>"
                                                placeholder="Ingresa referencias de la dirección">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group" id="colDelegacion">
                                        <div class="">
                                            <label for="txtDelegacion" id="txtDelegacionL">Delegación</label>
                                            <input type="text" class="form-control" id="txtDelegacion"
                                                name="txtDelegacion" value="<?=$direccion_delegacion?>"
                                                placeholder="Ingresa la delegación">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group" id="colMunicipio">
                                        <div class="">
                                            <label for="txtMunicipio" id="txtMunicipioL">Municipio*</label>
                                            <input type="text" class="form-control validaDireccionMapa"
                                                id="txtMunicipio" name="txtMunicipio" value="<?=$direccion_municipio?>"
                                                placeholder="Ingresa el municipio">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group" id="colZona" style="display:'';">
                                        <div class="">
                                            <label for="txtZona" id="txtZonaL">Zona</label>
                                            <input type="text" class="form-control" id="txtZona" name="txtZona"
                                                value="<?=$direccion_zona?>"
                                                placeholder="Ingresa la zona de la dirección">
                                        </div>
                                    </div>
                                    <!--/div>
                                            <div class="row"-->
                                    <div class="col-md-3 form-group" id="colEstado">
                                        <div class="">
                                            <label for="cmbEstados" id="cmbEstadosL">Estado*</label>
                                            <select class="form-control validaDireccionMapa selectpicker"
                                                id="cmbEstados" name="cmbEstados">
                                                <!--option value="0" selected disabled="true">Selecciona un estado</option-->
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--div class="dropdown-divider"></div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <div class="form-material">
                                                        <select class="form-control" id="cmbTecnicos" name="cmbTecnicos">
                                                            <option value="0" selected disabled="true">Selecciona un técnico</option>
                                                        </select>
                                                        <label for="cmbTecnicos">Asignar Técnico</label>
                                                    </div>
                                                </div>
                                            </div-->
                                <div class="row">
                                    <div class="col-md-4 form-group" id="colLatitud">
                                        <div class="">
                                            <label for="txtLatitud" id="txtLatitudL">Latitud*</label>
                                            <input type="text" class="form-control txtLatitud" id="txtLatitud"
                                                name="txtLatitud" value="<?=$direccion_latitud;?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group" id="colLongitud">
                                        <div class="">
                                            <label for="txtLongitud" id="txtLongitudL">Longitud</label>
                                            <input type="text" class="form-control txtLongitud" id="txtLongitud"
                                                name="txtLongitud" value="<?=$direccion_longitud;?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <button style="margin-top: 26px;" type="button"
                                            class="btn btn-alt-primary button-submit" id="btnActualizaMapa"
                                            data-wizard="finish" onclick="actualizaDireccionMapa()" disabled=true>
                                            <i class="fa fa-map-marker mr-5"></i> Actualiza
                                            Dirección Mapa
                                        </button>
                                    </div>
                                    <div class="col-md-12 form-group" style="height: 300px;">
                                        <div id="map"
                                            style="width: 100%; height: 100%;min-height: 300px; border-radius:10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="wizard-step" data-title="Servicio">
                            <div class="container-fluid">
                                <div class="col-12">
                                    <h5 style="margin-top:30px; text-align:left;">Servicio
                                    </h5>
                                </div>
                                <div class="row" style="margin-bottom:20px;" ;>
                                    <div class="col-lg-6">
                                        <input type="hidden" id="txtIdArticulo" name="txtIdArticulo"
                                            value="<?=$id_articulo?>">
                                        <input type="hidden" id="txtIdServicio" name="txtIdServicio"
                                            value="<?=$id_servicio?>">
                                        <input id="txtFolioInterno" name="txtFolioInterno" type="hidden"
                                            class="form-control" value="<?=$no_folio?>" placeholder="No. Folio">
                                        <input id="txtId_marca" name="txtId_marca" type="hidden" class="form-control"
                                            value="<?=$id_marca?>">
                                        <input id="txtId_negocio" name="txtId_negocio" type="hidden"
                                            class="form-control" value="<?=$id_negocio?>">
                                        <input id="txtId_sucursal" name="txtId_sucursal" type="hidden"
                                            class="form-control" value="<?=$id_sucursal?>">
                                        <div class="col-12 form-group">
                                            <div class="form-material">
                                                <label for="txtBuscarServicio">Buscar
                                                    servicios</label>

                                                <input type="text" class=" form-control"
                                                    style="color: #575757;background-color: #fff;border: 2PX SOLID #EEEFFA;"
                                                    id="txtBuscarServicio" name="txtBuscarServicio"
                                                    data-id_servicio="<?=$id_servicio?>" data-id_servicio_relacion="0"
                                                    value="<?=$servicio?>" placeholder="Servicios..">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="well well-lg">
                                                <table class="table" id="t_draggable1"
                                                    style="font-size: 13px; border:2PX SOLID #EEEFFA; border-radius:10px; text-align:left;">

                                                    <thead>
                                                        <tr
                                                            style='cursor: -webkit-grab; cursor: default; color:#444648; font-weight:600;'>
                                                            <th># SKU</th>
                                                            <th>Descripción</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="t_sortable" id="tbody_visita"
                                                        style='color:#B5B7CE; font-weight:600;'>
                                                        <?php
    if (count($servicios_ticket) <= 0) {
?>
                                                        <tr>
                                                            <td colspan="5" style="text-align: center;">
                                                                Selecciona
                                                                un servicio</td>
                                                        </tr>
                                                        <?php
    }else{
        foreach ($servicios_ticket as $serv) {
?>
                                                        <tr id='item_servicio'
                                                            style='cursor: -webkit-grab; cursor: pointer;'
                                                            data-SKU='<?=$serv['vc_sku']?>'
                                                            data-servicio='<?=$serv['id_servicio']?>'
                                                            data-id_ticket_servicio='<?=$serv['id_ticket_servicio']?>'
                                                            data-servicio_desc='<?=$serv['vc_titulo']?>'
                                                            data-f_costo_negocio='<?=$serv['f_costo_negocio']?>'
                                                            data-id_tipo_servicio='<?=$serv['id_tipo_servicio']?>'
                                                            data-f_costo_previo='<?=$serv['f_costo_previo']?>'
                                                            data-f_costo_cliente='<?=$serv['f_costo_cliente']?>'
                                                            data-f_ganancia_tecnico="<?=$serv['f_ganancia_tecnico']?>"
                                                            data-i_tipo='<?=$serv['i_tipo']?>'
                                                            data-i_status='<?=$serv['i_status']?>'>
                                                            <td class='col-sm-2 form-group'>
                                                                <p class='sku_item'
                                                                    data-id_servicio='<?=$serv['id_servicio']?>'>
                                                                    <?=$serv['vc_sku']?></p>
                                                            </td>
                                                            <td class='col-sm-7 form-group'>
                                                                <?=$serv['vc_titulo']?>
                                                            </td>
                                                            <td class='col-sm-1 form-group'>
                                                                <input type='text' style="text-align: right;"
                                                                    id='txtCantidad_<?=$serv['vc_sku']?>'
                                                                    name='txtCantidad_<?=$serv['vc_sku']?>'
                                                                    maxlength='2' required
                                                                    onkeypress='return isNumberKey(event)'
                                                                    onkeyup='calculaPrecioItem("<?=$serv['vc_sku']?>", <?=$serv['f_costo_total']?>, <?=$serv['id_tipo_servicio']?>)'
                                                                    class='form-control cantidad_item'
                                                                    value='<?=$serv['f_cantidad']?>' />
                                                            </td>
                                                            <td class='col-sm-1 form-group' style="text-align: right;">
                                                                <p class='costo_item' id='pago_<?=$serv['vc_sku']?>'>
                                                                    $<?=$serv['f_costo_total']?>
                                                                </p>
                                                            </td>
                                                            <td class='col-sm-1 form-group'
                                                                style='text-align: center;vertical-align: middle;'>
                                                            </td>
                                                        </tr>
                                                        <?php
        }
    }
?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr style="text-align: right;">
                                                            <td colspan="3">Total:</td>
                                                            <td><label id="lblTotalVisita">$<?=$costo_cliente?></label>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="well well-lg" style="display: none;">
                                                <h4>Precotización</h4>
                                                <table class="table" id="t_draggable2">
                                                    <tbody class="t_sortable" id="tbody_pre_cotiza">
                                                        <!-- SE CARGAN LOS DATOS CON AJAX -->
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3">Total:</td>
                                                            <td><label id="lblTotalPreCotiza">$0</label>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!--div class="form-group">
														<label class="css-control css-control-sm css-control-primary css-switch">
															<input type="checkbox" class="css-control-input" id="chkCargo" name="chkCargo">
															<span class="css-control-indicator"></span> ¿Es servicio con cargo?
														</label>
                                                    </div-->


                                        </div>
                                        <div class="col-12 text-left" style="margin-top:50px;">
                                            <div class="sec-articulos" id="sec-articulos">
                                                <h5 style="margin-top:30px;">Productos</h5>

                                                <div class="tab-pane active" id="tabArticulo" role="tabpanel">
                                                    <div class="row justify-content-between">
                                                        <div class="col-lg-12 form-group">
                                                            <div class="row ">
                                                                <div class="col-md-11 autocompleate_config">
                                                                    <label for="txtBuscarModelo">Buscar
                                                                        productos</label>
                                                                    <input type="text"
                                                                        style="color: #575757;background-color: #fff;border: 2PX SOLID #EEEFFA;"
                                                                        class="form-control" id="txtBuscarModelo"
                                                                        name="txtBuscarModelo"
                                                                        data-id_articulo="<?=$id_articulo?>" value=""
                                                                        placeholder="Modelo..">
                                                                    <input type="hidden" id="txtIdArticulo"
                                                                        name="txtIdArticulo" value="<?=$id_articulo?>">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-material input-group">
                                                                        <?php  if($b_seccion_registrar_articulo){ ?>
                                                                        <button type="button"
                                                                            style="background-color: #F9B22F;border-color: #F9B22F; color:#000; margin-left:-15px;"
                                                                            class="btn btn-outline-secondary"
                                                                            id="btnModalArticulo"
                                                                            name="btnModalArticulo"
                                                                            onclick="abrirModalArticulo()">
                                                                            <i class="fa fa-plus"
                                                                                style="color:#fff;"></i>

                                                                        </button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="well well-lg">
                                                                <table class="table" id="tablaArticulos"
                                                                    style="font-size: 13px; border:2PX SOLID #EEEFFA; border-radius:10px;">
                                                                    <thead>

                                                                        <tr
                                                                            style='cursor: -webkit-grab; cursor: default; color:#444648; font-weight:600;'>
                                                                            <th># SKU</th>
                                                                            <th>Modelo</th>
                                                                            <th>Nombre</th>
                                                                            <th>Cantidad
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="t_sortable" id="tbody_visita"
                                                                        style='color:#B5B7CE; font-weight:600;'>
                                                                        <?php
    if (count($articulos_ticket) <= 0) {
		$articulo_auto = "";
?>
                                                                        <!--tr >
                                                                    <td colspan="5" style="text-align: center;">Selecciona un servicio</td>
                                                                </tr-->
                                                                        <?php
    }else{
        foreach ($articulos_ticket as $art) {
			$articulo_auto = $art['vc_modelo']." - ".$art['vc_nombre'];
?>
                                                                        <tr id='item_articulo'
                                                                            style='cursor: -webkit-grab; cursor: pointer;'
                                                                            data-SKU='<?=$art['vc_sku']?>'
                                                                            data-id_articulo='<?=$art['id_articulo']?>'
                                                                            data-id_linea_producto='<?=$art['id_linea_producto']?>'>
                                                                            <td class='col-sm-2 form-group'>
                                                                                <p class='sku_item'
                                                                                    data-id_articulo='<?=$art['id_articulo']?>'>
                                                                                    <?=$art['vc_sku']?>
                                                                                </p>
                                                                            </td>
                                                                            <td class='col-sm-2 form-group'>
                                                                                <?=$art['vc_modelo']?>
                                                                            </td>
                                                                            <td class='col-sm-7 form-group'>
                                                                                <?=$art['vc_nombre']?>
                                                                            </td>
                                                                            <td class='col-sm-1 form-group'>
                                                                                <input style="text-align: right;"
                                                                                    type='text' id='txtCantidad_"+sku+"'
                                                                                    name='txtCantidad_><?=$art['vc_sku']?>'
                                                                                    maxlength='2' required
                                                                                    class='form-control cantidad_item'
                                                                                    value='1' />
                                                                            </td>
                                                                            <a style='cursor: pointer;'
                                                                                data-toggle='collapse'><span
                                                                                    title='Ver datos de Cliente'
                                                                                    data-toggle='tooltip'
                                                                                    class='glyphicon glyphicon-remove-sign btnEliminaRow'
                                                                                    aria-hidden='true'></span></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
        }
    }
?>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="">
                                                                    <label for="txtNumSerie">Número
                                                                        de
                                                                        Serie</label>
                                                                    <input type="text" class="form-control"
                                                                        id="txtNumSerie" name="txtNumSerie"
                                                                        value="<?=$vc_num_serie?>" placeholder="">
                                                                    <input type="hidden" id="txtIdClienteArticulo"
                                                                        name="txtIdClienteArticulo"
                                                                        value="<?=$id_cliente_articulo?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="">
                                                                    <label for="txtFechaCompra">Fecha
                                                                        de
                                                                        compra</label>
                                                                    <input type="text" class="form-control datepicker"
                                                                        id="dpkFechaCompra" name="dpkFechaCompra"
                                                                        value="<?=$vc_fecha_compra?>" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="">
                                                                    <label for="cmbLugarCompraArticuloCliente ">Donde
                                                                        lo compro</label>
                                                                    <select class="form-control selectpicker"
                                                                        id="cmbLugarCompraArticuloCliente"
                                                                        name="cmbLugarCompraArticuloCliente"
                                                                        onchange="cambiarLugaresCompra($(this))">

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="cmbServicioCargo">Tipo
                                                                    de
                                                                    Cargo del
                                                                    Servicio</label>
                                                                <select class="form-control selectpicker"
                                                                    id="cmbServicioCargo" name="cmbServicioCargo">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 d-none">
                                                            <div class="form-group">
                                                                <div class="">
                                                                    <label for="cmbGarantiaNegocio">Tipo
                                                                        de garantia</label>
                                                                    <select class="form-control selectpicker"
                                                                        id="cmbGarantiaNegocio"
                                                                        name="cmbGarantiaNegocio">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <h3 id='tltIncluye'>SKU:
                                            #<?=$sku_ticket?></h3>
                                        <div class="blocks">
                                            <!-- Step Tabs -->
                                            <ul class="nav nav-tabs nav-tabs-block nav-fill" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#tabIncluye"
                                                        data-toggle="tab">Incluye</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#tabNoIncluye" data-toggle="tab">No
                                                        incluye</a>
                                                </li>
                                            </ul>

                                            <div class="block-content block-content-full tab-content">
                                                <div class="tab-pane active" id="tabIncluye" role="tabpanel">
                                                    <ul class='list-group'
                                                        style="
                                                                                 height:40em;overflow-x: hidden;  overflow-y: scroll;width: 100%;">
                                                        <?php
    if (count($servicios_ticket) > 0) {
        foreach ($servicios_ticket as $serv) {
            if ($serv['incluye']) {
                foreach ($serv['incluye'] as $incluye) {
            
?>
                                                        <li class='list-group-item'
                                                            style="border:1px solid #EEEFFA; text-align:left;">
                                                            <?=$incluye['vc_descripcion']?>
                                                        </li>
                                                        <?php
                }
            }else{
?>
                                                        <li class='list-group-item'>Sin
                                                            datos</li>
                                                        <?php
            }
        }
    }
?>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tabNoIncluye" role="tabpanel">
                                                    <ul class='list-group'
                                                        style="
                                                                                      height:40em;overflow-x: hidden;  overflow-y: scroll;width: 100%;">
                                                        <?php
    if (count($servicios_ticket) > 0) {
        foreach ($servicios_ticket as $serv) {
            if ($serv['no_incluye']) {
                foreach ($serv['no_incluye'] as $incluye) {
?>
                                                        <li class='list-group-item' style="border:1px solid #EEEFFA; text-align:left;
                                                                                
                                                                                    ">
                                                            <?=$incluye['vc_descripcion']?>
                                                        </li>
                                                        <?php
                }
            }else{
?>
                                                        <li class='list-group-item'>Sin
                                                            datos</li>
                                                        <?php
            }
        }
    }
?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>




                        <div class="wizard-step" data-title="Disponibilidad">
                            <div class="container-fluid" style="margin-bottom: 20px;">
                                <input type="hidden" id="txt_b_valida_area" name="txt_b_valida_area" value="0">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <div class="">
                                            <label for="txtCodigoPostal">Código
                                                Postal*</label>
                                            <input type="text" class="form-control" id="txtCodigoPostal"
                                                name="txtCodigoPostal" value="<?=$direccion_codigo_postal?>"
                                                placeholder="Ejemplo: 64000">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="dpkFechaServicio">Fecha*</label>
                                        <div class="input-group">
                                            <!-- <input type="text" class="js-datepicker form-control datepicker fechas_ticket" id="dpkFechaServicio" name="dpkFechaServicio" value="<?=$fecha_servicio?>" placeholder="dd/mm/yyyy" autocomplete="off"> -->
                                            <input type="text" class="form-control datepicker fechas_ticket"
                                                id="dpkFechaServicio" name="dpkFechaServicio" placeholder="dd/mm/yyyy"
                                                autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="cmbHorariosServicio">Horario de
                                            servicio*</label>
                                        <div class="">
                                            <select class="form-control horarios_ticket" id="cmbHorariosServicio"
                                                name="cmbHorariosServicio">
                                                <option value="0" selected disabled="true">
                                                    Selecciona un horario
                                                </option>
                                                <?php
    foreach ($lista_horarios as $horario) {
        $selected = "";
        if ($horario['id_horario'] == $id_horario) {
            $selected = "selected";
            $horario_servicio = $horario['vc_rango_horario'];
        }

?>
                                                <option value="<?=$horario['id_horario']?>" <?=$selected?>>
                                                    <?=$horario['vc_rango_horario']?>
                                                </option>
                                                <?php
    }
?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="dtpFechaAsignacion">Fecha de asignación
                                            <button class="popover-verde" data-toggle="popover"
                                                title="Fecha de Asignación" data-placement="top"
                                                data-content="Fecha de registro/asignación dada por el cliente (WHIRLPOOL)"><i
                                                    class="far fa-question-circle"></i></button></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datetimepicker"
                                                id="dtpFechaAsignacion" name="dtpFechaAsignacion"
                                                placeholder="dd/mm/yyyy hh-mm-ssss" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="colTecnicos">
                                        <?php if($b_seccion_gestion_tecnico_ticket){ ?>
                                        <div class="">
                                            <label for="cmbTecnicos">Asignar Técnico</label>
                                            <select class="form-control" id="cmbTecnicos" name="cmbTecnicos">
                                                <option value="0" selected disabled="true">
                                                    Selecciona un técnico
                                                </option>
                                            </select>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <div class="">
                                            <label for="txtFolioExterno">Folio
                                                externo*</label>
                                            <input type="text" class="form-control" id="txtFolioExterno"
                                                name="txtFolioExterno" maxlength="50" value="<?=$no_folio_externo?>"
                                                placeholder="Ejemplo: XXXXXX">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtComentariosServicio">Comentarios
                                                del servicio</label>
                                            <textarea class="form-control" id="txtComentariosServicio"
                                                name="txtComentariosServicio" style="overflow:auto;resize:none"
                                                value="<?=$comentarios_servicio?>" rows="5"
                                                onfocusout="guardarTicketTemporal(<?=$id_ticket?>);"><?=$comentarios_servicio?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


        </div>

        </aside>
        </form>
        </main>
    </div>