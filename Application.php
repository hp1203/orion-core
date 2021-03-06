<?php 

namespace himanshupurohit\orion;
use himanshupurohit\orion\View;
use himanshupurohit\orion\DbModel;
use himanshupurohit\orion\Session;
use himanshupurohit\orion\Database;
use himanshupurohit\orion\Controller;
/**
 * Class Application
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package himanshupurohit\orion
 */
class Application 
{
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public static Application $app;
    public ?Controller $controller = null;
    public ?DbModel $user;
    public View $view;
    
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->view = new View();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }catch(\Exception $e) {
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function getController() : Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller) : Void
    {
        $this->controller = $controller;
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}