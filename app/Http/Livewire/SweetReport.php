<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class SweetReport extends Component
{

    public $comments;
    public $reportType;

    public function mount()
    {
        // Comments containing the word 'candy'

        $this->reportType = 'Comments about candy';
    }

    public function render()
    {

        $this->comments = [];

        if ($this->reportType == 'Comments about candy') {
            $this->comments = Comment::whereRaw('LOWER(comments) LIKE ?', ['%candy%'])->get();
        } elseif ($this->reportType == 'Comments about calling me') {
        } elseif ($this->reportType == 'Comments about referrals') {
        } elseif ($this->reportType == 'Comments about signatures') {
        }

        return view('livewire.sweet-report');
    }
}
