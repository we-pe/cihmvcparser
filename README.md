 # Codeigniter 3.1.10 + Templating Parser + HMVC

This library used original templating engine from Codeigniter to provide the clean php code

### Introduction to Codeigniter

CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.

Read more about codeigniter - https://www.codeigniter.com/

### Introduction to HMVC

Modular Extensions makes the CodeIgniter PHP framework modular. Modules are groups of independent components, typically model, controller and view, arranged in an application modules sub-directory that can be dropped into other CodeIgniter applications.
HMVC stands for Hierarchical Model View Controller.
Module Controllers can be used as normal Controllers or HMVC Controllers and they can be used as widgets to help you build view partials.

Read more about HMVC - https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/src/codeigniter-3.x/

### Installation Process

 1. Clone by "git clone https://github.com/we-pe/cihmvcparser.git" or download this repository to your local server
 2. Hit the url by browser "http://localhost/cihmvcparser"
 
 ### Usage

  ```html
    <!DOCTYPE html>
    <html lang="en">
    <head>
      {header}
    </head>
    <body>
      {content}
    </body>
    </html>
```

### .htaccess file to remove the index.php form urls
 ``` 
    <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ index.php/$1 [L]
     </IfModule>
```
### My_Controller.php in application/core
 ```
 <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
    class MY_Controller extends CI_Controller {

        protected $data = array();

        function __construct(){
            parent::__construct();
            $this->load->library('parser');
        }

        protected function load_page($content=null, $layout=true){
            if ($layout==true){
              $this->data['header'] = $this->parser->parse('partials/header', $this->data, TRUE);
              $this->data['content'] = (is_null($content)) ? '' : $this->parser->parse($content, $this->data, TRUE);
              $this->parser->parse('index', $this->data);
            }
            else {
              $this->parser->parse($content, $this->data);
            }
        }
    }
```
### Welcome.php in application/modules/welcome/controllers
```
  class Welcome extends MY_Controller {
    public function index(){
      $this->data = array(
        'blog_title' => 'Welcome to CodeIgniter',
        'blog_heading' => 'Welcome to CodeIgniter with HMVC and Parser Library!'
      );
      $this->load_page('welcome/message');
    }
  }
```
### message.php in application/modules/welcome/views
```
  {blog_heading}
```

For any query please contact via email at wenpiee@gmail.com or facebook at https://www.facebook.com/bagoes.we.pe
