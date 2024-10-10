<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-stone-100 py-10" id="header-home" data-scroll>

    <section class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Profile</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name :</label>
                    <input type="text" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email :</label>
                    <input type="email" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title :</label>
                    <input type="text" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Place :</label>
                    <input type="text" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">About :</label>
                    <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" rows="3"></textarea>
                </div>
            </div>

            <div class="divider my-6"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Language :</label>
                    <input type="text" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Timezone :</label>
                    <input type="text" class="mt-1 block w-full h-10 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2" checked>
                        <span class="text-sm font-medium text-gray-700">Sync Data</span>
                    </label>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3 mt-4">
                    <button class="btn w-30 md:w-auto lg:w-auto btn-primary px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500 transition duration-200">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </section>

</div>

<?php $this->endSection(); ?>