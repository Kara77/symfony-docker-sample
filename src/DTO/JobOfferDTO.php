<?php

namespace App\DTO;

class JobOfferDTO
{
    public string $id;
    public string $link;
    public string $title;
    public string $description;
    public string $publicationDate;
    public string $coordinates;
    public string $city;
    public int $postalCode;
    public string $department;
    public string $region;
    public string $sector;
    public string $jobTitle;
    public string $company;
    public array $contractType = [];
    public string $salary;
}
