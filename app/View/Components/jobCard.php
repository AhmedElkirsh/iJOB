<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobCard extends Component
{
    public $title;
    public $type;
    public $location;
    public $description;
    public $skills;
    public $date;
    public $applyLink;
    public $image;

    public function __construct($title, $type, $location, $description, $skills, $date, $applyLink, $image)
    {
        $this->title = $title;
        $this->type = $type;
        $this->location = $location;
        $this->description = $description;
        $this->skills = $skills;
        $this->date = $date;
        $this->applyLink = $applyLink;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.job-card');
    }
}
