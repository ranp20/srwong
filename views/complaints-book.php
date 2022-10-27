<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
require_once '../model/categories.php';
$categories = new Categories();

date_default_timezone_set('America/Lima');
$dateCurrent = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Señor Wong - Libro de reclamaciones</title>
    <?php require_once 'includes/inc_header_links.php';?>
    <!-- INCLUIR MEANMENU -->
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
    <!-- INCLUIR SCROLLUP -->
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
    <!-- INCLUIR CRYPTO-JS -->
    <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
    <!-- INCLUIR SWEET ALERT 2 -->
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<style type="text/css">
    .c_complaints-book{}
    .c_complaints-book__c{}
    .c_complaints-book__c--cTitle{
        display: block;
        font-size: 28px;
        margin-bottom: 1.25rem;
        text-align: center;
    }
    .data-company p {
  font-size: 12px;
  color: #222;
  line-height: 20px;
}
    .c_complaints-book__c--cContent{}
    .c_complaints-book__c--cContent form h4{
        font-size: 1rem;
    }
   .spn-help_usr {
    color: red;
    font-size: 12px;
}
    .text-descripcion{
        min-height: 110px;
        height: 110px;
    }
    .data-company{
        margin-bottom: 1rem;
    }
    .data-company p{
        color: red;
        font-weight: 600;
        margin-bottom: 0;
    }
    @media (min-width: 991px){
        .data-company p{
            font-weight: 600;
            margin-bottom: 0;
        }
        .data-company p:hover{
            color: red;
        }   
    }
    .button button{
        background-color: #e02c2b;
        border-radius: 3px;
        color: #fff;
        display: block;
        font-size: 14px;
        font-weight: 500;
        line-height: 1;
        padding: 18px 10px 19px;
        text-align: center;
        text-transform: uppercase;
        max-width: 300px;
        width: 100%;
        border: none;
        transition: all ease-in-out .2s;
        margin: 0 auto;
    }
    .button button:hover{
        background-color: #242424 !important;
    }
    #c_complaints-book span em{
        color: red !important;
    }
    span.pos-top-0 svg{
        top: 0 !important;
    }
.input-group .input-group-prepend .input-group-text {
    background-color: transparent !important;
    border-top: 0px solid #ebebeb;
    border-bottom: thin solid #ebebeb;
    border-right: 0px solid #ebebeb;
    border-left: 0px solid #ebebeb;
    position: relative !important;
    padding-left: 0px !important;
}
.chcksel-frm-cont select {

    border-top: 0px solid #ebebeb;
    border-radius: 5px;
    color: #242424;
    height: calc(1.2rem + 14px) !important;
    padding: 0 0 15px 0;
    border-left: 0px !important;
    border-bottom: 1px solid #ebebeb;
}
.chcksel-frm-cont input {

    height: 35px;

}
label {
    display: inline-block;
    margin-bottom: .1rem !important;
    font-size: 12px !important;
}


.input-group .form-control {

    border-top: 0px !important;
    border-left: 0px !important;
    border-right: 0px !important;
}
    .input-group .input-group-prepend .input-group-text svg{
        fill: #949494 !important;
        position: relative;
        top: 1px;
    }
    .input-group input.form-control{
        /*border-left: 0 !important;*/
    }
    .data-wky_frmtcode{
        color: red;
        margin-bottom: 1rem;
    }
