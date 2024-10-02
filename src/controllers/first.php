<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="This is the signup page" />
        <title>Recruit-It.</title>
        <link rel="stylesheet" href="../../public/css/form.css" />
        <link rel="stylesheet" href="../../public/css/first.css" />
        <link rel="stylesheet" href="../../public/css/font.css" />
        <script src="../../public/js/validate.js"></script>
    </head>
    <body>
        <div class="main noto-sans-warang-citi-regular apply_flex_evenly">
            <div class="container">
                <div class="one">
                    <div class="text-content">
                        <h4>Recruit-It.</h4>
                        <h1>Start your journey with us.</h1>
                        <p>
                            Platform is designed to make recruitment faster,
                            smarter, and more effective.
                        </p>
                    </div>

                    <div class="slideshow">
                        <p class="feedback">
                            Simply unbelievable! I am really satisfied with my
                            projects and business. This is absolutely wonderful
                        </p>
                        <div class="person">
                            <img
                                src="../../public/images/kartik.png"
                                alt="profile"
                                class="profile"
                            />
                            <div class="name_work">
                                <p class="feedback">Kartik A.</p>
                                <p class="feedback">Freelancer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two">
                    <?php if (isset($formFile)) {
                        include $formFile;
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>
