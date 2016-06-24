<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('Plantilla/head');
	$this->load->view('Plantilla/nav');
	$this->load->view('Plantilla/sidebar');
	$this->load->view('Plantilla/searchNav');
	$this->load->view($content);
	$this->load->view('Plantilla/footer');
	$this->load->view('Plantilla/end');