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
        } elseif ($this->reportType == 'Comments about calling customer') {
            $this->comments =
                Comment::whereRaw('LOWER(comments) LIKE ?', ['%call me%'])
                ->whereRaw('LOWER(comments) NOT LIKE ?', ['%do not call me%'])
                ->whereRaw('LOWER(comments) NOT LIKE ?', ["%don't call me%"])
                ->get();
        } elseif ($this->reportType == 'Comments about referrals') {
            $this->comments = Comment::whereRaw('LOWER(comments) LIKE ?', ['% refer%'])->get();
        } elseif ($this->reportType == 'Comments about signature requirements') {
            $this->comments = Comment::whereRaw('LOWER(comments) LIKE ?', ['% sign%'])
                ->OrWhereRaw('LOWER(comments) LIKE ?', ['% signature%'])
                ->get();
        } else {
        }

        return view('livewire.sweet-report');
    }
}
