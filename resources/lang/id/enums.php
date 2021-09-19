<?php

use App\Enums\EducationLevel;
use App\Enums\EventType;
use App\Enums\Gender;
use App\Enums\JobType;
use App\Enums\PublicationType;

return [
    Gender::class => [
        Gender::NotKnown => 'Pilih Jenis Kelamin',
        Gender::Male => 'Laki-laki',
        Gender::Female => 'Perempuan',
        Gender::NotApplicable => 'Laki-laki/Perempuan',
    ],

    JobType::class => [
        JobType::FullTime => 'Full Time',
        JobType::PartTime => 'Part Time',
        JobType::Internship => 'Internship',
        JobType::Contract => 'Kontrak',
        JobType::Freelance => 'Freelance',
    ],

    EventType::class => [
        EventType::Seminar => 'Seminar/Webinar',
        EventType::ScientificConference => 'Konferensi Ilmiah',
        EventType::Forum => 'Forum',
        EventType::Competition => 'Kompetisi',
        EventType::CommunityDevelopment => 'Pengabdian Masyarakat',
        EventType::Research => 'Penelitian',
        EventType::Training => 'Pelatihan',
        EventType::EnvironmentalAction => 'Aksi Lingkungan',
        EventType::YouthExchange => 'Pertukaran Pemuda/Pelajar',
    ],

    EducationLevel::class => [
        EducationLevel::JuniorHighSchool => 'SMP',
        EducationLevel::SeniorHighSchool => 'SMA',
        EducationLevel::VocationalHighSchool => 'SMK',
        EducationLevel::IslamicBoardingSchool => 'MA/Pondok Pesantren',
        EducationLevel::D3 => 'Diploma III',
        EducationLevel::D4 => 'Diploma IV',
        EducationLevel::BachelorDegree => 'S1',
        EducationLevel::MasterDegree => 'S2',
        EducationLevel::DoctorDegree => 'S3',
    ],

    PublicationType::class => [
        PublicationType::Abstracts => 'Abstrak',
        PublicationType::Book => 'Buku',
        PublicationType::JournalArticle => 'Artikel Jurnal',
        PublicationType::MagazineArticle => 'Artikel Majalah',
        PublicationType::NewsArticle => 'Artikel Berita',
        PublicationType::ProceedingArticle => 'Artikel Prosiding',
    ],
];