</style>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Inicio</a></li>
          <li class="active">Libro de reclamaciones</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="category-page-area pt-50 pb-100">
    <div class="container" id="c_complaints-book">
      <div class="c_complaints-book">
          <div class="c_complaints-book__c">
              <div class="row">
                  <div class="m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                      <div class="chcksel-frm-cont">
                        <div class="c_complaints-book__c--cTitle">
                            <h3>LIBRO DE RECLAMACIONES</h3>
                        </div>
                        <div class="c_complaints-book__c--cContent">
                            <div class="page-body">
                                <h5 class="data-wky_frmtcode" style="text-align: center;">HOJA DE RECLAMACIÓN <span>SR-WNG-001-563669</span></h5>
                                <p style="font-size: 12px;line-height: 20px;text-align: center;">Conforme a lo establecido en el código de la Protección y Defensa del consumidor este establecimiento cuenta con un Libro de Reclamaciones a tu disposición. Registra la queja o reclamo aqui.</p>
                                <p style="text-align: center;font-size: 12px;">Al presentar tu reclamo autoriza el tratamiento de sus datos personales </p> <!----> 
                                <div class="body">
                                    <div class="data-company">
                                        <p>Fecha: <?= $dateCurrent; ?></p>
                                        <p>Razón Social : LIANG INVERSIONES SOCIEDAD ANONIMA CERRADA - LIANG INVERSIONES S.A.C.</p>
                                        <p>RUC: 20553277699</p>
                                        <p>Dirección Fiscal: AV. LOS JARDINES ESTE NRO. 173 URB. LAS FLORES SETENTIOCHO LIMA - LIMA - SAN JUAN DE LURIGANCHO.</p>
                                    </div>
                                    <div class="formulario" class="c_complaints-book__c--cContent__frm">
                                        <form method="POST" id="sr-frm_complaints-book">
                                        <!--<form autocomplete="off" method="POST" id="sr-frm_complaints-book">-->
                                            <p class="spn-help_usr">1. Identificación del Consumidor Reclamante</p>
                                            <div class="mb-3">
                                                <label for="">
                                                    <span>Nombre </span>
                                                    <span><em>*</em></span>
                                                </label>
                                                <div class="input-nombre-box input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text pos-top-0" id="basic-addon1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 21.793 23.048"><defs><style>.a{fill:#949494;}</style></defs><path class="a" d="M1914.682,1136.978l-4.821-1.8v-1.822a7.608,7.608,0,0,0,2.611-5.876c0-.215-.012-.427-.028-.638,0-.009,0-.017,0-.026s0-.007,0-.011c-.292-3.65-2.918-6.517-6.109-6.517-3.053,0-5.585,2.629-6.053,6.055,0,.027-.009.052-.01.078a8.413,8.413,0,0,0-.074,1.059,7.523,7.523,0,0,0,2.911,6.106v1.591l-4.848,1.8a4.056,4.056,0,0,0-2.673,3.82v1.671a.869.869,0,0,0,.869.869h20.055a.869.869,0,0,0,.869-.869v-1.671A4.07,4.07,0,0,0,1914.682,1136.978Zm-8.348-14.952c2.052,0,3.776,1.754,4.259,4.114-1.186.136-1.94-.33-2.7-1.653a.859.859,0,0,0-.772-.438.87.87,0,0,0-.754.467,4.037,4.037,0,0,1-3.2,1.566,3.486,3.486,0,0,1-1.053-.156C1902.661,1123.674,1904.344,1122.026,1906.334,1122.026Zm-4.39,5.658a5.389,5.389,0,0,0,1.229.137,6.388,6.388,0,0,0,3.9-1.464,3.876,3.876,0,0,0,3.133,1.553c.167,0,.338-.01.512-.027-.168,2.817-2.067,5.047-4.382,5.047C1903.965,1132.931,1902.033,1130.595,1901.945,1127.684Zm13.7,13.912h-18.315v-.8a2.318,2.318,0,0,1,1.529-2.187l5.424-2.012a.869.869,0,0,0,.567-.815v-1.333a5.185,5.185,0,0,0,3.275-.091v1.424a.868.868,0,0,0,.565.814l5.4,2.016a2.363,2.363,0,0,1,1.557,2.183Z" transform="translate(-1895.588 -1120.287)"/></svg>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="text" id="cmpbk-book_name" name="cmpbk-book_name" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Distrito 
                                                    <span><em>*</em></span>
                                                </label>
                                                <div class="select-distrito-box">
                                                    <select id="cmpbk-book_seldistric" name="cmpbk-book_seldistric" required>
                                                        <option selected="selected" disabled="disabled" value="" required>Seleccione...</option>
                                                        <option value="LIMA - ATE"> LIMA - ATE </option>
                                                        <option value="LIMA - BARRANCO">LIMA - BARRANCO </option>
                                                        <option value="LIMA - CHORRILLOS"> LIMA - CHORRILLOS</option>
                                                        <option value="LIMA - INDEPENDENCIA"> LIMA - INDEPENDENCIA</option>
                                                        <option value="LIMA - JESUS MARIA"> LIMA - JESUS MARIA</option>
                                                        <option value="LIMA - LA MOLINA"> LIMA - LA MOLINA</option>
                                                        <option value="LIMA - LA VICTORIA"> LIMA - LA VICTORIA</option>
                                                        <option value="LIMA - LIMA"> LIMA - LIMA</option>
                                                        <option value="LIMA - LINCE"> LIMA - LINCE</option>
                                                        <option value="LIMA - LOS OLIVOS"> LIMA - LOS OLIVOS</option>
                                                        <option value="LIMA - MAGDALENA"> LIMA - MAGDALENA</option>
                                                        <option value="LIMA - MIRAFLORES"> LIMA - MIRAFLORES</option>
                                                        <option value="LIMA - PUEBLO LIBRE"> LIMA - PUEBLO LIBRE</option>
                                                        <option value="LIMA - SAN BORJA"> LIMA - SAN BORJA</option>
                                                        <option value="LIMA - SAN ISIDRO"> LIMA - SAN ISIDRO</option>
                                                        <option value="LIMA - SAN JUAN DE LURIGANCHO"> LIMA - SAN JUAN DE LURIGANCHO</option>
                                                        <option value="LIMA - SAN JUAN DE MIRAFLORES"> LIMA - SAN JUAN DE MIRAFLORES</option>
                                                        <option value="LIMA - SAN LUIS"> LIMA - SAN LUIS</option>
                                                        <option value="LIMA - SAN MARTIN DE PORRES"> LIMA - SAN MARTIN DE PORRES</option>
                                                        <option value="LIMA - SAN MIGUEL"> LIMA - SAN MIGUEL</option>
                                                        <option value="LIMA - SANTA ANITA"> LIMA - SANTA ANITA</option>
                                                        <option value="LIMA - SURCO"> LIMA - SURCO</option>
                                                        <option value="LIMA - SURQUILLO"> LIMA - SURQUILLO</option>
                                                        <option value="TRUJILLO - TRUJILLO"> TRUJILLO - TRUJILLO</option>
                                                        <option value="CALLAO - BELLAVISTA"> CALLAO - BELLAVISTA</option>
                                                        <option value="CALLAO - CALLAO"> CALLAO - CALLAO</option>
                                                        <option value="CALLAO - LA PERLA"> CALLAO - LA PERLA  </option>
                                                    </select> <!---->
                                                </div> 
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Domicilio 
                                                    <span><em>*</em></span>
                                                </label> 
                                                <div class="input-domicilio-box input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 21.545 21.545"><defs><style>.a{fill:#949494;}</style></defs><path class="a" d="M1834.031,1132.766a.8.8,0,0,0-.112-.008h-10.724a.759.759,0,0,0,.314-.606v-2.758a.773.773,0,0,0-.773-.773h-2.758a.773.773,0,0,0-.773.773v3.364h-.066c-.008,0-.015,0-.023,0-.058,0-.116,0-.172,0a3.412,3.412,0,0,0-3.187,3.592v7.525a.773.773,0,0,0,.773.773h10.26v4.743a.773.773,0,1,0,1.546,0v-4.743h8.192a.773.773,0,0,0,.773-.773v-7.525A3.733,3.733,0,0,0,1834.031,1132.766Zm-13.28-2.6h1.212v1.212h-1.212v-1.212Zm-3.448,6.183a1.892,1.892,0,0,1,1.641-2.046c1.3,0,2,.637,2.33,2.128v6.67H1817.3Zm18.453,6.752H1822.82v-6.752a.717.717,0,0,0-.017-.158,5.217,5.217,0,0,0-.755-1.888h11.812a2.175,2.175,0,0,1,1.9,2.046Z" transform="translate(-1815.756 -1128.621)"/></svg>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="text" id="cmpbk-book_addresshome" name="cmpbk-book_addresshome" required>
                                                </div> 
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="input-dni-box col-md-6 mb-3">
                                                        <label for="">DNI/C.E:
                                                            <span><em>*</em></span>
                                                        </label> 
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 22.365 14.201"><defs><style>.a{fill:#949494;}</style></defs><g transform="translate(0 0)"><path class="a" d="M1909.073,1193.367h-20.626a.869.869,0,0,1-.869-.87v-12.462a.869.869,0,0,1,.869-.869h20.626a.869.869,0,0,1,.87.869V1192.5A.869.869,0,0,1,1909.073,1193.367Zm-19.756-1.739H1908.2V1180.9h-18.887Z" transform="translate(-1887.578 -1179.166)"/><g transform="translate(3.207 2.769)"><path class="a" d="M1900.5,1192h-5.077a.869.869,0,0,1-.87-.869v-5.078a.869.869,0,0,1,.87-.869h5.077a.869.869,0,0,1,.869.869v5.078A.869.869,0,0,1,1900.5,1192Zm-4.207-1.739h3.337v-3.338h-3.337Z" transform="translate(-1894.55 -1185.186)"/></g></g></svg>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" type="text" id="cmpbk-book_dni" name="cmpbk-book_dni" required>
                                                        </div>
                                                    </div>
                                                    <div class="input-phone-box col-md-6 mb-3">
                                                        <label for="">Teléfono 
                                                            <span><em>*</em></span>
                                                        </label> 
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 13.338 21.641"><defs><style>.a{fill:#949494;}</style></defs><g transform="translate(0)"><path class="a" d="M1961.794,1142.571h-8.3a2.521,2.521,0,0,0-2.518,2.518v16.6a2.521,2.521,0,0,0,2.518,2.518h8.3a2.521,2.521,0,0,0,2.518-2.518v-16.6A2.521,2.521,0,0,0,1961.794,1142.571Zm-9.243,5.037h10.183v11.567h-10.183Zm.941-3.459h8.3a.942.942,0,0,1,.94.941v.941h-10.183v-.941A.942.942,0,0,1,1953.491,1144.149Zm8.3,18.485h-8.3a.942.942,0,0,1-.941-.941v-.941h10.183v.941A.942.942,0,0,1,1961.794,1162.634Z" transform="translate(-1950.973 -1142.571)"/><path class="a" d="M1965.99,1186.737a.692.692,0,1,0,.692.692A.692.692,0,0,0,1965.99,1186.737Z" transform="translate(-1959.32 -1168.307)"/></g></svg>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" type="text" id="cmpbk-book_telephone" name="cmpbk-book_telephone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Email 
                                                    <span><em>*</em></span>
                                                </label> 
                                                <div class="input-email-box input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 22.265 15.453"><defs><style>.a{fill:#949494;}</style></defs><path class="a" d="M1778.016,557.016v0h0a2.766,2.766,0,0,0-2.105-.885h-16.651a2.761,2.761,0,0,0-2.128.913h0a2.825,2.825,0,0,0-.678,1.893v9.838a2.746,2.746,0,0,0,2.741,2.807h16.717a2.81,2.81,0,0,0,2.807-2.807v-9.838A2.817,2.817,0,0,0,1778.016,557.016Zm-2.66.941-7.417,5.882-8.017-5.882Zm.552,11.794h-16.717a.906.906,0,0,1-.912-.978V559.02l9.14,6.706a.915.915,0,0,0,1.11-.021l8.357-6.628v9.7A.967.967,0,0,1,1775.908,569.751Z" transform="translate(-1756.45 -556.127)"/></svg>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="email" id="cmpbk-book_email" name="cmpbk-book_email" required>
                                                </div> 
                                            </div>
                                            <div class="mb-3">
                                                <label for="">¿Eres menor de edad?</label> 
                                                <div class="box-radio-group">
                                                    <div class="form-floating row pl-3 lr-3">
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_age1" name="st_cmpbook_age" class="custom-control-input" checked="checked" value="SI">
                                                            <label class="custom-control-label" for="st_cmpbook_age1">SÍ</label>
                                                        </div>
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_age2" name="st_cmpbook_age" class="custom-control-input" value="NO">
                                                            <label class="custom-control-label" for="st_cmpbook_age2">NO</label>
                                                        </div>
                                                    </div>
                                                </div> <!----> <!----> 
                                            </div>
                                            <p class="spn-help_usr">2. Identificación del Bien Contratado (Marca Uno) *</p> 
                                            <div class="mb-3">
                                                <div class="box-radio-group">
                                                    <div class="form-floating row pl-3 lr-3">
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_treason1" name="st_cmpbook_treason" class="custom-control-input" checked="checked" value="Producto">
                                                            <label class="custom-control-label" for="st_cmpbook_treason1">Producto</label>
                                                        </div>
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_treason2" name="st_cmpbook_treason" class="custom-control-input" value="Servicio">
                                                            <label class="custom-control-label" for="st_cmpbook_treason2">Servicio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Monto reclamado 
                                                    <span><em>*</em></span>
                                                </label> 
                                                <div class="input-monto-box">
                                                    <input class="form-control form-control" type="text" id="cmpbk-book_amount" name="cmpbk-book_amount" maxlength="12" required>
                                                </div> 
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Descripción:
                                                    <span><em>*</em></span>
                                                </label>
                                                <div>
                                                    <textarea class="text-descripcion form-control" id="cmpbk-book_desc" name="cmpbk-book_desc" id="" cols="30" rows="10" required></textarea>
                                                </div>
                                            </div>
                                            <p class="spn-help_usr">3. Detalle de Reclamación y Pedido del Consumidor *</p>
                                            <div class="mb-3">
                                                <div class="box-radio-group">
                                                    <div class="form-floating row pl-3 lr-3">
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_tdetailreason1" name="st_cmpbook_tdetailreason" class="custom-control-input" checked="checked" value="Reclamo">
                                                            <label class="custom-control-label" for="st_cmpbook_tdetailreason1">Reclamo</label>
                                                        </div>
                                                        <div class="custom-control custom-radio d-block mb-2">
                                                            <input type="radio" id="st_cmpbook_tdetailreason2" name="st_cmpbook_tdetailreason" class="custom-control-input" value="Queja">
                                                            <label class="custom-control-label" for="st_cmpbook_tdetailreason2">Queja</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Detalle:
                                                    <span><em>*</em></span>
                                                </label>
                                                <div>
                                                    <textarea class="text-descripcion" id="cmpbk-book_cli-details" name="cmpbk-book_cli-details" cols="30" rows="7" required></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Pedido:
                                                    <span><em>*</em></span>
                                                </label>
                                                <div>
                                                    <textarea class="text-descripcion form-control" id="cmpbk-book_order" name="cmpbk-book_order" cols="30" rows="7" required></textarea> <!---->
                                                </div>
                                            </div>
                                            <p class="spn-help_usr">4. Observaciones y acciones adoptadas por el proveedor</p> 
                                            <div class="mb-3">
                                                <label for="">Detalle: </label> 
                                                <div>
                                                    <textarea class="text-descripcion form-control" id="cmpbk-book_prov-details" name="cmpbk-book_prov-details" cols="30" rows="7" required></textarea>
                                                </div>
                                            </div>
                                            <div class="reclamo-queja">
                                                <p style="font-size: 11px;margin-bottom: 0px;line-height: 15px;">RECLAMO: Disconformidad relacionada con los productos o servicios.</p> 
                                                 <p style="font-size: 11px;margin-bottom: 0px;line-height: 15px;">QUEJA : Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto a la atención al público.</p>
                                                 <p style="font-size: 11px;margin-bottom: 0px;line-height: 15px;">*La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</p> 
                                                 <p style="font-size: 11px;margin-bottom: 0px;line-height: 15px;">* El proveedor debe dar respuesta al reclamo o queja en un plazo no mayor a quince (15) días hábiles, el cual es improrrogable.</p> 
                                                <p class="consumidor talign-r">CONSUMIDOR</p>
                                            </div> 
                                            <!--
                                            <div class="recaptcha">
                                                <div data-v-3b3e8ca9="" class="recaptcha">
                                                    <div data-v-3b3e8ca9="">
                                                        <div style="width: 304px; height: 78px;">
                                                            <div>
                                                                <iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdQarkUAAAAAP5i_-Ul65J2z2TYQmFbISiAHKk2&amp;co=aHR0cHM6Ly93d3cuY2hpbmF3b2suY29tLnBlOjQ0Mw..&amp;hl=es-419&amp;v=vP4jQKq0YJFzU6e21-BGy3GP&amp;size=normal&amp;cb=x02e9hih0pie" width="304" height="78" role="presentation" name="a-429u6bf69pwo" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe>
                                                            </div>
                                                            <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                        </div>
                                                        <iframe style="display: none;"></iframe>
                                                    </div>
                                                </div>
                                            </div> 
                                            -->
                                            <div id="tv-01cfbvalcmpbookfrm">
                                                <div class="button">
                                                    <button type="submit"> Enviar  </button>
                                                </div>
                                            </div>
                                        </form>
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
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/complaints-book.js"></script>
</body>
</html>