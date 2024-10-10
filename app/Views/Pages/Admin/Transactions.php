<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col bg-stone-100 py-10" id="header-home" data-scroll>

    <section class="container mx-auto mt-5 sm:mt-10 p-5 sm:p-10 lg:p-20">

        <!-- Title and Search/Filter Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
            <h1 class="text-lg sm:text-2xl font-semibold">Recent Transactions</h1>
            <div class="flex items-center">
                <!-- Search Bar -->
                <input type="text" id="searchText" placeholder="Search by email..." class="input input-bordered w-full sm:w-64 max-w-xs mr-4">

                <!-- Filter Dropdown -->
                <div class="dropdown dropdown-bottom dropdown-end">
                    <label tabIndex="0" class="btn btn-outline btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Filter
                    </label>
                    <ul tabIndex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Paris</a></li>
                        <li><a>London</a></li>
                        <li><a>Canada</a></li>
                        <li><a>Peru</a></li>
                        <li><a>Tokyo</a></li>
                        <div class="divider mt-0 mb-0"></div>
                        <li><a>Remove Filter</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto shadow-xl rounded-xl">
            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Email Id</th>
                        <th class="p-4 text-left">Location</th>
                        <th class="p-4 text-left">Amount</th>
                        <th class="p-4 text-left">Transaction Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr class="border-b">
                        <td class="p-4">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full overflow-hidden">
                                        <img src="https://via.placeholder.com/50" alt="Avatar">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">John Doe</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">john@example.com</td>
                        <td class="p-4">Paris</td>
                        <td class="p-4">$100</td>
                        <td class="p-4">03 Oct</td>
                    </tr>
                    <!-- Example Row -->
                    <tr class="border-b">
                        <td class="p-4">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full overflow-hidden">
                                        <img src="https://via.placeholder.com/50" alt="Avatar">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Jane Smith</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">jane@example.com</td>
                        <td class="p-4">London</td>
                        <td class="p-4">$200</td>
                        <td class="p-4">02 Oct</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</div>

<!-- Script to use moment.js -->
<script>
    // Example usage of moment.js
    const transactionDate = moment().format("D MMM");
    console.log("Transaction Date:", transactionDate);
</script>


<?php $this->endSection(); ?>