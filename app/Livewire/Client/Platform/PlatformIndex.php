<?php

namespace App\Livewire\Client\Platform;

use Livewire\Component;
use App\Models\Platform;

class PlatformIndex extends Component
{
    public function storePlatform()
    {
        
    }

    public function render()
    {
        return view('livewire.client.platform.platform-index', [ 
            'platforms' => Platform::paginate(10),
        ]);
    }
}
