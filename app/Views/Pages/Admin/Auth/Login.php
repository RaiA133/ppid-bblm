<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col justify-center items-center w-full">

  <div class="card mx-auto w-full max-w-5xl shadow-xl">
    <div class="grid md:grid-cols-2 grid-cols-1 bg-base-100 rounded-xl">
      <div class="">
        <!-- Ganti ini dengan konten yang diinginkan seperti gambar atau teks intro -->
        <img src="https://via.placeholder.com/500x400" alt="Landing Intro" class="w-full h-full object-cover rounded-l-xl">
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
            <a href="/forgot-password" class="text-sm inline-block hover:text-primary hover:underline transition duration-200">Forgot Password?</a>
          </div>

          <!-- Error Message Placeholder -->
          <p class="text-red-500 mt-8" id="errorMessage"></p>

          <!-- Login Button -->
          <button type="submit" class="btn mt-2 w-full btn-primary">Login</button>

          <div class="text-center mt-4">
            Don't have an account yet?
            <a href="/register" class="inline-block hover:text-primary hover:underline transition duration-200">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<?php $this->endSection(); ?>