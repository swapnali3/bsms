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
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= h($vendor->name) ?>,
            </p>
            <p>Accessing the Vendor Portal:</p>
            <p>1. Access the vendor portal by visiting $visit_url.</p>
            <p>2. Use your registered email address (<?= $vendor->email ?>) as your username to log in. (Ensure that the same email ID we will use for OTP generation, which will be part of further registration process)</p>
            <p>3. Follow the on-screen prompts to complete your profile and initiate the onboarding process.</p>
            <p>If you encounter any issues or have questions during the process, our dedicated support team is here to assist you. You can reach them at <?= $spt_email ?> or <?= $spt_contact ?>.
            We believe that this updated vendor onboarding process will enhance our collaboration and provide you with a more efficient and transparent experience. We look forward to having you on board as part of the APAR's vendor network.
            Thank you for your continued partnership</p>
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png"
                style="width: 100px; max-width: 100px; height: auto; display: block;">
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