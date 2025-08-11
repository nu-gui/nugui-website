<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Disable auto routing for security

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Landing::index');
$routes->get('/landing', 'Landing::index');
$routes->get('/home', 'Home::index');
$routes->get('about', 'About::index');
$routes->get('products', 'Products::index');
$routes->get('solutions', 'Solutions::index');
$routes->get('partner-program', 'PartnerProgram::index');
$routes->get('contact', 'Contact::index');
$routes->get('support', 'Support::index');

// Ticket system routes
$routes->get('support-ticket', 'SupportTicket::index');
$routes->get('ticket/(:segment)', 'SupportTicket::view_ticket/$1');

// Define POST routes for form submissions
$routes->post('submit_partner_form', 'PartnerProgram::submit_partner_form');
$routes->post('submit_contact_form', 'Contact::submit_contact_form');
$routes->post('submit_support_form', 'Support::submit_support_form');
$routes->post('submit_ticket_form', 'SupportTicket::submit_support_form');
$routes->post('log_lead', 'LeadController::logLead');
$routes->post('log-to-file', 'LogController::logToFile');
$routes->post('store-form-token', 'PartnerProgram::storeFormToken');

// API Routes for Form Validation
$routes->group('api', function($routes) {
    $routes->post('check-email-domain', 'Api::checkEmailDomain');
    $routes->post('track-interaction', 'Api::trackInteraction');
    $routes->post('track-email-validation', 'Api::trackEmailValidation');
    $routes->post('validate-company-website', 'Api::validateCompanyWebsite');
    $routes->get('get-challenge', 'Api::getChallenge');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to define it here. You have complete freedom to do so.
 */

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
