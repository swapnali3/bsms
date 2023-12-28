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

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #F7941D;
            color: #fff;
            text-decoration: none;
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
                        <!-- <td valign="middle" class="hero bg_white" style="border-left: 1px solid rgb(19, 58, 88);"></td>
                        <td valign="middle" class="hero bg_white" style="padding: 0em 0px;">
                            <img src="http://apar.ftspl.in/webroot/img/logo_s.png" alt=""
                                style="width: 280px; max-width: 600px; height: auto; display: block;">
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $vendor_name ?>,</p>

            <p>We are excited to share with you our newly enhanced online vendor onboarding process, designed to make
                your experience with M/S. APAR Industries Limited, even more efficient and convenient.</p>

            <p>We value our partnerships and understand that a smooth onboarding process is crucial for both our vendors
                and us. With this in mind, we have invested in technology to simplify and expedite the vendor onboarding
                journey.</p>

            <h2>Key Highlights of Our Online Vendor Onboarding Process:</h2>

            <ul>
                <li>User-Friendly Interface: Our new vendor portal features a user-friendly interface that is easy to
                    navigate. You will find all the necessary forms, documents, and instructions in one centralized
                    location.</li>
                <li>Document Upload: Submitting required documents is now a breeze. You can upload documents directly
                    through the portal, eliminating the need for physical paperwork.</li>
                <li>Real-time Progress Tracking: You can track the progress of your onboarding in real-time. No more
                    guessing where your application stands - you'll receive updates at every stage.</li>
                <li>Secure Communication: The portal includes secure messaging functionality. You can communicate with
                    our onboarding team and get quick responses to any queries or concerns.</li>
                <li>Electronic Signature: We've integrated an electronic signature feature for faster approval of
                    agreements and contracts.</li>
            </ul>

            <h2>Accessing the Vendor Portal:</h2>

            <ol>
                <li>Access the vendor portal by visiting <?= $link ?>.</li>
                <li>Use your registered email address (<?= $vendor_email ?>) as your username to log in. (Ensure that the
                    same email ID we will use for OTP generation, which will be part of further registration process)
                </li>
                <li>Follow the on-screen prompts to complete your profile and initiate the onboarding process.</li>
            </ol>

            <p>If you encounter any issues or have questions during the process, our dedicated support team is here to
                assist you. You can reach them at <a href="mailto:<?= $spt_email ?>"><?= $spt_email ?></a> or <?= $spt_contact ?>.
            </p>

            <p>We believe that this updated vendor onboarding process will enhance our collaboration and provide you
                with a more efficient and transparent experience. We look forward to having you on board as part of the
                APAR's vendor network.</p>

            <p>Thank you for your continued partnership.</p>
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