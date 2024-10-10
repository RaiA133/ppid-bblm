<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPID | BBLM</title>
  <link rel="stylesheet" href="<?= base_url() ?>src/output.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.css">
</head>

<body data-theme="corporate" class="flex">

  <?php
  $linkSent = false;
  $errorMessage = false;
  $loading = false;
  $userObj['emailId'] = ''

  ?>

  <div class="w-full">
    <div class="min-h-screen bg-stone-100 flex items-center">
      <div class="card mx-auto w-full max-w-5xl shadow-xl">
        <div class="grid md:grid-cols-2 grid-cols-1 bg-base-100 rounded-xl">
          <div class="flex items-center">
            <video src="<?= base_url() ?>/vid/animasi_logo_bblm.mp4" autoplay loop muted class=""></video>
          </div>
          <div class="py-24 px-10">
            <h2 class="text-2xl font-semibold mb-2 text-center">Forgot Password</h2>

            <?php if ($linkSent): ?>
              <div class="text-center mt-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="inline-block w-32 text-success">
                  <path d="M9 16.2l-3.5-3.5-1.4 1.4L9 19 20.3 7.7l-1.4-1.4L9 16.2z" />
                </svg>
              </div>
              <p class="my-4 text-xl font-bold text-center">Link Sent</p>
              <p class="mt-4 mb-8 font-semibold text-center">Check your email to reset password</p>
              <div class="text-center mt-4">
                <a href="/login">
                  <button class="btn btn-block btn-primary">Login</button>
                </a>
              </div>
            <?php else: ?>
              <p class="my-8 font-semibold text-center">We will send password reset link to your email address</p>
              <form method="POST" action="/forgot-password">
                <div class="mb-4">
                  <label for="emailId" class="block text-sm font-medium leading-6 text-gray-900">Email Id</label>
                  <input type="text" name="emailId" id="emailId" class="mt-4 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" value="<?= $userObj['emailId'] ?>" required />
                </div>

                <?php if ($errorMessage): ?>
                  <div class="mt-12 text-red-500 text-sm"><?= $errorMessage ?></div>
                <?php endif; ?>

                <button type="submit" class="btn mt-2 w-full text-neutral-content btn-primary <?= $loading ? 'loading' : '' ?>">Send Reset Link</button>

                <div class="text-center mt-4">
                  Don't have an account yet? 
                  <a href="<?= base_url() ?>hubungi-kami" class="inline-block hover:text-primary hover:underline hover:cursor-pointer transition duration-200">Contact Us</a>
                </div>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true
    });
  </script>


</body>

</html>