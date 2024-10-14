<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

    <section class="container mx-auto mt-5 sm:mt-10 p-5 sm:p-10 lg:p-20">
        <!-- Title and Button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <h1 class="text-lg sm:text-2xl font-semibold">Current Leads</h1>
            <button class="mt-4 sm:mt-0 btn px-4 sm:px-6 btn-sm normal-case btn-primary bg-blue-500 text-white py-2 rounded">Add New</button>
        </div>

        <!-- Leads Table -->
        <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl">
            <table class="table-auto w-full bg-base-100 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-2 sm:p-4 text-left">Name</th>
                        <th class="p-2 sm:p-4 text-left">Email Id</th>
                        <th class="p-2 sm:p-4 text-left">Created At</th>
                        <th class="p-2 sm:p-4 text-left">Status</th>
                        <th class="p-2 sm:p-4 text-left">Assigned To</th>
                        <th class="p-2 sm:p-4"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Lead Row -->
                    <tr class="border-b">
                        <td class="p-2 sm:p-4">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <div class="avatar">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden">
                                        <img src="https://via.placeholder.com/50" alt="Avatar">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold text-sm sm:text-base">John Doe</div>
                                    <div class="text-xs sm:text-sm text-gray-500">Smith</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">john@example.com</td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">03 Oct 23</td>
                        <td class="p-2 sm:p-4">
                            <div class="badge bg-blue-500 text-white px-2 py-1 rounded text-xs sm:text-sm">In Progress</div>
                        </td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">Smith</td>
                        <td class="p-2 sm:p-4">
                            <button class="btn btn-square btn-ghost text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 011-1h1a1 1 0 011 1v1h4a1 1 0 011 1v1a1 1 0 01-1 1h-1v9a2 2 0 01-2 2H7a2 2 0 01-2-2V5H4a1 1 0 01-1-1V3a1 1 0 011-1h4V2zM7 5v9h6V5H7zM9 2h2v1H9V2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Another Example Lead Row -->
                    <tr class="border-b">
                        <td class="p-2 sm:p-4">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <div class="avatar">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden">
                                        <img src="https://via.placeholder.com/50" alt="Avatar">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold text-sm sm:text-base">Jane Doe</div>
                                    <div class="text-xs sm:text-sm text-gray-500">Doe</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">jane@example.com</td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">04 Oct 23</td>
                        <td class="p-2 sm:p-4">
                            <div class="badge bg-green-500 text-white px-2 py-1 rounded text-xs sm:text-sm">Completed</div>
                        </td>
                        <td class="p-2 sm:p-4 text-sm sm:text-base">Doe</td>
                        <td class="p-2 sm:p-4">
                            <button class="btn btn-square btn-ghost text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 011-1h1a1 1 0 011 1v1h4a1 1 0 011 1v1a1 1 0 01-1 1h-1v9a2 2 0 01-2 2H7a2 2 0 01-2-2V5H4a1 1 0 01-1-1V3a1 1 0 011-1h4V2zM7 5v9h6V5H7zM9 2h2v1H9V2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?php $this->endSection(); ?>