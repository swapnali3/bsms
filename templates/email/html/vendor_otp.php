<!DOCTYPE html>
<html>

<head>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        a {
            color: #F7941D;
        }

        p,
        ul li,
        ol li {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" alt=""
                                style="width: 180px; max-width: 180px; height: auto; display: block;">
                        </td>
                        <!-- <td valign="middle" class="hero bg_white" style="border-left: 1px solid rgb(19, 58, 88);"></td> -->
                        <!-- <td valign="middle" class="hero bg_white" style="padding: 0em 0px;">
                            <img src="http://apar.ftspl.in/webroot/img/logo_s.png" alt=""
                                style="width: 280px; max-width: 600px; height: auto; display: block;">
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $vendor_name ?>,</p>

            <p>We are excited to welcome you as a valued vendor to M/S. Apar Industries Limited, Rabale plant (if vendor
                extended to 1010 plant) / M/S. Apar Industries Limited Bhiwandi MegaWarehouse (if vendor extended to
                1600 plant)!</p>

            <p>To ensure a secure and efficient onboarding process, we have implemented a One-Time Password (OTP)
                verification system. This additional layer of security will help protect your account and sensitive
                information.</p>

            <p>Here are the details on how to receive and use your OTP:</p>

            <h3><?= $mailbody ?></h3>

            <ul>
                <li><strong>OTP Delivery Method:</strong> You will receive your OTP through the email address provided
                    during the registration process. Please ensure that this email address is accurate and accessible.
                </li>
                <li><strong>OTP Usage:</strong> Once you receive the OTP, you will need to enter it into the designated
                    field on our vendor portal during the onboarding process. The OTP will be required for various
                    actions, including login and updating your account information.</li>
                <li><strong>OTP Security:</strong> Please treat your OTP as confidential information. Do not share it
                    with anyone, and be cautious when entering it on our platform. We will never ask for your OTP
                    through phone calls or any other communication method.</li>
                <li><strong>OTP Expiry:</strong> Each OTP is valid for a limited time. If your OTP expires, you can
                    request a new one by clicking the "Resend OTP" button on our vendor portal.</li>
            </ul>

            <p>If you encounter any issues or have questions about the OTP verification process, please reach out to our
                dedicated support team at <a href="mailto:<?= $spt_email ?>"><?= $spt_email ?></a> or <?= $spt_contact ?>. They
                will be happy to assist you.</p>

            <p>We appreciate your commitment to partnering with <?= $vendor ?>. The OTP system is just one of the
                many measures we have put in place to safeguard our vendor relationships and data. Your security and
                trust are of utmost importance to us.</p>

            <p>Thank you for choosing to work with us. We look forward to a successful and mutually beneficial
                collaboration.</p>
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" style="width: 100px; max-width: 100px; height: auto; display: block;">
            <h3>APAR Industries Limited 18</h3>
            <h5>
                TTC.,MIDC Industrial Area, Thane Belapur Road,
                <br>Opp. Rabale Railway Station, Rabale, Navi Mumbai - 400701, India
                <br>+91 22 6111 0444 / 6123 7545
                <br>www.apar.com
            </h5>
        </div>
    </div>
</body>

</html>