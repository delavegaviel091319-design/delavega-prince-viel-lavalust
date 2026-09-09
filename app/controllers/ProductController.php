<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    /**
     * Read - list all products.
     */
    public function index()
    {
        $data['products'] = $this->ProductModel->all();
        $this->call->view('Product_views', $data);
    }

    /**
     * Create - show form (GET) and save new product (POST).
     */
    public function create()
    {
        if ($this->io->method() == 'post') {
            $this->ProductModel->insert([
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
            redirect('products');
        }

        $this->call->view('product_create_view');
    }

    /**
     * Update - show form pre-filled (GET) and save changes (POST).
     */
    public function edit($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('products');
        }

        if ($this->io->method() == 'post') {
            $this->ProductModel->update($id, [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
            redirect('products');
        }

        $data['product'] = $product;
        $this->call->view('product_edit_view', $data);
    }

    /**
     * Delete - remove a product.
     */
    public function delete($id)
    {
        $this->ProductModel->delete($id);
        redirect('products');
    }
}