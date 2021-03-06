<?php
require_once 'logica/Facturacion.php';
require_once 'persistencia/FacturacionDAO.php';

$facturas = new Facturacion($_GET['idFactura']);
$facturas->consultar();
?>

<script type="text/javascript" src="https://cloud.n1ed.com/cdn/PDE4DFLT/n1tinymce.js"></script>

<div class="modal-header">
    <h5 class="modal-title">Detalles de factura</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="position-relative p-3 m-2 bg-light" style="font-size: 0.85em">
                <div class="row">
                    <div class="
                              col-md-12
                              d-flex
                              align-items-stretch
                              flex-column
                            ">
                        <div class="card bg-white d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0" id="azul">
                                Factura #<?php echo $facturas->getId() ?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ribbon">Valor: </div>
                                        <p class="text-muted text-sm">
                                            $<?php echo $facturas->getValor(); ?>
                                        </p>
                                        <div class="ribbon">Descuento aplicado: </div>
                                        <p class="text-muted text-sm">
                                            <?php echo $facturas->getDescuento(); ?>%
                                        </p>
                                        <div class="ribbon">Valor con descuento: </div>
                                        <p class="text-muted text-sm">
                                            $<?php
                                            $desc = ($facturas->getValor() * $facturas->getDescuento()) / 100;
                                            $desc = $facturas->getValor() - $desc;
                                            echo $desc; ?>
                                        </p>
                                        <div class="ribbon">Tipo de subscripci??n: </div>
                                        <p class="text-muted text-sm">
                                            <?php
                                            switch ($facturas->getTipoTarifa()){
                                                case 1: echo "Mensual"; break;
                                                case 2: echo "Trimestral"; break;
                                                case 3: echo "Semestral"; break;
                                                case 4: echo "Anual"; break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="position-relative p-3 m-2 bg-light" style="font-size: 0.85em">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-info">Fechas</div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="description-block">
                            <h5 class="description-header"> <?php echo $facturas->getFechaInicio(); ?></h5>
                            <span class="description-text text-secondary">Fecha Inicio</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="description-block">
                            <h5 class="description-header"> <?php echo $facturas->getFechaVencimiento(); ?></h5>
                            <span class="description-text text-secondary">Fecha Vencimiento</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

<style>
    .ribbon-wrapper {
        height: 70px;
        overflow: hidden;
        position: absolute;
        right: -2px;
        top: -2px;
        width: 70px;
        z-index: 10;
    }

    #azul {
        color: white;
        background-color: #0D47EC;
    }

    .ribbon-wrapper.ribbon-lg {
        height: 120px;
        width: 120px;
    }

    .ribbon-wrapper.ribbon-lg .ribbon {
        right: 0px;
        top: 26px;
        width: 160px;
    }

    .ribbon-wrapper.ribbon-xl {
        height: 180px;
        width: 180px;
    }

    .ribbon-wrapper.ribbon-xl .ribbon {
        right: 4px;
        top: 47px;
        width: 240px;
    }

    .ribbon-wrapper .ribbon {
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
        font-size: 0.8rem;
        line-height: 100%;
        padding: 0.375rem 0;
        position: relative;
        right: -2px;
        text-align: center;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
        text-transform: uppercase;
        top: 10px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        width: 90px;
    }

    .ribbon-wrapper .ribbon::before,
    .ribbon-wrapper .ribbon::after {
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-top: 3px solid #9e9e9e;
        bottom: -3px;
        content: '';
        position: absolute;
    }

    .ribbon-wrapper .ribbon::before {
        left: 0;
    }

    .ribbon-wrapper .ribbon::after {
        right: 0;
    }
</style>

<script>
    window.onEditorLoaded = function() {
        tinymce.init({
            selector: "#editor"
        });
    }
</script>
