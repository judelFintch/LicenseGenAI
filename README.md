LicenseGen

LicenseGen is a PHP application designed to create professional PDF import licenses based on data extracted from invoices. It combines intelligent data handling with a flexible template-based approach to streamline the license generation process.
Features

    Invoice Data Parsing:
    Reads and processes invoice details to populate license fields.

    PDF Generation:
    Outputs polished PDF files using PHP PDF libraries.

    Customizable Templates:
    Allows users to define and update templates for their licenses.

    Seamless Integration:
    Can be integrated into existing systems or used as a standalone tool.

Requirements

    PHP 8.0 or higher
    Required PHP extensions:
        mbstring
        gd
        dom

Installation

    Clone the repository:(https://github.com/judelFintch/LicenseGenAI.git)
cd licensegen

Install dependencies using Composer:

    composer install

    Set up your configuration file with template paths and any API credentials needed for data validation.

Usage

    Place your invoice files in the invoices/ directory.
    Run the PHP script:

    php generateLicense.php

    The resulting PDFs will be saved in the licenses/ directory.

Contributing

If you’d like to contribute, please submit a pull request or open an issue. Contributions are always welcome!