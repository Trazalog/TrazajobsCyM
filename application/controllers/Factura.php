<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {

    /**
     * Clase constructora
     *
     * @return  void
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Facturas');
    }

    /**
     * Factura::index()
     * Carga la vista con el listado de facturas.
     *
     * @param   String    $permission     Permisos de ejecucion del sistema.
     * @return  void
     */
    public function index($permission)
    {
        $data['facturas']   = $this->Facturas->facturasList();
        $data['permission'] = $permission;
        $this->load->view('facturas/list', $data);
    }

    /**
     * Factura::getProveedores()
     * Carga la vista con la carga de facturas.
     *
     * @param   String    $permission     Permisos de ejecucion del sistema.
     * @return  void
     */
    public function getProveedoresFactura($permission)
    {
        $data['proveedores']   = $this->Facturas->proveedoresList();
        $data['permission']    = $permission;
        $this->load->view('facturas/view_', $data);
    }

    public function guardar_facturas(){
        $data = $this->input->post();
        $result = $this->Facturas->guardar_facturas($data);
        echo $result;
    }

    /**
     * Factura::setFactura()
     * Guarda la carga de factura en la base de datos.
     *
     * @return  void
     */
    public function setFactura()
    {
        //dump_exit($this->input->post());
        $data = $this->Facturas->setFacturas($this->input->post());

        if($data == false)
        {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }

    /**
     * Factura::deleteFactura
     * Elimina la factura con id enviado por POST.
     *
     * @return  void
     */
    public function deleteFactura()
    {
        $data = $this->Facturas->deleteFacturas($this->input->post());

        if($data == false)
        {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }

    /**
     * Factura::editFactura
     * Trae todos los datos de la factura a editar
     *
     * @return  void
     */
    public function editFactura($idFactura)
    {
        $data['factura']     = $this->Facturas->editFacturas($idFactura);
        $data['proveedores'] = $this->Facturas->proveedoresList();
        $this->load->view('facturas/view2_', $data);
    }

    public function updateFactura()
    {
        $data = $this->Facturas->updateFacturas($this->input->post());

        if($data == false)
        {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }

}