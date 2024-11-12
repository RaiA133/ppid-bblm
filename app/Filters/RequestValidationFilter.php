<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RequestValidationFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Cek apakah ada kedua header `Content-Length` dan `Transfer-Encoding`
    $contentLength = $request->getHeaderLine('Content-Length');
    $transferEncoding = $request->getHeaderLine('Transfer-Encoding');

    if ($contentLength && $transferEncoding) {
      // Jika keduanya ada, kembalikan respons 400 Bad Request
      return service('response')->setStatusCode(400, 'Bad Request')
        ->setBody('Invalid Request');
    }

    // Jika valid, lanjutkan request
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Tidak perlu ada pengaturan khusus untuk after
  }
}
