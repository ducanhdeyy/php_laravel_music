<?php 

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Không tìm thấy dữ liệu';
    
}