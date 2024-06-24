<?php

namespace controllers;

use Router\Request;

class MainController
{
    public function __construct(
        private string $rootPath,
        private array $session = [],
    ) {
    }

    public function home()
    {
        include $this->rootPath . '/home.php';
    }
    public function getContact(Request $request)
    {

        if (!$this->isConnected()) {
            header('Location: login');
            exit();
        }

        return $this->render($request, 'contact.php');
    }

    public function postContact(Request $request)
    {

        $contact = $request->post;
        $contact['id'] = uniqid();

        $contactSource = $this->rootPath . '/contact.json';
        $oldjson = file_get_contents($contactSource);
        $tab = json_decode($oldjson, true);
        $tab[] = $contact;
        $tab = json_encode($tab, JSON_PRETTY_PRINT);
        file_put_contents($contactSource, $tab);

        if (!$this->isConnected()) {
            header('Location: /home#contact');
            exit();
        }

        return $this->render($request, 'contact.php');
    }

    public function postLogin(Request $request)
    {
        if ($request->method !== 'POST') {
            return $this->error404();
        }

        $usernameSasha = 'admin';
        $passwordSasha = 'admin';

        $password = $request->post['password'];
        $username = $request->post['login'];

        if ($username === $usernameSasha && $password === $passwordSasha) {
            $_SESSION['login'] = $username;
            $_SESSION['password'] = $password;

            return $this->redirect('/admin');
        }

        return $this->getLogin($request);
    }
    public function getLogin(Request $request)
    {
        return $this->render($request, 'login.php');
    }
    public function admin(Request $request)
    {
        if (!$this->isConnected()) {
            header('Location: login');
            exit();
        }

        return $this->render($request, 'admin.php');
    }
    public function affichage()
    {
        include $this->rootPath . '/affichage.php';
    }

    public function randomMannequin(Request $request)
    {   
        return $this->render($request, 'randomMannequin.php');
    }
    public function error404()
    {
        include $this->rootPath . '/404.php';
    }

    public function add()
    {
        include $this->rootPath . '/add.php';
    }

    public function getDelete(Request $request)
    {

        // return $this->render($this->render($this->getUrl($request),'');


        // $id = $request->get('id');
        // $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // $id = substr($id, 3);

        // if ($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin') {
        //     header('Location: login');
        //     exit();
        // }

        // $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // parse_str($queryString, $params);
        // $variable = $params;
        // $where = $params['where'];
        // $id = $params['id'];
        // var_dump($where);
        // echo '<br>';
        // var_dump($id);

        // if ($where === 'demandes') {
        //     $json = file_get_contents(__DIR__ . '/nouveauMannequin.json');
        //     $tab = json_decode($json, true);
        //     $mannequin = $tab[$id];
        //     unset($tab[$id]);
        //     $tab = json_encode($tab, JSON_PRETTY_PRINT);
        //     file_put_contents(__DIR__ . '/nouveauMannequin.json', $tab);
        //     header('Location: demandes');
        // } else {
        //     $json = file_get_contents(__DIR__ . '/mannequins.json');
        //     $tab = json_decode($json, true);
        //     $mannequin = $tab[$id];
        //     $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        //     $id = substr($id, 3);
        //     unset($tab[$id]);
        //     $tab = json_encode($tab, JSON_PRETTY_PRINT);
        //     file_put_contents(__DIR__ . '/mannequins.json', $tab);
        //     header('Location: listeMannequin');
        // }

    }

    public function demandes()
    {
        include $this->rootPath . '/demandes.php';
    }

    public function std(Request $request)
    {
        include $this->rootPath . '/' . substr($request->uri, 1) . '.php';
    }

    public function lang(Request $request)
    {
        $this->changeLanguage(substr($request->uri, 1));
    }

    private function changeLanguage(string $language)
    {
        setcookie('langue', $language, time() + 365 * 24 * 3600, null, null, false, true);
        header('Location: home');
    }

    private function isConnected()
    {
        return ($this->session['login'] ?? null) === 'admin' && ($this->session['password'] ?? null) === 'admin';
    }

    private function render(Request $request, string $template): string
    {
        include $this->rootPath . '/translate/langues.php';
        $langue = $request->cookie['langue'] ?? $langue;
        $t = $lang[$langue];
        include $this->rootPath . '/' . $template;

        return '';
    }

    private function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit();

    }
    public function getUrl(Request $request): string
    {
        $uri = $request->uri;
        $uri = parse_url($uri);
        return $uri['path'];
    }
}