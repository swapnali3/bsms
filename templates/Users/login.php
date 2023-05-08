<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
    .signupcard .signupform__signin {
    justify-content: center;
    flex-direction: column;
    align-items: center;
    padding: 5% 15% 5% !important;
    /* height: 600px; */
}
 .ant-card-body {
    padding:0px !important;
}
/*.ant-card.signupcard.ant-card-bordered {
    height: 100%;
} */

    .v2container {
    color: white;
    background-color: #b61924 !important;
    background: #2980b9 !important;
    background: -webkit-linear-gradient(to right, #2c3e50, #2980b9) !important;
    background: linear-gradient(to right, #2c3e50, #2980b9) !important;
    height: auto !important;
    min-height: calc(100vh - 0px) !important;
}
canvas.particles-js-canvas-el {
  
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 99;
    left: 0;
    top:0;
    bottom:0;
    right:0;
}
.left-content h1 {
    color: #fff;
    font-size: 2.8vw;
    line-height: 3.5rem;
}
.left-content {
    padding-left: 65px;
}
.left-content p {
    font-size: 20px;
}
img.flow-img {
    width: 55%;
}
.ant-row {
  position: absolute;
    top: 50%;
    left: 50%;
    align-items: center;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    height: 100%;
    z-index: 999;
}
    .s-logo {
    width: 65%;
}
    .sub-btn {
    background-image: linear-gradient(to right, #FF4E50 0%, #F9D423  51%, #FF4E50  100%) !important;
    transition: 0.5s;
    background-size: 200% auto !important;
    color: white;
    box-shadow: 0 0 20px #eee !important;
    border-radius: 30px !important;
    display: block;
    font-size: 15px !important;
    line-height: 1.1em !important;
    margin: 0px !important;
    height: 50px !important;
    border: none !important;
}
.sub-btn:hover {
    background-position: right center !important;
    color: #fff;
    text-decoration: none;
}
    .anticon {
      display: inline-block;
      color: inherit;
      font-style: normal;
      line-height: 0;
      text-align: center;
      text-transform: none;
      vertical-align: -0.125em;
      text-rendering: optimizeLegibility;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .anticon>* {
      line-height: 1;
    }

    .anticon svg {
      display: inline-block;
    }

    .anticon::before {
      display: none;
    }

    .anticon .anticon-icon {
      display: block;
    }

    .anticon[tabindex] {
      cursor: pointer;
    }

    .anticon-spin::before,
    .anticon-spin {
      display: inline-block;
      -webkit-animation: loadingCircle 1s infinite linear;
      animation: loadingCircle 1s infinite linear;
    }

    @-webkit-keyframes loadingCircle {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes loadingCircle {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>
  <meta charset="utf-8">
  <link rel="icon" href="./favicon.ico">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="#000000">
  <meta name="description"
    content="Sign up now! Unlock the best platform to discover freight rates, execute your shipments &amp; track containers">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Lato&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>css/all.min.css">
  <link href="<?= $this->Url->build('/') ?>css/5.7cec8de0.chunk.css" rel="stylesheet">
  <link href="<?= $this->Url->build('/') ?>css/main.26d266c0.chunk.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script charset="utf-8" src="<?= $this->Url->build('/') ?>js/0.5bbd83f8.chunk.js"></script>
  <script charset="utf-8" src="<?= $this->Url->build('/') ?>js/1.a9e5058d.chunk.js"></script>
  <script charset="utf-8" src="<?= $this->Url->build('/') ?>js/6.3128c4ca.chunk.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>css/13.656858bb.chunk.css">
  <script charset="utf-8" src="<?= $this->Url->build('/') ?>js/13.b8dbb772.chunk.js"></script>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
</head>

<body>
  <div id="root">
    <div class="App">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

      <div class="v2container" id="particles-js">
        <div class="ant-row">
          <div class="ant-col otherdetails-container ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-12 ant-col-xl-12">
           
<!--            

            <div class="faq">
              <h4 class="faq__header">Welcome to FTSPL Supplier Portal</h4>
              <div>

                <p><span class="faq__question" style="margin-left: 0px;font-size: x-large; font-weight: 500;">A single
                    window
                    digital interface and communication platform for supplier assessment and onboarding- Towards Co-creating Governance.
                  </span>
                </p>
                <p class="faq__answer" style="display: none;">ftspl unifies information about your shipments served by
                  multiple carriers and
                  forwarders into a single window, giving you a holistic picture of your shipments instantly.</p>
               
              </div>
              <div>
              <div class="row" style="padding-top: 11.5vh;">
              <div class="col-12" style="text-align-last: center;">
                <img  class="flow-img" src="<?= $this->Url->build('/')  ?>img/1234.png">
              </div>
            </div>
              </div>
              <div>
                <p><span class="faq__question">&nbsp;</span></p>
              </div>
              <div></div>
            </div> -->
           <div class="left-content animate__animated animate__backInLeft">
           <h1>Welcome to FTSPL Supplier Portal</h1>
	<p>A single window digital interface and communication platform for supplier assessment and onboarding- Towards Co-creating Governance.</p>
  <img  class="flow-img" src="<?= $this->Url->build('/')  ?>img/login-img.png">           
</div>
          </div>
          <div class="ant-col content-container ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-12 ant-col-xl-12">
            <div class="ant-card signupcard ant-card-bordered">
              <div class="ant-card-body">

                <div class="signupform signupform__signin">
                  <p class="signupform__signin--signinText">
                    <!-- <img src="<?= $this->Url->build('/') ?>img/ftspl.png" width="120px"> -->

                    <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="s-logo">
                  </p>

                  <div class="select-button login-page .form">
                    <div class="buyer-btn custom-control custom-radio" style="
                      margin-right: 31px">
                      <input type="radio" id="mobile_btn" class="custom-control-input" name="a" value="">
                      <label class="custom-control-label" for="buyer"><span>Login with mobile</span></label>
                    </div>
                    <div class="approver-btn custom-control custom-radio ">
                      <input type="radio" class="custom-control-input" id="email_btn" name="a" checked="" value="">
                      <label class="custom-control-label" for="approver"><span>Login with Email</span></label>
                    </div>
                  </div>

                  <br>
                  <?= $this->Flash->render('auth') ?>

                  <div id="email_login">
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('logged_by', ['type' => 'hidden', 'value' => 'email', 'id' => 'loginby']); ?>
                    <div style="width: 100%;">
                      <div class="material-textfield">
                        <div
                          class="ant-select material-select   ant-select-auto-complete ant-select-single ant-select-show-search">
                          <div class="ant-select-selector"><span class="ant-select-selection-search"><input
                                autocomplete="off" type="search" class="ant-select-selection-search-input"
                                role="combobox" aria-haspopup="listbox" aria-owns="rc_select_0_list"
                                aria-autocomplete="list" aria-controls="rc_select_0_list"
                                aria-activedescendant="rc_select_0_list_0" value="" id="rc_select_0"></span></div>
                        </div><label class="material-label" style="left: 0px;">Workspace url</label>
                        <p class="material-rightLabel">.fts-pl.com</p>
                      </div>
                    </div>
                    <div style="width: 100%;">
                      <div class="material-textfield"><input class="material-input sentence" placeholder="Enter Username/Email" type="text" name="username" value=""><label class="material-label" style="left: 0px;">Username/Email</label></div>
                    </div>
                    <div style="width: 100%;">
                      <div class="material-textfield signin-textfield"><input class="material-input "
                          placeholder="Enter Password" type="password" name="password" value=""><label
                          class="material-label" style="left: 0px;">Password</label>
                        <p class="material-rightLabel"><i class="fa fa-eye-slash" aria-hidden="true"
                            style="cursor: pointer;"></i></p>
                        <p class="material-rightBottomLabel material-rightBottomLabel__danger">Forgot Password ?</p>
                      </div>
                    </div><button type="submit" class="ant-btn btn btn__get-started-btn sub-btn">SUBMIT</button>
                    <p class="signupform__signin--dontHaveAccount">Don't have an account?<a
                        style="cursor: pointer;">Create An Account</a></p>
                    <?= $this->Form->end() ?>
                    <p style="text-align: center;font-weight: 500;"><a href="mailto: support@fts-pl.com" style="margin-right: 5px;border-right: 1px solid;padding-right: 10px;">Help</a> <a
                        href="https://www.fts-pl.com/privacy-policy/">Privacy Terms</a></p>
                    <p class="text-center" style="text-align:center"> <img src="<?= $this->Url->build('/') ?>img/ftspl.png" width="120px"></p>

                  </div>
                  <div class="row" id="mobile_login" style="width:100%; display: none;">
                    <?= $this->Form->create() ?>
                    <div class="input-group mb-3">
                      <div class="material-textfield">
                        <input class="material-input " placeholder="Mobile" id="mobile" type="tel" maxlength="10"
                          name="mobile" pattern="[0-9]{10}" value="">
                        <label class="material-label" style="left: 0px;">Mobile +91</label>
                      </div>
                    </div>
                    <button type="button" class="sub-btn ant-btn btn btn__get-started-btn mb-4" id="getotp">
                      <span>Get OTP</span>
                    </button>
                    <?= $this->Form->end() ?>
                    <p style="text-align: center;font-weight: 500;margin-top:20px;"><a href="mailto: support@fts-pl.com" style="margin-right: 5px;border-right: 1px solid;padding-right: 10px;">Help</a> <a
                        href="https://www.fts-pl.com/privacy-policy/">Privacy Terms</a></p>
                    <p class="text-center" style="text-align:center"> <img src="<?= $this->Url->build('/') ?>img/ftspl.png" width="120px"></p>
                  </div>
                </div>


                <div class="row" id="mobile_login_otp" style="display:none;">
                  <?= $this->Form->create() ?>
                  <?= $this->Form->control('mobile', ['type' => 'hidden', 'id' => 'user_mobile']); ?>
                  <?= $this->Form->control('logged_by', ['type' => 'hidden', 'value' => 'mobile', 'id' => 'loginby']); ?>
                  <div class="input-group mb-3">
                    <input type="tel" class="form-control" name="otp" id="otp" placeholder="OTP" maxlength="6"
                      pattern="[0-9]{6}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-password"></span>
                      </div>
                    </div>
                  </div>
                  <span style="text-color:red;" id="otp_error"></span>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                      <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary btn-block']); ?>
                    </div>
                    <!-- /.col -->
                  </div>
                  <?= $this->Form->end() ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= $this->Url->build('/') ?>js/5.b662bfe1.chunk.js"></script>
  <script src="<?= $this->Url->build('/') ?>js/main.d308f349.chunk.js"></script>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
  <script>
    // background particles
    particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 290,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "triangle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 10
      },
      "image": {
        "src": "img/github.svg",
        "width": 150,
        "height": 150
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "window",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 100,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 100,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});


    //end
    $(document).ready(function () {
      $(document).on("change", "#mobile_btn", function () {
        $('#email_login').hide();
        $('#mobile_login').show();
        $("#mobile_login_otp").hide();
        $('#loginby').val('mobile');

      });

      $(document).on("change", "#email_btn", function () {
        $('#email_login').show();
        $('#mobile_login').hide();
        $("#mobile_login_otp").hide();
        $('#loginby').val('email');
      });

      $(document).on("change, keyup", ".sentence", function () {
        $(this).val($(this).val().toLowerCase())
      });

      $("#getotp").click(function () {
        var request = $.ajax({
          url: "users/get-otp",
          method: "POST",
          headers: { 'X-CSRF-Token': $('[name="_csrfToken"]').val() },
          data: { mobile: $("#mobile").val() },
          dataType: "json"
        });

        request.done(function (response) {
          if (response.status == 'success') {
            $("#mobile_login_otp").show();
            $("#mobile_login").hide();
            $("#user_mobile").val($("#mobile").val());
          } else {
            $("#otp_error").html(response.message);
          }
        });

        request.fail(function (jqXHR, textStatus) {
          console.log("Request failed: " + textStatus);
        });
      });
    });
  </script>
</body>

</html>