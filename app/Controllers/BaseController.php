<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\M_Base;

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
abstract class BaseController extends Controller {

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['utility'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {

        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->agent = $this->request->getUserAgent();

        $this->M_Base = new M_Base;

        if (preg_match("/webzip|httrack|wget|FlickBot|downloader|production
        bot|superbot|PersonaPilot|NPBot|WebCopier|vayala|imagefetch|
        Microsoft URL Control|mac finder|
        emailreaper|emailsiphon|emailwolf|emailmagnet|emailsweeper|
        Indy Library|FrontPage|cherry picker|WebCopier|netzip|
        Share Program|TurnitinBot|full web bot|zeus/i", $this->agent->getAgentString())) {
            die('- Sttt...');
        }

        $this->admin = false;

        if ($this->session->get('admin')) {
            $admin = $this->M_Base->data_where('admin', 'username', $this->session->get('admin'));

            if (count($admin) == 1) {
                if ($admin[0]['status'] == 'On') {
                    $this->admin = $admin[0];
                }
            }
        }

        $this->users = false;

        if ($this->session->get('username')) {
            $users = $this->M_Base->data_where('users', 'username', $this->session->get('username'));

            if (count($users) == 1) {
                if ($users[0]['status'] == 'On') {
                    $this->users = $users[0];
                }
            }
        }

        $this->base_data = [
            'users' => $this->users,
            'admin' => $this->admin,
            'web' => [
                'title' => $this->M_Base->u_get('web-title'),
                'name' => $this->M_Base->u_get('web-name'),
                'logo' => $this->M_Base->u_get('web-logo'),
                'keywords' => $this->M_Base->u_get('web-keywords'),
                'description' => $this->M_Base->u_get('web-description'),
            ],
            'popup' => [
                'popuptitle' => $this->M_Base->u_get('popuptitle'),
                'popupdescription' => $this->M_Base->u_get('popupdescription'),
                'gambarpopup' => $this->M_Base->u_get('gambarpopup'),
            ],
            'sm' => [
                'wa' => $this->M_Base->u_get('sm-wa'),
                'yt' => $this->M_Base->u_get('sm-yt'),
                'fb' => $this->M_Base->u_get('sm-fb'),
                'ig' => $this->M_Base->u_get('sm-ig'),
                'tw' => $this->M_Base->u_get('sm-tw'),
            ],
            'menu_active' => 'Home',
            'games_populer' => $this->M_Base->all_data('games', 6),
        ];
    }
}
