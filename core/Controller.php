<?php

namespace core;

use \src\Config;

class Controller
{

    protected $headers = [];
    protected $content = [];
    protected $statusTexts = [
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESS CODES
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy', // Deprecated
        307 => 'Temporary Redirect',
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        // SERVER ERROR
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        511 => 'Network Authentication Required',
    ];

    protected function redirect($url)
    {
        header("Location: " . $this->getBaseUrl() . $url);
        exit;
    }

    private function getBaseUrl()
    {
        $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
        $base .= $_SERVER['SERVER_NAME'];
        if ($_SERVER['SERVER_PORT'] != '80') {
            $base .= ':' . $_SERVER['SERVER_PORT'];
        }
        $base .= Config::BASE_DIR;

        return $base;
    }

    private function _render($folder, $viewName, $viewData = [])
    {
        if (file_exists('../src/views/' . $folder . '/' . $viewName . '.php')) {
            extract($viewData);
            $render = function ($vN, $vD = []) {
                return $this->renderPartial($vN, $vD);
            };

            $base = $this->getBaseUrl();
            require '../src/views/' . $folder . '/' . $viewName . '.php';
        }
    }

    private function renderPartial($viewName, $viewData = [])
    {
        $this->_render('partials', $viewName, $viewData);
    }

    public function render($viewName, $viewData = [])
    {
        $this->_render('pages', $viewName, $viewData);
    }

    public function setHeader(String $header)
    {
        $this->headers[] = $header;
    }

    public function request(array $params = [])
    {
        $this->setHeader('Access-Control-Allow-Origin: *');
        $this->setHeader("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->setHeader('Content-Type: application/json; charset=UTF-8');
        $this->send(404, ['hello' => 'world']);

        $this->renderOut();
    }

    public function renderOut()
    {
        if ($this->content) {
            $output = $this->content;
            if (!headers_sent()) {
                foreach ($this->headers as $header) {
                    header($header, true);
                }
            }
            echo $output;
        }
    }
    public function setContent($params = [])
    {
        $this->content = json_encode($params);
    }

    public function send(int $statusCode = 200, array $params = [])
    {
        $this->setHeader(sprintf('HTTP/1.1 ' . $statusCode . ' %s', $this->getstatusCodeText($statusCode)));
        $this->setContent($params);
    }

    public function getStatusCodeText($statusCode): string
    {
        if (isset($this->statusTexts[$statusCode])) {
            return $this->statusTexts[$statusCode];
        } else {
            return 'unknown status code';
        }
    }
}
