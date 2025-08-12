<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/helpers/email_helper.html
 */

// ------------------------------------------------------------------------
function donatePaymentMess($userName, $fatName, $mobileNo, $emailId, $amount) 
{
    $name = $userName;
    $email = $emailId;
    $fatherName = $fatName;
    $mobile = $mobileNo;
    $donationAmount = $amount;
    
    $company_name = config_item('companyName');
    $support_email = config_item('email');
    $mobile_1 = config_item('mobile_number_1');
    $mobile_2 = config_item('mobile_number_2');
    
    $to = config_item('email'); 
    $subject = "Donation from " . $company_name;
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "From: " . $company_name . " <" . $support_email . ">\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    
    $full_message = "
    <html>
    <head>
        <title>Donation Information</title>
    </head>
    <body>
        <table>
            <tr><td>Name :</td><td>: $name</td></tr>
            <tr><td>Email :</td><td>: $email</td></tr>
            <tr><td>Father's Name :</td><td>: $fatherName</td></tr>
            <tr><td>Mobile Number :</td><td>: $mobile</td></tr>
            <tr><td>Donation Amount :</td><td>: $donationAmount</td></tr>
        </table>
    </body>
    </html>";
    
    $user_subject = "Thank You $name for Your Donation";
    $user_headers = "From: " . $support_email . "\r\n";
    $user_message = "Dear $name,\n\nThank you for your generous donation of ₹$donationAmount. We have successfully received your donation, and it will go towards our mission to support those in need.\n\nIf you have any questions or need further assistance, please contact us at +91 $mobile_1 or $mobile_2, or email us at $support_email.\n\nBest regards,\n" . $company_name;
    
    if (mail($to, $subject, $full_message, $headers)) {
        mail($email, $user_subject, $user_message, $user_headers);
        
        $response = "
        <h3>Dear <span style='color:#e70780;'>$userName</span>,</h3>
        <blockquote>
        <p>Your donation of ₹$donationAmount has been successfully received. We will be using this donation to further our mission of helping those in need.</p>
        <p>If you have any questions or need further assistance, please don't hesitate to reach out to us at <span><i class='fas fa-phone-alt px-2'></i>+91 $mobile</span> or via email at <a href='mailto:$emailId'>$emailId</a>.</p>
        <p>Thank you again for your generous contribution!</p>
        </blockquote>";
    } else {
        $response = "
        <h3>Dear <span style='color:#e70780;'>$userName</span>,</h3>
        <blockquote>
        <p>Something went wrong. It seems like we encountered an issue while processing your donation. Please try again later.</p>
        <p>If you need immediate assistance, you can reach us at <span><i class='fas fa-phone-alt px-2'></i>+91 $mobile_1</span> or via email at <a href='mailto:$emailId'>$emailId</a>.</p>
        <p>We apologize for the inconvenience and appreciate your patience!</p>
        </blockquote>";
    }

    return $response;
}
