<?php

use App\Enums\EducationLevel;
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
        EventType::Seminar => 'Seminar/Webinar',
        EventType::ScientificConference => 'Scientific Conference',
        EventType::Forum => 'Forum',
        EventType::Competition => 'Competition',
        EventType::CommunityDevelopment => 'Community Development',
        EventType::Research => 'Research',
        EventType::Training => 'Training',
        EventType::EnvironmentalAction => 'Environmental Action',
        EventType::YouthExchange => 'Student/Youth Exchange',
    ],

    EducationLevel::class => [
        EducationLevel::SeniorHighSchool => 'Senior High School',
        EducationLevel::VocationalHighSchool => 'Vocational High School',
        EducationLevel::IslamicBoardingSchool => 'Islamic Boarding School',
        EducationLevel::D3 => 'Diploma III Degree',
        EducationLevel::D4 => 'Diploma IV Degree',
        EducationLevel::BachelorDegree => 'Bachelor\'s Degree',
        EducationLevel::MasterDegree => 'Master\'s Degree',
        EducationLevel::DoctorDegree => 'Doctoral Degree',
    ],
];
