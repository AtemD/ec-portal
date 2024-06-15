<?php

namespace App\Livewire\Platform;

use App\Models\Platform;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PlatformIndex extends Component
{
    use WithPagination;

    public int $platformId;

    public Platform $platform;

    public string $name = ' ';

    public string $description = ' ';

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
        ];
    }

    public function editPlatform($platform)
    {
        // Find and delete the platform
        $platform = Platform::findOrFail($platform['id']);

        if ($platform->exists()) {
            $this->platform = $platform;
            $this->platformId = $platform->id;
            $this->name = $platform->name;
            $this->description = $platform->description;
        } else {
            session()->flash('error', ' Error editing the platform.');
        }

    }

    public function createPlatform()
    {
        // Authorize if the user is allowed to delete this platform
        // $this->authorize('create', $platform);

        $validatedData = $this->validate();

        $platform = Platform::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        if ($platform->exists()) {
            session()->flash('success', 'Platform '.$platform->name.' created successfully.');
            $this->resetFields();
            $this->dispatch('platform-created');
            $this->render();
        } else {
            session()->flash('error', ' Error creating the platform.');
        }

    }

    public function updatePlatform()
    {
        // Authorize if the user is allowed to delete this platform
        // $this->authorize('update', $platform);

        $validatedData = $this->validate();

        try {
            Platform::whereId($this->platform->id)->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
            session()->flash('success', 'Platform successfully updated!');

        } catch (\Exception $ex) {
            session()->flash('error', ' Error updating the platform!');
        }
    }

    public function deletePlatform($platformId)
    {
        // Find and delete the platform
        $platform = Platform::find($platformId);

        // Authorize if the user is allowed to delete this platform
        // $this->authorize('delete', $platform);

        if ($platform) {
            $platform->delete();
            session()->flash('success', 'Platform successfully deleted.');
        } else {
            session()->flash('error', ' Error deleting the platform.');
        }
    }

    public function closeModal()
    {
        $this->resetFields();
    }

    public function openModal()
    {
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->reset(['name', 'description', 'platformId']);
    }

    public function render(): View
    {
        return view('livewire.platform.platform-index', [
            'platforms' => Platform::paginate(3),
        ]);
    }
}
