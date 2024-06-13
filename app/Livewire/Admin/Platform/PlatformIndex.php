<?php

namespace App\Livewire\Admin\Platform;

use Livewire\Component;

class PlatformIndex extends Component
{
    public function storePlatform()
    {
        
    }

    public function render()
    {
        return view('livewire.platform.admin.platform-index', [ 
            'platforms' => Platform::paginate(10),
        ]);
    }
}
