<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    /**
     * Validation rules for partner form
     *
     * @var array<string, mixed>
     */
    public array $partnerForm = [
        'businessName' => [
            'label' => 'Business Name',
            'rules' => 'required|max_length[255]',
        ],
        'registrationNumber' => [
            'label' => 'Registration Number',
            'rules' => 'required|max_length[255]',
        ],
        'countryBusiness' => [
            'label' => 'Country of Business',
            'rules' => 'required|max_length[255]',
        ],
        'contactName' => [
            'label' => 'Contact Name',
            'rules' => 'required|max_length[255]',
        ],
        'contactEmail' => [
            'label' => 'Contact Email',
            'rules' => 'required|valid_email|max_length[255]',
        ],
        'contactPhone' => [
            'label' => 'Contact Phone',
            'rules' => 'required|max_length[255]',
        ],
        'Skype_Teams' => [
            'label' => 'Skype/Teams',
            'rules' => 'required|max_length[255]',
        ],
        'question1' => [
            'label' => 'Annual Turnover',
            'rules' => 'required|max_length[255]',
        ],
        'question2' => [
            'label' => 'Financial Statements',
            'rules' => 'required|in_list[yes,no]',
        ],
        'question3' => [
            'label' => 'Primary Industry',
            'rules' => 'required|max_length[255]',
        ],
        'question4' => [
            'label' => 'Type of Partnership',
            'rules' => 'required|in_list[reseller,distributor,service,other]',
        ],
        'question5' => [
            'label' => 'Interested Products',
            'rules' => 'required|in_list[NU SIP,NU SMS,NU CCS,NU DATA]',
        ],
        'question6' => [
            'label' => 'Marketing Plan',
            'rules' => 'required',
        ],
        'question7' => [
            'label' => 'Customer Base and Target Market',
            'rules' => 'required',
        ],
    ];
}
