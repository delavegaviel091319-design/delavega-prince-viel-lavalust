<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    protected $table       = 'products';
    protected $primary_key = 'id';

    // Whitelist of columns allowed for mass assignment
    protected $fillable = ['product_name', 'description', 'price', 'quantity'];
}