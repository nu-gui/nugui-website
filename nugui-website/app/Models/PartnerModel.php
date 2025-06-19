<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model {
    protected $table = 'partners';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'businessName', 'registrationNumber', 'countryBusiness',
        'contactName', 'contactEmail', 'contactPhone', 'Skype_Teams',
        'question1', 'question2', 'question3', 'question4', 
        'question5', 'question6', 'question7', 'reference'
    ];

    protected $validationRules = [
        'businessName' => 'required|min_length[3]|max_length[255]',
        'registrationNumber' => 'required|min_length[3]|max_length[255]',
        'countryBusiness' => 'required|min_length[2]|max_length[255]',
        'contactName' => 'required|min_length[3]|max_length[255]',
        'contactEmail' => 'required|valid_email|max_length[255]',
        'contactPhone' => 'required|min_length[10]|max_length[15]',
        'Skype_Teams' => 'required|min_length[3]|max_length[255]',
        'question1' => 'required|max_length[255]',
        'question2' => 'required|max_length[255]',
        'question3' => 'required|max_length[255]',
        'question4' => 'required|max_length[255]',
        'question5' => 'required|max_length[255]',
        'question6' => 'required|max_length[2000]',
        'question7' => 'required|max_length[2000]',
    ];

    protected $validationMessages = [
        'businessName' => [
            'required' => 'Business Name is required',
            'min_length' => 'Business Name must be at least 3 characters long',
            'max_length' => 'Business Name cannot exceed 255 characters'
        ],
        'registrationNumber' => [
            'required' => 'Registration Number is required',
            'min_length' => 'Registration Number must be at least 3 characters long',
            'max_length' => 'Registration Number cannot exceed 255 characters'
        ],
        'countryBusiness' => [
            'required' => 'Country of Business is required',
            'min_length' => 'Country of Business must be at least 2 characters long',
            'max_length' => 'Country of Business cannot exceed 255 characters'
        ],
        'contactName' => [
            'required' => 'Contact Name is required',
            'min_length' => 'Contact Name must be at least 3 characters long',
            'max_length' => 'Contact Name cannot exceed 255 characters'
        ],
        'contactEmail' => [
            'required' => 'Contact Email is required',
            'valid_email' => 'Contact Email must be a valid email address',
            'max_length' => 'Contact Email cannot exceed 255 characters'
        ],
        'contactPhone' => [
            'required' => 'Contact Phone is required',
            'min_length' => 'Contact Phone must be at least 10 characters long',
            'max_length' => 'Contact Phone cannot exceed 15 characters'
        ],
        'Skype_Teams' => [
            'required' => 'Skype/Teams is required',
            'min_length' => 'Skype/Teams must be at least 3 characters long',
            'max_length' => 'Skype/Teams cannot exceed 255 characters'
        ],
        'question1' => [
            'required' => 'Annual Turnover is required',
            'max_length' => 'Annual Turnover cannot exceed 255 characters'
        ],
        'question2' => [
            'required' => 'Financial Statements is required',
            'max_length' => 'Financial Statements cannot exceed 255 characters'
        ],
        'question3' => [
            'required' => 'Primary Industry is required',
            'max_length' => 'Primary Industry cannot exceed 255 characters'
        ],
        'question4' => [
            'required' => 'Type of Partnership is required',
            'max_length' => 'Type of Partnership cannot exceed 255 characters'
        ],
        'question5' => [
            'required' => 'Interested Products is required',
            'max_length' => 'Interested Products cannot exceed 255 characters'
        ],
        'question6' => [
            'required' => 'Marketing Plan is required',
            'max_length' => 'Marketing Plan cannot exceed 2000 characters'
        ],
        'question7' => [
            'required' => 'Customer Base and Target Market is required',
            'max_length' => 'Customer Base and Target Market cannot exceed 2000 characters'
        ],
    ];

    protected $skipValidation = false;
}
