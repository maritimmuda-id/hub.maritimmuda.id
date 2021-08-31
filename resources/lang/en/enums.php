<?php

use App\Enums\EventType;
use App\Enums\Gender;
use App\Enums\JobType;

return [
    Gender::class => [
        Gender::NotKnown => 'Choose a gender',
        Gender::Male => 'Male',
        Gender::Female => 'Female',
        Gender::NotApplicable => 'Male/Female',
    ],

    JobType::class => [
        JobType::FullTime => 'Full Time',
        JobType::PartTime => 'Part Time',
        JobType::Internship => 'Internship',
        JobType::Contract => 'Contract',
        JobType::Freelance => 'Freelance',
    ],

    EventType::class => [
        EventType::Webinar => 'Webinar',
        EventType::ScientificConference => 'Scientific Conference',
        EventType::Forum => 'Forum',
        EventType::Competition => 'Competition',
        EventType::Dedication => 'Dedication',
        EventType::Research => 'Research',
        EventType::Training => 'Training',
    ],
];
