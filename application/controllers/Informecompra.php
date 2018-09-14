<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informecompra extends CI_Controller {

    /**
     * Clase constructora
     *
     * @return  void
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informecompras');
    }

    /**
     * InformeCompra::index()
     * Carga la vista Informe de Compras.
     *
     * @param   String    $permission     Permisos de ejecucion del sistema.
     * @return  void
     */
    public function index($permission)
    {
        $data['proveedores'] = $this->Informecompras->getProveedores();
        $data['permission']  = $permission;
        $this->load->view('informecompras/list', $data);
    }

    /**
     * Devuelve el listado de facturas de un determinado proveedor
     *
     * @return  Array   $data   Facturas de un determinado proveedor.
     */
    public function listFactura()
    {
        $data = $this->Informecompras->listFacturas($this->input->post());
        if($data == false)
        {
            echo json_encode(false);
        }
        else
        {
            echo json_encode($data);
        }
    }

    /**
     * Devuelve el listado de Ordenes de Pago de un determinado proveedor
     *
     * @return  Array   $data   Ordenes de Pago de un determinado proveedor.
     */
    public function listOrdenesPago()
    {
        $data = $this->Informecompras->listOrdenesPagos($this->input->post());
        if($data == false)
        {
            echo json_encode(false);
        }
        else
        {
            echo json_encode($data);
        }
    }
}