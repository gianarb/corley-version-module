<?php
namespace CorleyVersion\Service;

use Zend\Config\Writer\PhpArray;

class PhpArrayConfigWriter
{
    public function getWriter()
    {
        return new PhpArray();
    }
}
