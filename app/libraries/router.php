<?php
class Router
{
  protected $currentController = 'Home';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->get_url();

    if ($url != NULL) {

      $controller_name = ucwords($url[0]);

      if (file_exists("../app/controllers/$controller_name.php")) {
        $this->currentController = $controller_name;
        unset($url[0]); 
      }
    }

    require_once "../app/controllers/$this->currentController.php";

    $this->currentController = new $this->currentController; 


    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }

    $this->params = $url ? array_values($url) : [];

    // call_user_func_array is a PHP function that calls a function with an array of parameters. 
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function get_url()
  {
    if (isset($_GET["url"])) {

      $url = $_GET['url'];

      // rtrim() is a PHP function that removes trailing whitespace characters from the end of a string.
      $url = rtrim($_GET['url'], '/');

      // filter_var() is a PHP function that filters a variable with a specified filter.
      // FILTER_SANITIZE_URL is a filter that removes all illegal URL characters.
      $url = filter_var($url, FILTER_SANITIZE_URL);

      // explode() is a PHP function that splits a string into an array.
      $url = explode('/', $url);

      return $url;
    }
  }
}
?>

<?php $init = new Router(); ?>