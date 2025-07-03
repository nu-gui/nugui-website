<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Application Confirmation</title>
    <style>
        body {
            background: var(--color-background);
            color: var(--color-text-primary);
            font-family: var(--font-family-primary);
            margin: 0;
            padding: 0;
        }
        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--color-primary);
            letter-spacing: -0.01em;
        }
        .btn-primary {
            display: inline-block;
            padding: 15px 40px;
            border-radius: 999px;
            font-size: 1.15rem;
            font-weight: 600;
            text-decoration: none;
            background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
            color: #18181A;
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
            transition: background 0.3s, color 0.3s;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
            color: #fff;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .header {
            background-color: #00A2E8;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <p>Dear <?= esc($contactName) ?>,</p>
    <p>Thank you for your interest in becoming a partner with NU GUI. Your application has been received and is currently under review. Below are the details of your application:</p>

    <h2>Reference: <?= esc($reference) ?></h2>
    
    <h3>Business Information</h3>
    <p><strong>Business Name:</strong> <?= esc($businessName) ?></p>
    <p><strong>Registration Number:</strong> <?= esc($registrationNumber) ?></p>
    <p><strong>Country of Business:</strong> <?= esc($countryBusiness) ?></p>

    <h3>Contact Information</h3>
    <p><strong>Contact Name:</strong> <?= esc($contactName) ?></p>
    <p><strong>Contact Email:</strong> <?= esc($contactEmail) ?></p>
    <p><strong>Contact Phone:</strong> <?= esc($contactPhone) ?></p>
    <p><strong>Skype/Teams:</strong> <?= esc($Skype_Teams) ?></p>

    <h3>Questionnaire</h3>
    <p><strong>Annual Turnover:</strong> <?= esc($question1) ?></p>
    <p><strong>Financial Statements:</strong> <?= esc($question2) ?></p>
    <p><strong>Industry:</strong> <?= esc($question3) ?></p>
    <p><strong>Partnership Type:</strong> <?= esc($question4) ?></p>
    <p><strong>Interested Products:</strong> <?= esc($question5) ?></p>
    <p><strong>Marketing Plan:</strong> <?= esc($question6) ?></p>
    <p><strong>Customer Base & Target Market:</strong> <?= esc($question7) ?></p>

    <p>We will contact you soon with further details. If you have any questions, please feel free to contact us at <a href="mailto:info@nugui.co.za">info@nugui.co.za</a>.</p>

    <p>Best regards,</p>
    <p>NU GUI Team</p>
</body>
</html>
