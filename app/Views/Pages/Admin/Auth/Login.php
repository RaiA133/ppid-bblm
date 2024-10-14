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

  <div class="w-full">
    <div data-scroll-container class="bg-stone-100">

      <div class="flex flex-col justify-center items-center w-full h-screen">

        <div class="card mx-auto w-full max-w-5xl">
          <div class="grid md:grid-cols-2 grid-cols-1 bg-base-100 rounded-xl shadow-xl">
            <div class="flex items-center border">
              <!-- Ganti ini dengan konten yang diinginkan seperti gambar atau teks intro -->
              <!-- <img src="https://via.placeholder.com/500x400" alt="Landing Intro" class="w-full h-full object-cover rounded-l-xl"> -->
              <video src="<?= base_url() ?>/vid/animasi_logo_bblm.mp4" autoplay loop muted class=""></video>
            </div>
            <div class="py-24 px-10">
              <h2 class="text-2xl font-semibold mb-2 text-center">Login</h2>
              <form action="/login" method="POST">
                <div class="mb-4">
                  <!-- Input Email -->
                  <div class="mt-4">
                    <label for="emailId" class="block text-sm font-medium text-gray-700">Email Id</label>
                    <input type="email" name="emailId" id="emailId" class="input input-bordered w-full mt-2" placeholder="Enter your email" required>
                  </div>

                  <!-- Input Password -->
                  <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full mt-2" placeholder="Enter your password" required>
                  </div>
                </div>

                <div class="text-right text-primary">
                  <a href="<?= base_url() ?>admin/forgot-password" class="text-sm inline-block hover:text-primary hover:underline transition duration-200">Forgot Password?</a>
                </div>

                <!-- Error Message Placeholder -->
                <p class="text-red-500 mt-8" id="errorMessage"></p>

                <!-- Login Button -->
                <button type="submit" class="btn mt-2 w-full btn-primary">Login</button>

                <div class="text-center mt-4">
                  Don't have an account yet?
                  <a href="<?= base_url() ?>hubungi-kami" class="inline-block hover:text-primary hover:underline transition duration-200">Contact Us</a>
                </div>
              </form>
            </div>
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