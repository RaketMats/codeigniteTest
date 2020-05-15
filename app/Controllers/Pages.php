<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        return view('welcome_message');
    }

    // Called by http://localhost/ci4/public/pages/test
    public function test()
    {
        echo 'hi there';
        echo pi();
    }

    // Called by http://localhost/ci4/public/pages/view
    // ... and will then return /Views/pages/home.php
    public function view($page = 'home')
    {
        // Called by http://localhost/ci4/public/pages/view/xyz (or whatever...)
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        // Call to http://localhost/ci4/public/pages/view/home
        // ...will return Views/pages/home.php
        // And a call to http://localhost/ci4/public/pages/view/about
        // ...will return Views/pages/abous.php
        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
}