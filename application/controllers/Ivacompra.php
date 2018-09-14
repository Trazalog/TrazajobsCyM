<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ivacompra extends CI_Controller {

    /**
     * Clase constructora
     *
     * @return  void
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ivacompras');
    }

    /**
     * Factura::index()
     * Carga la vista con el listado de Iva Compras.
     *
     * @param   String    $permission     Permisos de ejecucion del sistema.
     * @return  void
     */
    public function index($permission)
    {
        /*$ivacompras = $this->Ivacompras->ivaComprasList();
        dump_exit($ivacompras);*/
        $data['ivacompras'] = $this->Ivacompras->ivaComprasList();
        $data['permission'] = $permission;
        $this->load->view('ivacompras/list', $data);
    }

}
