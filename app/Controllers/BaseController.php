<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\AbsensiModel;
use App\Models\SrtmModel;
use App\Models\SrtkModel;
use App\Models\NewsModel;
use App\Models\VideosModel;
use App\Models\PortModel;
use App\Models\HomeModel;
use App\Models\ProyekModel;
use App\Models\IotModel;
use App\Models\ProdModel;



/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		date_default_timezone_set('Asia/Jakarta');
		$this->db = \Config\Database::connect();
		$this->session = \Config\Services::session();
		$this->JabatanModel = new JabatanModel();
		$this->PegawaiModel = new PegawaiModel();
		$this->UserModel = new UserModel();
		$this->ProfileModel = new ProfileModel();
		$this->AbsensiModel = new AbsensiModel();
		$this->IotModel = new IotModel();
		$this->SrtmModel = new SrtmModel();
		$this->SrtkModel = new SrtkModel();
		$this->NewsModel = new NewsModel();
		$this->VideosModel = new VideosModel();
		$this->PortModel = new PortModel();
		$this->HomeModel = new HomeModel();
		$this->ProyekModel = new ProyekModel();
		$this->ProdModel = new ProdModel();
	}
}
