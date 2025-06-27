<?php

namespace App\Http\Controllers;

use App\Services\AI\AIServcice;
use Illuminate\Http\Request;

class AIController extends Controller
{
    private $AIServcice;

    public function __construct(AIServcice $AIServcice)
    {
        $this->AIServcice = $AIServcice;        
    }

    public function CallAI()
    {
        $response = $this->AIServcice->CallChatGPT();
        return $response;
    }
}
